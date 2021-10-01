<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
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
    return redirect(\route('books'));
});

Route::get('/books',[BookController::class,'getAllBooks'])->name('books');

Route::view('/books/add', 'adding')->middleware('auth')->name('add');

Route::get('/user/books', [BookController::class,'getUserBooks'])->middleware('auth')->name('private');

Route::post('/books/add',[BookController::class,'add'])->middleware('auth');

Route::get('/user/login',function(){
    if(Auth::check()){
        return redirect('/user/books');
    }
    return view('login');
})->name('login');

Route::get('/user/register',function(){
    if(Auth::check()){
        return redirect('/user/books');
    }
    return view('register');
})->name('register');

Route::post('/user/login', [UserController::class,'signin']);

Route::get('/user/logout', function(){
    Auth::logout();
    return redirect('/');
});

Route::post('/user/register',[UserController::class,'register']);

Route::post('/books/search',[BookController::class,'search']);

Route::delete("/user/books/{id}",[BookController::class,'delete']);
