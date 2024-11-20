<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Emlak;
use App\Models\Message;
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

        $slider=Emlak::inRandomOrder()->take(4)->get();


        return view('home.index',compact('slider'));
    }

    public function aboutus(){


        return view('home.aboutus');

    }
    public function references(){
        return view('home.references');
    }
    public function fag(){
        return view('home.fag');
    }
    public function contact(){
        return view('home.contact');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function sendmessage(request $request){

        try {
            $message= new Message();
            $message->name=$request->input('name');
            $message->email =$request->input('email');
            $message->phone =$request->input('phone');
            $message->subject =$request->input('subject');
            $message->message =$request->input('message');
            $message->ip =$request->ip();
            $message->status ="New";
            $message->save();
            return redirect()->route('contact')->with('success','Mesaj başarılı bir şekilde gönderildi.');
        }
        catch (\Exception $exception){
            return redirect()->route('contact')->with('error',"Hata" . $exception->getMessage());
        }




    }
    public function ilan($id,$slug){


        $emlak=Emlak::find($id);

        dd($emlak);

    }

    public function categoryilanlar($id,$slug){

        $category=Category::select("id","title")->where("id",$id)->first();

        $ilanlar=Emlak::where("categoryid",$id)->get();

        $sayisi=count($ilanlar);





        return view('home.category_ilan',compact('id','slug','category','ilanlar','sayisi'));



    }



}
