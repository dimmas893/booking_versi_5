<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\booking;
use App\Models\Status;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Redirect, Response;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booking = booking::with('status', 'user', 'products')->get();
        $status = Status::all();
        return view('admin.booking.index', compact(['booking', 'status']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
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
            // dd($trans);
            return redirect('/pelanggan/bayar')->with('tambah', 'title');
        } else {
            return redirect('/pelanggan')->with('tambah', 'title');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = booking::with('status', 'user', 'products')->FindOrFail($id);
        $status = Status::all();
        return view('admin.booking.edit', compact(['booking', 'status']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status_id = $request->status_id;
        $booking->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        booking::destroy($request->id);

        return redirect()->back()->with('delete', 'title');
    }
}
