<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;

class LoginAuthController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }
    public function registration()
    {
        return view("auth.registration");
    }
    public function registerUser(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|max:12|unique:users'
        ]);
        $user       = new User();
        $user->name = $request->name;
        $user->email= $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();
        if ($res) {
            return back()->with('success', 'You have registered successfuly.');
        } else {
            return back()->with('fail', 'Something wrong.');
        }
    }
    public function loginUser(Request $request){
        $request->validate([
            'email'    =>'required|email',
            'password' =>'required|min:6|max:12'
        ]);
        $user = User::where('email', '=', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('loginId', $user->id);
                return redirect('dashboard');
            } else {
                return back()->with('fail', 'Password not matched.');
            }
        } else {
            return back()->with('fail', 'This email is not regisered.');
        }
    }
    public function dashboard(){
        return view('dashboard');
    }
    public function contentCreate()
    {
        return view("content-create");
    }
    public function logout(){
        return redirect('login');
    }
}
