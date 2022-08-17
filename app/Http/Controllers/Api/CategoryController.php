<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return response()->json(['code' => 200, 'message' => 'Data Category Berhasil Diambil', 'data' => $category], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category = Category::create([
            'name' => $request->name,
        ]);

        return response()->json([
            'code' => 200,
            'message' => 'Data Berhasil Ditambah',
            'data' => $category
        ], 200);
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return response()->json([
            'code' => 200,
            'message' => 'Data Berhasil di ambil',
            'data' => $category
        ], 200);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->save();
        return response()->json([
            'code' => 200,
            'message' => 'Data Berhasil Diubah',
            'data' => $category
        ]);
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id)->delete();
        return response()->json([
            'code' => 200,
            'message' => 'Data Berhasil didelete',
            'data' => $category
        ], 200);
    }
}
