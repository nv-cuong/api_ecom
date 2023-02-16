<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status', 1)->get();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $product = new Product();
        $product->name = $request->post('name');
        $product->category_id = $request->post('category_id');
        $product->slug = Str::slug($request->post('name'));
        $product->brand = $request->post('brand');
        $product->model = $request->post('model');
        $product->short_desc = $request->post('short_desc');
        $product->description = $request->post('description');
        $product->keywords = $request->post('keywords');
        $product->technical_specification = $request->post('technical_specification');
        $product->uses = $request->post('uses');
        $product->warranty = $request->post('warranty');
        $product->status = 1;

        $image = $request->file('image');
        if(isset($image)){
            
        }

        $product->save();

        session()->flash('success', 'Create product successfully!');
        return redirect()->route('product.index');
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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::where('status', 1)->get();
        $product = Product::find($id);
        return view('admin.product.edit', compact(['product', 'categories']));
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

        $product = Product::find($id);
        if ($product) {
            $request->validate([
                'name' => 'required',
            ]);

            $product->name = $request->name;
            $product->category_id = $request->category_id;
            $product->slug = Str::slug($request->name);
            $product->brand = $request->brand;
            $product->model = $request->model;
            $product->short_desc = $request->short_desc;
            $product->description = $request->description;
            $product->keywords = $request->keywords;
            $product->technical_specification = $request->technical_specification;
            $product->uses = $request->uses;
            $product->warranty = $request->warranty;
            $product->status = 1;
            $product->save();
        }
        session()->flash('success', 'Create product successfully!');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        session()->flash('success', 'Delete product successfully!');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id, $status
     * @return \Illuminate\Http\Response
     */
    public function status($status, $id)
    {
        $product = Product::find($id);
        $product->status = $status;
        $product->save();
        session()->flash('success', 'Product update status successfully!');
        return redirect()->route('category.index');
    }
}
