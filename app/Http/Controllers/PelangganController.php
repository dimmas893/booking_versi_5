<?php

namespace App\Http\Controllers;

use App\Models\booking;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $customor = DB::table('transactions')
        //     ->leftjoin('products', 'transactions.id_products', '=', 'products.id')
        //     ->select(
        //         'transactions.id_products as id_kamar',
        //         'transactions.tanggal as tanggal_transactions',
        //         'products.name as name_products',
        //         'products.stock as stock_products',

        //         DB::raw('COUNT(id_products) as total')
        //     )

        //     ->groupBy('transactions.id_products', 'transactions.tanggal', 'products.name', 'products.stock')
        //     ->limit(10)
        //     ->orderBy('total', 'desc')
        //     ->get();
        // dd($customor);
        $products = Product::with('category')->get();
        return view('pelanggan.index', compact(['products']));
    }

    public function bayar()
    {
        $booking = Booking::with('status', 'user', 'products')->where('users_id', Auth::user()->id)->get();
        return view('pelanggan.bayar', compact(['booking']));
    }

    public function edit_bukti_bayar(Request $request, $id)
    {
        $booking = Booking::with('status', 'user', 'products')->FindOrFail($id);
        return view('pelanggan.edit_bayar', compact(['booking']));
    }

    public function upload_bukti(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking['bukti_bayar'] = $request->file('bukti_bayar')->store('assets/booking', 'public');
        $booking->save();
        return redirect()->route('bayar')->with('tambah', 'title');
    }

    public function invoice()
    {
        $booking = booking::with('status', 'user', 'products')->where('users_id', Auth::user()->id)->get();
        return view('pelanggan.konfirmasi', compact(['booking']));
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
