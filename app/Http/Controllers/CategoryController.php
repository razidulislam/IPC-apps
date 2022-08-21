<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = category::simplePaginate(5);
        return view('category.index', compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated    = $request->validate([
        'name'        => 'required|min:2',
        ]);
        
        $categorys              = new category();
        $categorys->name        = $request->name;
        $categorys->save();
        Session::flash('msg','Category Created Successfully.');
        return redirect('/categorys');
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
        $UpdateCategory = category::find($id);
        return view('category.update', compact('UpdateCategory'));
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
        $validated    = $request->validate([
        'name'        => 'required|min:2',
        ]);
      
        $UpdateCategory        = category::find($id);
        $UpdateCategory->name  = $request->name;
        $UpdateCategory->update();
        Session::flash('msg','Category Update Successfully.');
        return redirect('/categorys');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteCategory = category::find($id);
        $deleteCategory->delete();
        Session::flash('msg','Category Deleted Successfully.');
        return redirect('/categorys');
    }
}
