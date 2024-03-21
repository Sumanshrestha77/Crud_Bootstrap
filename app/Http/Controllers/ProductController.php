<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('products.index', ['products' => $products]);
    }
    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {
        //validate
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            // 'image'=>'required|image|mimes:jpeg,jpg,png,gif|max:100000'
        ]);




        // $imageName = time().'.'.$request->image->extension();
        // $request->image->move(public_path('products'), $imageName);

        $product = new Product(); //to store in db
        // $product->image = $imageName;
        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();
        return back()->withSuccess('product created!'); //enter item to db
        //dd($request->all());
    }
    public function edit($id)
    {
        $product = Product::where('id', $id)->first();

        return view('products.edit', ['product' => $product]);
    }
    public function update(Request $request, $id)
    {
        //dd($request->all());
        //  //validate
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            //'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:100000' // Adjusted validation rule


        ]);
        $product = Product::where('id', $id)->first();
        // if(isset($request->image)){


        //     $imageName = time().'.'.$request->image->extension();
        //     $request->image->move(public_path('products'), $imageName);
        //     $product->image = $imageName;
        // }

        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();
        return back()->withSuccess('product updated!'); //enter item to db
        //dd($request->all());
    }
    public function destroy($id)
    {
        $product = Product::where('id', $id)->first();
        $product->delete();
        return back()->withSuccess('product deleted!'); //enter item to db

    }
    public function deleteChecked(Request $request)
    {
        $ids = $request->ids;

        Product::whereIn('id', $ids)->delete();
        return back()->withSuccess('Checked deleted!'); //enter item to db


    }
}
