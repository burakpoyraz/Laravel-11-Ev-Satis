<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datalist = Faq::all()->sortBy("position");

        return view('admin.faq', compact('datalist'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        return view('admin.faq_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $faq = new Faq();
        $faq->question=$request->input('question');
        $faq->answer=$request->input('answer');
        $faq->position=$request->input('position');
        $faq->status=$request->input('status');
        $faq->save();

        return redirect()->route('adminfaq')->with("success","Ekleme İşlemi Başarılı");
    }
    /**
     * Display the specified resource.
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq,$id)
    {
        $data=Faq::find($id);



        return view('admin.faq_edit', compact("data"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faq $faq,$id)
    {
        $faq = Faq::find($id);
        $faq->question=$request->input('question');
        $faq->answer=$request->input('answer');
        $faq->position=$request->input('position');
        $faq->status=$request->input('status');
        $faq->save();

        return redirect()->route('adminfaq')->with("success","Güncelleme Başarılı");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq,$id)
    {
        Faq::destroy($id);

        return redirect()->back()->with("success","SSS Başarılı bir şekilde silindi");
    }
}
