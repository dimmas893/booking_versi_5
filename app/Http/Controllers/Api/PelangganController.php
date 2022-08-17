<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\booking;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->get();
        return response()->json([
            'code' => 200,
            'message' => 'Data Berhasil diambil',
            'data' => $products
        ], 200);
    }


    //MODE WEB / FROND END
    // public function bayar()
    // {
    //     $booking = booking::with('user')->where('users_id', Auth::user()->id)->get();
    //     return response()->json([
    //         'code' => 200,
    //         'message' => 'Data Berhasil diambil',
    //         'data' => $booking
    //     ], 200);
    // }

    //MODE TEST POSTMAN
    public function bayar()
    {
        $booking = booking::with('user')->where('users_id', Auth::user()->id)->get();
        return response()->json([
            'code' => 200,
            'message' => 'Data Berhasil diambil',
            'data' => $booking
        ], 200);
    }

    public function edit_bukti_bayar(Request $request, $id)
    {
        $booking = Booking::with('status', 'user', 'products')->FindOrFail($id);
        return response()->json([
            'code' => 200,
            'message' => 'Data Berhasil diambil',
            'data' => $booking
        ], 200);
    }


    //MODE WEB / FROND END
    public function upload_bukti(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking['bukti_bayar'] = $request->file('bukti_bayar')->store('assets/booking', 'public');
        $booking->save();
        return response()->json([
            'code' => 200,
            'message' => 'Data Bukti Bayar Berhasil di Unggah',
            'data' => $booking
        ], 200);
    }


    //MODE TEST POSTMAN
    // public function upload_bukti(Request $request, $id)
    // {
    //     $booking = Booking::findOrFail($id);
    //     $booking['bukti_bayar'] = 'terserah';
    //     $booking->save();
    //     return response()->json([
    //         'code' => 200,
    //         'message' => 'Data Bukti Bayar Berhasil di Unggah',
    //         'data' => $booking
    //     ], 200);
    // }

    //MODE WEB / FROND END
    // public function invoice()
    // {
    //     $booking = booking::with('status', 'user', 'products')->where('users_id', Auth::user()->id)->get();
    //     return response()->json([
    //         'code' => 200,
    //         'message' => 'Data invoice Berhasil di ambil',
    //         'data' => $booking
    //     ], 200);
    // }

    //MODE TEST POSTMAN
    public function invoice()
    {
        $booking = booking::with('status', 'user', 'products')->where('users_id', Auth::user()->id)->get();
        return response()->json([
            'code' => 200,
            'message' => 'Data invoice Berhasil di ambil',
            'data' => $booking
        ], 200);
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
