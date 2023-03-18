<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\product;
use Illuminate\Http\Request;

class productsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.product')->with('products', product::paginate());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create')->with([
            'categories' => $categories,

        ]);
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
        $request->validate(Product::$rules);
        $imageUrl = $request->file('image')->store('products', ['disk' => 'public']);
        $product = new Product;
        $product->fill($request->post());
        $product['is_featured'] = $request->input('is_featured') ? 1 : 0;
        $product['is_recent'] = $request->input('is_recent') ? 1 : 0;
        $product['image'] = $imageUrl;
        $product->save();

        return redirect('admin/products');
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
        $product = Product::findOrFail($id);

        return view('admin.products.show')->with([
            'product' => $product,

        ]);
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
        $categories = Category::all();
        $product = product::findOrFail($id);
        return view('admin.products.edit')->with([
            'product' => $product,
            'categories' => $categories,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        //

        $request->validate(Product::$rules);
        $imageUrl = $request->file('image')->store('products', ['disk' => 'public']);
        $product = product::findOrFail($id);
        $product->fill($request->post());
        $product['image'] = $imageUrl;
        $product->save();

        return redirect('admin/products');
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
        $product = product::findOrFail($id);
        product::destroy($id);
        return redirect("admin/products")->with('success', 'Record has been deleted successfully!');
    }
}