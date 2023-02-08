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
        return view('admin.category', compact('categories'));
    }

    public function manage_category()
    {
        return view('admin.manage_category');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories,category_name',
        ]);

        $category = new Category();
        $category->category_name = $request->post('category_name');  
        $category->category_slug = $request->post('category_slug');
        $category->save();

        session()->flash('success', 'Create category successfully!');
        return redirect('admin/category');
    }
}
