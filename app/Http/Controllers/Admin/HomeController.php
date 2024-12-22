<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Emlak;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{


    public function index()
    {

        $data = [
            "ilanlar" =>
                [
                    "onaylananilansayisi"=> Emlak::where("status","True")->count(),
                    "onaybekleyenilansayisi"=> Emlak::where("status","False")->count(),

                    "soneklenenilanlar"=> Emlak::with('kategori')
                        ->select("id","title","city","metrekare_toplam_alan","fiyati","categoryid","slug")
                        ->latest()
                        ->take(3)
                        ->get(),


                ],
            "users"=>[

                "toplamkullanicisayisi"=> User::all()->count(),
                "soneklenenkullanicilar" => User::select('id', 'name', 'created_at')
                    ->latest()
                    ->take(3)
                    ->get(),
            ],
            "messages"=>[
                "okunanmesajsayisi"=> Message::where("status","Old")->count(),
                "okunmayanmesajsayisi"=> Message::where("status","New")->count(),
            ]

        ];




        return view('admin.index',compact('data'));
    }

    public function login()
    {

        return view('admin.login');
    }


    public function logincheck(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('admin');
        }

        return back()->withErrors([
            'email' => 'Girilen bilgiler hatalı.',
        ])->withInput($request->only('email'));

    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }


}
