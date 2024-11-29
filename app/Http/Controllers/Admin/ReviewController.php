<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $sorular = Review::all();
        return view('admin.questions', compact('sorular'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review,$id)
    {
        $soru=Review::find($id);


        return view('admin.question_show', compact('soru'));


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review,$id)
    {
        $soru=Review::find($id);
        $soru->status=$request->input('status');
        $soru->save();

        return redirect()->back()->with("success","Soru Güncellendi");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review,$id)
    {
        Review::destroy($id);
        return redirect()->back()->with("success","Soru Silindi");
    }
}
