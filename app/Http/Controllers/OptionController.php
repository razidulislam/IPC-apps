<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Option;
use App\Models\Category;
use App\Models\question;
use Session;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $options = option::leftjoin('categories', 'options.category_id', '=', 'categories.id')->select('options.*','categories.name as categoryName')->simplePaginate(5);
        return view('option.index', compact('options'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = category::get();
        $questions = question::get();

       return view('option.create', [
            'categorys' => $categorys,
            'questions' => $questions,
             ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // $validated    = $request->validate([
       //  'category_id' => 'required',
       //  'question_id' => 'required',
       //  'name'        => 'required|min:2',
       //  'score'        => 'required',
       //  ]);

        $options              = new option();
        $options->category_id = $request->category_id;
        $options->question_id = $request->question_id;
        $options->name        = $request->name;
        $options->score       = $request->score;
        $options->save();
        Session::flash('msg','Option Name Created Successfully.');
        return redirect('/options');
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
       $UpdateOption = option::find($id);
        return view('option.update', compact('UpdateOption'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteOption = option::find($id);
        $deleteOption->delete();
        Session::flash('msg','Option Deleted Successfully.');
        return redirect('/options');
    }
}
