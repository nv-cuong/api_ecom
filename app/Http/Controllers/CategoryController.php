<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'category_name' => 'required|unique:categories,category_name',
            'category_slug' => 'required',
        ]);

        $category = new Category();
        $category->category_name = $request->post('category_name');
        $category->category_slug = $request->post('category_slug');
        $category->status = 1;
        $category->save();

        session()->flash('success', 'Create category successfully!');
        return redirect()->route('category.index');
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
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
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
        $category = Category::find($id);
        if($category){
            $request->validate([
                'category_name' => 'required|unique:categories,category_name,'.$category->id,
                'category_slug' => 'required',
            ]);

            $category->category_name = $request->category_name;
            $category->category_slug = $request->category_slug;
            $category->save(); 
        }
        session()->flash('success', 'Update category successfully!');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        session()->flash('success', 'Delete category successfully!');
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
        $category = Category::find($id);
        $category->status = $status;
        $category->save();
        session()->flash('success', 'Category update status successfully!');
        return redirect()->route('category.index');
    }
}
