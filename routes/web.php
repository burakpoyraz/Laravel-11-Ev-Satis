<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EmlakController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\EmlakController as HomeEmlakController;
use App\Http\Controllers\ImageController as HomeImageController;

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
Route::get("references", [HomeController::class, "references"])->name("references");
Route::get("fag", [HomeController::class, "fag"])->name("fag");
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get("logout", [HomeController::class, "logout"])->name('logout');
Route::post("sendmessage", [HomeController::class, "sendmessage"])->name('sendmessage');
Route::get("/ilan/{id}/{slug}", [HomeController::class, "ilan"])->name('ilan');
Route::get("/kategoriler/{id}/{slug}", [HomeController::class, "categoryilanlar"])->name('categoryilanlar');
Route::post("/emlakgetir", [HomeController::class, "emlakgetir"])->name('emlakgetir');
Route::get("searchemlakara/{kelime}", [HomeController::class, "searchemlakara"])->name('searchemlakara');
Route::get("faq", [HomeController::class, "faq"])->name('faq');


Route::prefix("admin")->group(function () {
    Route::get("login", [AdminHomeController::class, 'login'])->name('adminlogin');
    Route::post("logincheck", [AdminHomeController::class, 'logincheck'])->name('adminlogincheck');
});

Route::middleware("auth")->prefix("admin")->group(function () {

    Route::middleware("admin")->group(function () {
        Route::get('/', [AdminHomeController::class, 'index'])->name('adminhome');
        Route::get("logout", [AdminHomeController::class, 'logout'])->name('adminlogout');

        Route::prefix("profile")->group(function () {
            Route::get('/', [ProfileController::class, 'show'])->name('profile.show');
        });
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
        Route::prefix("messages")->group(function () {
            Route::get("/", [MessageController::class, 'index'])->name('adminmessages');
            Route::get("edit/{id}", [MessageController::class, 'edit'])->name('adminmessageedit');
            Route::post("update/{id}", [MessageController::class, 'update'])->name('adminmessageupdate');
            Route::get("delete/{id}", [MessageController::class, 'destroy'])->name('adminmessagedelete');

        });
        Route::prefix("questions")->group(function () {
            Route::get("/", [ReviewController::class, 'index'])->name('adminquestions');
            Route::post("update/{id}", [ReviewController::class, 'update'])->name('adminquestionupdate');
            Route::get("delete/{id}", [ReviewController::class, 'destroy'])->name('adminquestiondelete');
            Route::get("show/{id}", [ReviewController::class, 'show'])->name('adminquestionshow');

        });

        Route::prefix("faq")->group(function () {
            Route::get("/", [FaqController::class, 'index'])->name('adminfaq');
            Route::get("create", [FaqController::class, 'create'])->name('adminfaqcreate');
            Route::post("store", [FaqController::class, 'store'])->name('adminfaqstore');
            Route::get("edit/{id}", [FaqController::class, 'edit'])->name('adminfaqedit');
            Route::post("update/{id}", [FaqController::class, 'update'])->name('adminfaqupdate');
            Route::get("delete/{id}", [FaqController::class, 'destroy'])->name('adminfaqdelete');
            Route::get("show/{id}", [FaqController::class, 'show'])->name('adminfaqshow');
        });

        Route::prefix("users")->group(function () {
            Route::get("/", [AdminUserController::class, 'index'])->name('adminusers');
            Route::get("create", [AdminUserController::class, 'create'])->name('adminusercreate');
            Route::post("store", [AdminUserController::class, 'store'])->name('adminuserstore');
            Route::get("edit/{id}", [AdminUserController::class, 'edit'])->name('adminuseredit');
            Route::post("update/{id}", [AdminUserController::class, 'update'])->name('adminuserupdate');
            Route::get("delete/{id}", [AdminUserController::class, 'destroy'])->name('adminuserdelete');
            Route::get("show/{id}", [AdminUserController::class, 'show'])->name('adminusershow');
            Route::get("userrole/{id}", [AdminUserController::class, 'userroles'])->name('userroles');
            Route::post("userrolestore/{id}", [AdminUserController::class, 'userrolesstore'])->name('userrolesstore');
            Route::get("userroledelete/{userid}/{roleid}", [AdminUserController::class, 'userrolesdelete'])->name('userrolesdelete');
        });


    });



});


Route::middleware("auth")->prefix("myuser")->group(function () {
    Route::get("/", [UserController::class, 'index'])->name('userhome');
    Route::get("/questions", [UserController::class, 'getquestions'])->name('getquestions');
    Route::get("/deletequestion/{id}", [UserController::class, 'deletequestion'])->name('deletequestion');


    Route::prefix("emlak")->group(function () {
        Route::get('/', [HomeEmlakController::class, 'index'])->name('homeemlaks');
        Route::get("create", [HomeEmlakController::class, 'create'])->name('homeemlakcreate');
        Route::post("store", [HomeEmlakController::class, 'store'])->name('homeemlakstore');
        Route::get("edit/{id}", [HomeEmlakController::class, 'edit'])->name('homeemlakedit');
        Route::post("update/{id}/{ozellik_id}", [HomeEmlakController::class, 'update'])->name('homeemlakupdate');
        Route::get("delete/{id}", [HomeEmlakController::class, 'destroy'])->name('homeemlakdelete');
    });

    Route::prefix("image")->group(function () {
        Route::get("create/{id}", [HomeImageController::class, 'create'])->name('homeimagecreate');
        Route::post("store/{id}", [HomeImageController::class, 'store'])->name('homeimagestore');
        Route::get("delete/{emlak_id}/{id}", [HomeImageController::class, 'destroy'])->name('homeimagedelete');
    });

    Route::prefix("favorite")->group(function () {
        Route::get('/', [FavoritesController::class, 'index'])->name('homefavorite');
        Route::post("store", [FavoritesController::class, 'store'])->name('homefavoritestore');
        Route::post("update/{id}", [FavoritesController::class, 'update'])->name('homefavoriteupdate');
        Route::get("delete/{id}", [FavoritesController::class, 'destroy'])->name('homefavoritedelete');
    });


});


//Route::middleware("auth")->prefix("user")->group(function () {
//    Route::get("/profile", [UserController::class, 'index'])->name('userprofile');
//});
