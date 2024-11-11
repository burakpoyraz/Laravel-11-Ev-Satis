<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;

//Route::get('/', function () {return view('welcome');});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});




Route::get('/',[HomeController::class,'index'] )->name('home');



Route::prefix("admin")->group(function () {
    Route::get("login",[AdminHomeController::class,'login'])->name('adminlogin');
    Route::post("logincheck",[AdminHomeController::class,'logincheck'])->name('adminlogincheck');
});

Route::middleware("auth")->prefix("admin")->group(function () {

    Route::get('/',[AdminHomeController::class,'index'] )->name('adminhome');
    Route::get("logout",[AdminHomeController::class,'logout'])->name('adminlogout');

    //CATEGORY
    Route::prefix("category")->group(function () {
        Route::get('/',[CategoryController::class,'index'] )->name('admincategory');
        Route::get("create",[CategoryController::class,'create'])->name('categorycreate');
        Route::post("store",[CategoryController::class,'store'])->name('categorystore');
        Route::get("edit/{id}",[CategoryController::class,'edit'])->name('categoryedit');
        Route::post("update/{id}",[CategoryController::class,'update'])->name('categoryupdate');
        Route::get("delete/{id}",[CategoryController::class,'destroy'])->name('categorydelete');
    });

});




