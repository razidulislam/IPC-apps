<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Employee;
use Session;



class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = employee::simplePaginate(5);
        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
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
        'email'       => 'required',
        'mobile'      => 'required|min:11',
        'gender'      => 'required',
        'designation' => 'required',
        ]);

        $employees              = new employee();
        $employees->name        = $request->name;
        $employees->email       = $request->email;
        $employees->mobile      = $request->mobile;
        $employees->gender      = $request->gender;
        $employees->designation = $request->designation;
        $employees->save();
        Session::flash('msg','Employee Created Successfully.');
        return redirect('/employees');
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
        $UpdateEmployee = employee::find($id);
        return view('employee.edit', compact('UpdateEmployee'));
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
        'name'        => 'required|min:2',
        'email'       => 'required',
        'mobile'      => 'required',
        'gender'      => 'required',
        'designation' => 'required',
        ]);
      
        $UpdateEmployee              = employee::find($id);
        $UpdateEmployee->name        = $request->name;
        $UpdateEmployee->email       = $request->email;
        $UpdateEmployee->mobile      = $request->mobile;
        $UpdateEmployee->gender      = $request->gender;
        $UpdateEmployee->designation = $request->designation;
        $UpdateEmployee->update();
        Session::flash('msg','Employee Update Successfully.');
        return redirect('/employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $deleteEmployee = employee::find($id);
        $deleteEmployee->delete();
        Session::flash('msg','Employee Deleted Successfully.');
        return redirect('/employees');
    }
}
