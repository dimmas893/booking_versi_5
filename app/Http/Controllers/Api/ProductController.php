<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return response()->json(['code' => 200, 'message' => 'Data Product berhasil di ambil', 'data' => $products], 200);
    }


    //MODE MENGECEK DI POSTMAN
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'image' => 'required',
    //         'stock' => 'required',
    //         'harga' => 'required',
    //         'categories_id' => 'required'
    //     ]);

    //     $products = new Product();
    //     $products->image = $request->image;
    //     $products->name = $request->name;
    //     $products->stock = $request->stock;
    //     $products->harga = $request->harga;
    //     $products->categories_id = $request->categories_id;
    //     if ($products->save()) {
    //         return response()->json([
    //             'message' => 'Data Berhasil Di Tambahkan',
    //             'code' => 200,
    //             'data' => $products
    //         ], 200);
    //     } else {
    //         return response()->json([
    //             'code' => 311,
    //             'message' => 'Ada yang salah',
    //         ]);
    //     }
    // }

    //MODE DI FRONT END / MODE DI WEB , OK
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'stock' => 'required',
            'harga' => 'required',
            'categories_id' => 'required'
        ]);

        $products = new Product();
        if ($request->hasFile('image')) {

            $completeFileName = $request->file('image')->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $compPic = str_replace(' ', '_', $fileNameOnly) . '-' . rand() . '_' . time() . '.' . $extension;
            $path = $request->file('image')->storeAs('public/users', $compPic);
            $products->image = $compPic;
            $products->name = $request->name;
            $products->stock = $request->stock;
            $products->harga = $request->harga;
            $products->categories_id = $request->categories_id;
        }

        if ($products->save()) {
            return response()->json([
                'data' => 200,
                'message' => 'Data Berhasil Di Tambahkan',
                'data' => $products
            ]);
        } else {
            return response()->json([
                'data' => 200,
                'message' => 'Ada yang salah',
            ]);
        }
    }


    public function edit($id)
    {
        $products = Product::findOrFail($id);
        return response()->json([
            'code' => 200,
            'message' => 'Data Berhasil di ambil',
            'data' => $products
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $products = Product::find($id);
        if ($request->hasfile('image')) {
            $completeFileName = $request->file('image')->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $compPic = str_replace(' ', '_', $fileNameOnly) . '-' . rand() . '_' . time() . '.' . $extension;
            $path = $request->file('image')->storeAs('public/users', $compPic);
            $products->image = $compPic;
            $products->name = $request->name;
            $products->stock = $request->stock;
            $products->harga = $request->harga;
            $products->categories_id = $request->categories_id;
        }
        if ($products->save()) {
            return response()->json([
                'message' => 'Data Berhasil Di Diupdate',
                'code' => 200,
                'data' => $products
            ], 200);
        } else {
            return response()->json([
                'code' => 311,
                'message' => 'Ada yang salah',
            ]);
        }
    }

    // MODE DI FRONT END / MODE DI WEB , OK
    // public function update(Request $request, $id)
    // {
    //     $products = Product::findOrFail($id);
    //     $products->image = $request->image;
    //     $products->name = $request->name;
    //     $products->stock = $request->stock;
    //     $products->harga = $request->harga;
    //     $products->categories_id = $request->categories_id;
    //     if ($products->save()) {
    //         return response()->json([
    //             'message' => 'Data Berhasil Di di update',
    //             'code' => 200,
    //             'data' => $products
    //         ], 200);
    //     } else {
    //         return response()->json([
    //             'code' => 311,
    //             'message' => 'Ada yang salah',
    //         ]);
    //     }
    // }


    public function destroy($id)
    {
        $products = Product::findOrFail($id)->delete();
        return response()->json([
            'code' => 200,
            'message' => 'Data Berhasil didelete',
            'data' => $products
        ], 200);
    }
}
