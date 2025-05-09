<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FarmerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
 
Route::get('/home' , function () {
    return view('home');
})->name('home') ; 
Route::get('/index' , [UserController::class , "index"] )->name('index') ;
Route::get('/register', [UserController::class  , "register"] )->name('register') ; 
Route::post('/signup' , [UserController::class , "signup"] )->name("signup") ;
Route::get('/login' , [UserController::class , "login"] )->name('login') ; 
Route::post('/signin' , [UserController::class , "sginIn"] )->name('signin') ; 

Route::get('/ListeProducts' , [ProductController::class , "index"] )->name('ListeProducts') ; 
Route::resource('/farmer' , FarmerController::class) ;  
Route::get('/admin/farmer-registrations' , [AdminController::class , "index"] )->name('admin.farmer-registrations') ; 

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/farmer-registrations', [AdminController::class, 'index'])->name('admin.farmer-registrations');
    Route::get('/farmers/{id}/details', [AdminController::class, 'showDetails'])->name('admin.farmers.details');
    Route::post('/farmers/{id}/confirm', [AdminController::class, 'confirmFarmer'])->name('admin.farmers.confirm');
    Route::post('/farmers/{id}/reject', [AdminController::class, 'rejectFarmer'])->name('admin.farmers.reject');
});