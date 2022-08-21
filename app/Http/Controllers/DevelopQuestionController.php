<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\develop_question;
use App\Models\question;
use App\Models\Category;
use App\Models\question_option_score;
use Session;

class DevelopQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $develop_questions = develop_question::leftjoin('categories', 'develop_questions.category_id', '=', 'categories.id')->select('develop_questions.*', 'categories.name as categoryName')-> simplePaginate(5);

        return view('develop_question.index', compact('develop_questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = category::get();

        return view('develop_question.create', [
            'categorys' => $categorys ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function categoryWiseQuestion(Request $request)
    {
        $category_id = $request->get('category_id');

        $question =  Question::where('category_id', $category_id)->get();

        $allQuestion = [];
        foreach($question  as $questionInfo) {


            $option = Question::leftjoin('question_option_score','questions.id','=','question_option_score.question_id')
            ->select('questions.*','question_option_score.option','question_option_score.score')
            ->where('questions.id', $questionInfo->id)
            ->get();

          
            $allQuestion [] = array(
                'qeustion_data' => $option->toArray(),
                'qeustion_name' => $questionInfo->name,
            );

        }
  
        return view('develop_question.category_wise_question', 
            [ 
                'allQuestion' => $allQuestion,
            ]
        );
    }

    public function questionSubmit(Request $request)
    {   

         $name1 = $request->get('name1');
        
        $totalSum = 0;
        foreach ($name1 as $key => $value) {
            $totalSum += $value;

        }

        return redirect('dashboard')->with('status', 'Your Tottal Score:'.' '.$totalSum);
    }

    public function store(Request $request)
    {   

    }

    
}
