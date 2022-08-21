<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Content;
use Session;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $contents = content::simplePaginate(5);
        return view('content.index' ,compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.create');
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
        'title'       => 'required|min:2',
        'description' => 'required',
        ]);

        $contents              = new content();
        $contents->title       = $request->title;
        $contents->description = $request->description;
        $contents->remarks     = $request->remarks;
        $contents->save();
        Session::flash('msg','Content Created Successfully.');
        return redirect('/contents');
    
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
      $updateContent = content::find($id);
        return view('content.edit',compact('updateContent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateContent(Request $request, $id)
    { 
        $validated    = $request->validate([
        'title'       => 'required|min:2',
        'description' => 'required',
        ]);
     
        $contents              = content::find($id);
        $contents->title       = $request->title;
        $contents->description = $request->description;
        $contents->remarks     = $request->remarks;
        $contents->update();
        Session::flash('msg','Content Updated Successfully.');
        return redirect('/contents');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $deleteContent = content::find($id);
        $deleteContent->delete();
        Session::flash('msg','Content Deleted Successfully.');
        return redirect('/contents');
    }
}

