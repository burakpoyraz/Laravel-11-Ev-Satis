<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


    public function getquestions()
    {

        $sorucevaplar = Review::where("userid", Auth::user()->id)->get();


        return view("home.questions", compact("sorucevaplar"));

    }

    public function deletequestion($id)
    {

        Review::destroy($id);

        return redirect()->back()->with("message","Soru Silindi!");



    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        return view('home.user_profile');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
