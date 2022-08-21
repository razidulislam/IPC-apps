<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\question;
use App\Models\Category;
use App\Models\question_option_score;
use Session;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = question::leftjoin('categories', 'questions.category_id', '=', 'categories.id')->select('questions.*', 'categories.name as categoryName')-> simplePaginate(10);
        return view('question.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = category::get();

        return view('question.create', [
            'categorys' => $categorys ]
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
        $validated    = $request->validate([
        'category_id' => 'required',
        'name'        => 'required|min:2',
        'option'      => 'required',
        ]);

        $questions              = new question();
        $questions->category_id = $request->category_id;
        $questions->name        = $request->name;

        if ($questions->save()) {
            $question_id = $questions->id;
            $option      = $request->option;
            $score       = $request->score;

            if (!empty($option)) {
                
                foreach ($option as $key => $value){
                    $questionsOptionScore              = new question_option_score();
                    $questionsOptionScore->question_id = $question_id;
                    $questionsOptionScore->option      = $option[$key];
                    $questionsOptionScore->score       = $score[$key];
                    $questionsOptionScore->save();
                }
            }
        }

        Session::flash('msg','Question Created Successfully.');
        return redirect('/questions');
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
        $categorys = category::get();
        $UpdateQuestion = question::find($id);
        return view('question.update', compact('UpdateQuestion'));
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
       $validated     = $request->validate([
        'category_id' => 'required',
        'name'        => 'required|min:2',
        ]);
      
        $UpdateQuestion              = question::find($id);
        $UpdateQuestion->category_id = $request->category_id;
        $UpdateQuestion->name        = $request->name;
        $UpdateQuestion->option      = $request->option;
        $UpdateQuestion->update();
        Session::flash('msg','Question Update Successfully.');
        return redirect('/questions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteQuestion = question::find($id);
        $deleteQuestion->delete();
        Session::flash('msg','Question Deleted Successfully.');
        return redirect('/questions');
    }
}
