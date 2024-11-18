<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public static function settings(){

        return Setting::first();
    }

    public static function categoryList()
    {
        return Category::where("parentid",0)->with("children")->get();
    }

    public function index(){




        return view('home.index');
    }

    public function aboutus(){

    }
    public function references(){

    }
    public function fag(){

    }
    public function contact(){

    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
