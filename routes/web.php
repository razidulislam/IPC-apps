<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginAuthController;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DevelopQuestionController;
use Illuminate\Contracts\Auth\CanResetPassword;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [LoginAuthController::class,'login']);
Route::get('/registration', [LoginAuthController::class,'registration']);
Route::post('/regester-user', [LoginAuthController::class,'registerUser'])->name('register-user');
Route::post('/login-user', [LoginAuthController::class,'loginUser'])->name('login-user');
Route::get('/dashboard', [LoginAuthController::class,'dashboard']);
Route::get('/logout', [LoginAuthController::class,'logout']);
//Route::get('/content-create', [LoginAuthController::class,'contentCreate']);

Route::resource('contents', ContentController::class, ['names' => 'content']);
Route::post('contents-update/{id}',  'App\Http\Controllers\ContentController@updateContent')->name('udateContent');
Route::resource('employees', 'App\Http\Controllers\EmployeeController',['names' => 'employee']);
Route::resource('categorys', 'App\Http\Controllers\CategoryController',['names' => 'category']);
Route::resource('questions', 'App\Http\Controllers\QuestionController',['names' => 'question']);
Route::resource('options', 'App\Http\Controllers\OptionController',['names' => 'option']);
Route::resource('develop_questions', 'App\Http\Controllers\DevelopQuestionController',['names' => 'develop_question']);
Route::get('category/wise/question', 'App\Http\Controllers\DevelopQuestionController@categoryWiseQuestion');
Route::post('question-submit', 'App\Http\Controllers\DevelopQuestionController@questionSubmit');


//Reset Password 
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
    $status = Password::sendResetLink(
        $request->only('email')
    );
 
    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
                
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);
 
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
 
            $user->save();
 
            event(new PasswordReset($user));
        }
    );
 
    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');
