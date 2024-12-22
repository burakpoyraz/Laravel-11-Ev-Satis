<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public static function sorucevaplarlistesi(){





    }


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

    public function cevapverileceksorularigetir(){

        $cevapverileceksorular = Review::whereRelation('emlak', 'userid', Auth::id())
            ->with('emlak') // İlgili emlak bilgilerini de yükler
            ->orderBy('created_at', 'desc')
            ->get();

        return view("home.answers", compact("cevapverileceksorular"));

    }

    public function editanswerquestion($id)
    {

        $review=Review::find($id);

        if ($review->status=="False") {
            $review->status = "True"; //okundu;
            $review->save();
        }


        return view("home.user_edit_answer_question", compact("review"));


    }

    public function storeanswerquestion(Request $request,$id){


        $review = Review::find($id);
        $review->answer = $request->input("answer");
        $review->answered_at =Carbon::now();
        $review->status="CV"; //cevapVerildi;
        $review->save();



        return  "<script>
                window.close();
            </script>";


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
    public function edit(User $user,$id)
    {

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
