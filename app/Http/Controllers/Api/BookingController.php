<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\booking;
use App\Models\Product;
use App\Models\Status;
use App\Models\Transaction;

class BookingController extends Controller
{
    public function index()
    {
        $booking = booking::with('products')->get();
        return response()->json([
            'code' => 200,
            'message' => 'Data Booking Berhasil Diambil',
            'data' => $booking
        ], 200);
    }


    //MODE TEST POSTMAN
    // public function store(Request $request)
    // {
    //     $external_id = 'va-' . time();
    //     $booking = [
    //         'no_invoice' => $request->no_invoice,
    //         'bukti_bayar' => $request->bukti_bayar,
    //         'tanggal' => $request->tanggal,
    //         'products_id' => $request->products_id,
    //         'users_id' => $request->users_id,
    //         'status_id' => '1',
    //         'jumlah' => $request->jumlah,
    //         'tagihan' => $request->tagihan,
    //     ];
    //     $bookingg =  booking::create($booking);

    //     // dd($bookingg);

    //     $trans = Transaction::create([
    //         'booking_id' => $bookingg['id'],
    //         'products_id' => $bookingg['products_id'],
    //         'tanggal' => $bookingg['tanggal'],
    //     ]);
    //     return response()->json([
    //         'code' => 200,
    //         'message' => 'Booking Berhasil',
    //         'data' => $bookingg
    //     ]);
    // }

    // MODE WEB / FROND END
    public function store(Request $request)
    {
        $dataStokKamar = Product::where('id', $request->products_id)->first();
        $dataTransaksiKamar = Transaction::where('tanggal', $request->tanggal)->where('products_id', $request->products_id)->count();
        $stokTersedia = $dataStokKamar->stock - $dataTransaksiKamar;
        // dd($stokTersedia);


        if ($request->jumlah <= $stokTersedia) {
            $external_id = 'va-' . time();
            $booking = [
                'no_invoice' => $external_id,
                'bukti_bayar' => $request->bukti_bayar,
                'tanggal' => $request->tanggal,
                'products_id' => $request->products_id,
                'users_id' => $request->users_id,
                'status_id' => '1',
                'jumlah' => $request->jumlah,
                'tagihan' => $request->tagihan,
            ];
            $bookingg =  booking::create($booking);

            // dd($bookingg);

            $trans = Transaction::create([
                'booking_id' => $bookingg['id'],
                'products_id' => $bookingg['products_id'],
                'tanggal' => $bookingg['tanggal'],
            ]);
            return response()->json([
                'code' => 200,
                'message' => 'Booking Berhasil',
                'data' => $bookingg
            ]);
        } else {
            return response()->json([
                'code' => 200,
                'message' => 'Kamar Penuh !!!',
            ]);
        }
    }

    public function edit($id)
    {
        $booking = booking::with('status', 'user', 'products')->FindOrFail($id);
        $status = Status::all();
        return response()->json([
            'code' => 200,
            'message' => 'Booking data',
            'data_booking' => $booking,
            'data_status' => $status,
        ]);
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status_id = $request->status_id;
        $booking->save();
        return response()->json([
            'code' => 200,
            'message' => 'Status Booking Berhasil Diubah',
            'data' => $booking,
        ]);
    }

    public function destroy($id)
    {
        $booking = booking::findOrFail($id)->delete();
        return response()->json([
            'code' => 200,
            'message' => 'Data Berhasil didelete',
            'data' => $booking
        ], 200);
    }
}
