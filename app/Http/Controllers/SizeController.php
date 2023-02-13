<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes = Size::all();
        return view('admin.size.index', compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.size.create');
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
            'size' => 'required',
        ]);

        $size = new Size();
        $size->size = $request->post('size');
        $size->status = 1;
        $size->save();

        session()->flash('success', 'Create size successfully!');
        return redirect()->route('size.index');
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
        $size = Size::find($id);
        return view('admin.size.edit', compact('size'));
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
        $size = Size::find($id);
        if ($size) {
            $request->validate([
                'size' => 'required',
            ]);

            $size->size = $request->size;
            $size->save();
        }
        session()->flash('success', 'Update size successfully!');
        return redirect()->route('size.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $size = Size::find($id);
        $size->delete();
        session()->flash('success', 'Delete size successfully!');
        return redirect()->route('size.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id, $status
     * @return \Illuminate\Http\Response
     */
    public function status($status, $id)
    {
        $size = Size::find($id);
        $size->status = $status;
        $size->save();
        session()->flash('success', 'Size update status successfully!');
        return redirect()->route('size.index');
    }
}
