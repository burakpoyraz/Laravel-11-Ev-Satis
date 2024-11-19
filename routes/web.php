<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EmlakController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\UserController;
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


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/aboutus', [HomeController::class, 'aboutus'])->name('aboutus');
Route::get("references",[HomeController::class,"references"])->name("references");
Route::get("fag",[HomeController::class,"fag"])->name("fag");
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get("logout",[HomeController::class,"logout"])->name('logout');

Route::prefix("admin")->group(function () {
    Route::get("login", [AdminHomeController::class, 'login'])->name('adminlogin');
    Route::post("logincheck", [AdminHomeController::class, 'logincheck'])->name('adminlogincheck');
});

Route::middleware("auth")->prefix("admin")->group(function () {

    Route::get('/', [AdminHomeController::class, 'index'])->name('adminhome');
    Route::get("logout", [AdminHomeController::class, 'logout'])->name('adminlogout');

    //CATEGORY
    Route::prefix("category")->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admincategory');
        Route::get("create", [CategoryController::class, 'create'])->name('categorycreate');
        Route::post("store", [CategoryController::class, 'store'])->name('categorystore');
        Route::get("edit/{id}", [CategoryController::class, 'edit'])->name('categoryedit');
        Route::post("update/{id}", [CategoryController::class, 'update'])->name('categoryupdate');
        Route::get("delete/{id}", [CategoryController::class, 'destroy'])->name('categorydelete');
    });

    //EMLAKS
    Route::prefix("emlak")->group(function () {
        Route::get('/', [EmlakController::class, 'index'])->name('adminemlaks');
        Route::get("create", [EmlakController::class, 'create'])->name('adminemlakcreate');
        Route::post("store", [EmlakController::class, 'store'])->name('adminemlakstore');
        Route::get("edit/{id}", [EmlakController::class, 'edit'])->name('adminemlakedit');
        Route::post("update/{id}/{ozellik_id}", [EmlakController::class, 'update'])->name('adminemlakupdate');
        Route::get("delete/{id}", [EmlakController::class, 'destroy'])->name('adminemlakdelete');
    });

    Route::prefix("image")->group(function () {
        Route::get("create/{id}", [ImageController::class, 'create'])->name('adminimagecreate');
        Route::post("store/{id}", [ImageController::class, 'store'])->name('adminimagestore');
        Route::get("delete/{emlak_id}/{id}", [ImageController::class, 'destroy'])->name('adminimagedelete');
    });
    Route::prefix("setting")->group(function () {
        Route::get("/", [SettingController::class, 'index'])->name('adminsetting');
        Route::post("update", [SettingController::class, 'update'])->name('adminsettingupdate');


    });

});



Route::middleware("auth")->prefix("myuser")->group(function () {
    Route::get("/", [UserController::class, 'index'])->name('userhome');


});

Route::middleware("auth")->prefix("user")->group(function () {
    Route::get("/profile", [UserController::class, 'index'])->name('userprofile');
});


