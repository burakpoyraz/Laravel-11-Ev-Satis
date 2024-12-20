<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Emlak;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $emlak = Emlak::select("id", "title")->where("id",$id)->first();

        $galeri= Image::where("emlak_id",$id)->get();


        return view("admin.image_add",compact("emlak","galeri"));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$emlak_id)
    {
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                // Yeni bir Image modeli oluştur
                $image = new Image();

                $image->emlak_id = $emlak_id;
                $image->title = $request->input("title") ?: "foto";

                // Görseli kaydet ve path bilgisini modele ata
                $image->image = Storage::putFile("images", $file);

                // Veritabanına kaydet
                $image->save();
            }
        }

        return redirect()->route("adminimagecreate",$emlak_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image,$emlak_id,$id)
    {
        Image::destroy($id);
        return redirect()->route("adminimagecreate",$emlak_id);
    }
}
