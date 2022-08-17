<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Redirect, Response;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::with('category')->get();
        return view('admin.product.index', compact('categories', 'products'));
    }


    public function store(Request $request)
    {
        $post = new Product();
        if ($request->hasFile('image')) {

            $completeFileName = $request->file('image')->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $compPic = str_replace(' ', '_', $fileNameOnly) . '-' . rand() . '_' . time() . '.' . $extension;
            $path = $request->file('image')->storeAs('public/users', $compPic);
            $post->image = $compPic;
            $post->name = $request->name;
            $post->stock = $request->stock;
            $post->harga = $request->harga;
            $post->categories_id = $request->categories_id;
        }

        if ($post->save()) {
            return ['status' => true, 'message' => 'Image Completed Successful'];
        } else {
            return ['status' => false, 'message' => 'Something went wrong'];
        }
    }

    public function get_products()
    {
        $products = Product::with('category')->get();
        echo json_encode($products);
    }

    public function edit($id)
    {
        $products = Product::find($id);

        return Response::json($products);
    }

    public function delete($id)
    {
        $post = Product::findOrFail($id);
        if (Storage::exists('public/users/' . str_replace('./storage/users/', '', $post->image))) {
            Storage::delete('public/users/' . str_replace('./storage/users/', '', $post->image));
        }

        if ($post->delete()) {
            return ['status' => true, 'message' => 'Deleted Successful'];
        } else {
            return ['status' => false, 'message' => 'Something went wrong'];
        }
    }

    public function update_image($id)
    {
        $products = Product::find($id);
        $categories = Category::all();
        return view('admin.product.edit', compact('products', 'categories'));
    }


    // public function update_post(Request $request) {
    //     if($request->hasFile('post_updating_id')){
    //         $completeFileName = $request->file('screenhot')->getClientOriginalName();

    //         $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
    //         $extension = $request->file('donee_pic_edit')->getClientOriginalExtension();
    //         $doneePic = str_replace(' ', '_', $fileNameOnly).'_'.time().'.'.$extension;
    //         $path = $request->file('donee_pic_edit')->storeAs('public/donee', $doneePic);
    //         $old_pic = DB::table('donee_managment')->where('id', $request->donee_id)->first();
    //         $pic_name = explode('/', $old_pic->picture);
    //         $Product = $pic_name[3];
    //         if(Storage::exists('public/donee/'.$pic_name[3])){
    //             Storage::delete('public/donee/'.$pic_name[3]);
    //         } 
    //      }
    // }

    public function update(Request $request, $id)
    {

        $post = Product::find($id);
        if ($request->hasfile('image')) {
            $completeFileName = $request->file('image')->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $compPic = str_replace(' ', '_', $fileNameOnly) . '-' . rand() . '_' . time() . '.' . $extension;
            $path = $request->file('image')->storeAs('public/users', $compPic);
            $post->image = $compPic;
            $post->name = $request->name;
            $post->stock = $request->stock;
            $post->harga = $request->harga;
            $post->categories_id = $request->categories_id;
        }
        if ($post->save()) {
            return ['status' => true, 'message' => 'Image Updated Successful'];
        } else {
            return ['status' => false, 'message' => 'Something went wrong'];
        }
    }
}
