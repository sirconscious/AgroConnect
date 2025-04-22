<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
 
Route::get('/home' , function () {
    return view('home');
})->name('home') ; 

Route::get('/register', [UserController::class  , "register"] )->name('register') ; 
Route::post('/signup' , [UserController::class , "signup"] )->name("signup") ;
Route::get('/login' , [UserController::class , "login"] )->name('login') ; 
Route::post('/signin' , [UserController::class , "sginIn"] )->name('signin') ; 
