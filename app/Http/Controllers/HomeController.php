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

    public static function settings()
    {

        return Setting::first();
    }

    public static function categoryList()
    {
        return Category::where("parentid", 0)->with("children")->get();
    }

    public function index()
    {

        $slider = Emlak::select("id", "title", "image", "fiyati", "slug", "categoryid", "city", "metrekare_toplam_alan")->inRandomOrder()->take(4)->get();
        $gunlukilanlar = Emlak::select("id", "title", "image", "fiyati", "slug", "categoryid", "city", "metrekare_toplam_alan")->inRandomOrder()->take(6)->get();
        $sonilanlar = Emlak::select("id", "title", "image", "fiyati", "slug", "categoryid", "city", "metrekare_toplam_alan")->latest()->take(4)->get();

        $daireler = Emlak::select("id", "title", "image", "fiyati", "slug", "categoryid", "city", "metrekare_toplam_alan")->where("categoryid", 11)->inRandomOrder()->take(4)->get();
        $mustakilevler = Emlak::select("id", "title", "image", "fiyati", "slug", "categoryid", "city", "metrekare_toplam_alan")->where("categoryid", 10)->inRandomOrder()->take(4)->get();
        $arsalar = Emlak::select("id", "title", "image", "fiyati", "slug", "categoryid", "city", "metrekare_toplam_alan")->where("categoryid", 3)->inRandomOrder()->take(4)->get();

        $altkategorilerisyerleriid = Category::where('parentid', 2)->pluck('id');

        $isyerleri = Emlak::select("id", "title", "image", "fiyati", "slug", "categoryid", "city", "metrekare_toplam_alan")->whereIn("categoryid", $altkategorilerisyerleriid)->inRandomOrder()->take(4)->get();
        $sonilanlaraltbolum = Emlak::select("id", "title", "image", "fiyati", "slug", "categoryid", "city", "metrekare_toplam_alan")->latest()->take(15)->get();

        return view('home.index', compact('slider', 'gunlukilanlar', 'sonilanlar', 'daireler', 'mustakilevler', 'arsalar', 'isyerleri', 'sonilanlaraltbolum'));
    }

    public function aboutus()
    {


        return view('home.aboutus');

    }

    public function references()
    {
        return view('home.references');
    }

    public function fag()
    {
        return view('home.fag');
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function sendmessage(request $request)
    {

        try {
            $message = new Message();
            $message->name = $request->input('name');
            $message->email = $request->input('email');
            $message->phone = $request->input('phone');
            $message->subject = $request->input('subject');
            $message->message = $request->input('message');
            $message->ip = $request->ip();
            $message->status = "New";
            $message->save();
            return redirect()->route('contact')->with('success', 'Mesaj başarılı bir şekilde gönderildi.');
        } catch (\Exception $exception) {
            return redirect()->route('contact')->with('error', "Hata" . $exception->getMessage());
        }


    }

    public function ilan($id, $slug)
    {

        $emlak = Emlak::find($id);

        switch ($emlak->kategori->parentid) {
            case Category::KONUT:
            case Category::ISYERI:
            case Category::BINA:
            case Category::DEVREMULK:
                $cins="KONUT_ISYERI";
                $ozellik = $emlak->konutIsyeriOzellikleri;
                break;

            case Category::ARSA:
                $cins="ARSA";
                $ozellik = $emlak->arsaOzellikleri;
                break;

            case Category::TURISTIK_TESIS:
                $cins="TURISTIK_TESIS";
                $ozellik = $emlak->turistikTesisOzellikleri;
                break;

            default:
                $cins="";
                $ozellik = null;
        }

        if ($emlak->categoryid == Category::ARSA) {
            $cins="ARSA";
            $ozellik = $emlak->arsaOzellikleri;
        }

        $resimler=$emlak->images->pluck('image');
        $resimler->prepend($emlak->image);



        return view('home.ilan_detay', compact('emlak', 'resimler',"cins","ozellik"));

    }

    public function categoryilanlar($id, $slug)
    {

        $category = Category::select("id", "title")->where("id", $id)->first();

        $ilanlar = Emlak::where("categoryid", $id)->get();

        $sayisi = count($ilanlar);


        return view('home.category_ilan', compact('id', 'slug', 'category', 'ilanlar', 'sayisi'));


    }


}
