<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Arsa;
use App\Models\Category;
use App\Models\Emlak;
use App\Models\KonutIsyeri;
use App\Models\TuristikTesis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmlakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $emlaks = Emlak::all();


        return view('Admin.ilan', compact('emlaks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select("id", "title")->where("parentid", 0)->get();

        return view('Admin.ilan_add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $emlak = new Emlak();
        $emlak->title = $request->input('title');
        $emlak->keywords = $request->input('keywords');
        $emlak->description = $request->input('description');
        $emlak->address = $request->input('address');
        $emlak->city = $request->input('city');
        $emlak->image = $request->input('image');
        $emlak->categoryid = $request->input('categoryid');
        $emlak->detail = $request->input('detail');
        $emlak->metrekare_toplam_alan = $request->input('metrekare_toplam_alan');
        $emlak->fiyati = $request->input('fiyati');
        $emlak->krediye_uygunluk = $request->input('krediye_uygunluk');
        $emlak->userid = Auth::id();
        $emlak->slug = $request->input('slug');
        $emlak->status = $request->input('status');
        $emlak->save();


        switch ($emlak->categoryid) {
            case Category::ISYERI:
            case Category::BINA:
            case Category::DEVREMULK:
            case Category::KONUT:

                $konut_ozellikleri = new KonutIsyeri();

                $konut_ozellikleri->emlak_id = $emlak->id;
                $konut_ozellikleri->oda_sayisi = (int)$request->input('oda_sayisi');
                $konut_ozellikleri->binanin_kat_sayisi = (int)$request->input('binanin_kat_sayisi');
                $konut_ozellikleri->binanin_yasi = (int)$request->input('binanin_yasi');
                $konut_ozellikleri->isinma_tipi = $request->input('isinma_tipi');
                $konut_ozellikleri->save();
                break;

            case Category::ARSA:

                $arsa_ozellikleri = new Arsa();
                $arsa_ozellikleri->emlak_id = $emlak->id;
                $arsa_ozellikleri->tapu_durumu = $request->input('tapu_durumu');
                $arsa_ozellikleri->ada = $request->input('ada');
                $arsa_ozellikleri->parsel = $request->input('parsel');

                $arsa_ozellikleri->save();
                break;

            case Category::TURISTIK_TESIS:
                $turistik_tesis_ozellikleri = new TuristikTesis();

                $turistik_tesis_ozellikleri->emlak_id = $emlak->id;
                $turistik_tesis_ozellikleri->kapali_alan_metrekare = $request->input('kapali_alan_metrekare');
                $turistik_tesis_ozellikleri->acik_alan_metrekare = $request->input('acik_alan_metrekare');
                $turistik_tesis_ozellikleri->oda_sayisi = $request->input('oda_sayisi_turistik');
                $turistik_tesis_ozellikleri->binanin_kat_sayisi = $request->input('binanin_kat_sayisi_turistik');
                $turistik_tesis_ozellikleri->binanin_yasi = $request->input('binanin_yasi_turistik');
                $turistik_tesis_ozellikleri->yatak_Sayisi = $request->input('yatak_Sayisi');

                $turistik_tesis_ozellikleri->save();

        }


        return redirect()->route('adminemlaks');

    }


    /**
     * Display the specified resource.
     */
    public function show(Emlak $emlak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Emlak $emlak, $id)
    {


        // $emlak = Emlak::with('konutIsyeriOzellikleri')->find(4);
        //  dd($emlak);
        $emlak = Emlak::find($id);


        switch ($emlak->categoryid) {
            case Category::KONUT:
            case Category::ISYERI:
            case Category::BINA:
            case Category::DEVREMULK:
                $ozellik = $emlak->konutIsyeriOzellikleri;
                break;
            case Category::ARSA:
                $ozellik = $emlak->arsaOzellikleri;
                break;
            case Category::TURISTIK_TESIS:
                $ozellik = $emlak->turistikTesisOzellikleri;
                break;

            default:
                $ozellik = null;


        }


        $categories = Category::select("id", "title")->where("parentid", 0)->get();

        return view('Admin.ilan_edit', compact('emlak', 'categories', 'ozellik'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Emlak $emlak, $id, $ozellik_id)
    {


        $emlak = Emlak::find($id);
        $eski_kategori = $emlak->kategoriid;


        $emlak->title = $request->input('title');
        $emlak->keywords = $request->input('keywords');
        $emlak->description = $request->input('description');
        $emlak->address = $request->input('address');
        $emlak->city = $request->input('city');
        $emlak->image = $request->input('image');
        $emlak->categoryid = $request->input('categoryid');
        $emlak->detail = $request->input('detail');
        $emlak->metrekare_toplam_alan = $request->input('metrekare_toplam_alan');
        $emlak->fiyati = $request->input('fiyati');
        $emlak->krediye_uygunluk = $request->input('krediye_uygunluk');
        $emlak->userid = Auth::id();
        $emlak->slug = $request->input('slug');
        $emlak->status = $request->input('status');
        $emlak->save();


        //kategori değiştiyse eski özellikleri sil

        if ($eski_kategori != $emlak->categoryid) {
            switch ($eski_kategori) {
                case Category::KONUT:
                case Category::ISYERI:
                case Category::BINA:
                case Category::DEVREMULK:
                    KonutIsyeri::where("emlak_id", $emlak->id)->delete();
                    break;
                case Category::ARSA:

                    Arsa::where("emlak_id", $emlak->id)->delete();
                    break;
                case Category::TURISTIK_TESIS:
                    TuristikTesis::where("emlak_id", $emlak->id)->delete();
                    break;
                default:
                    //başka herhangi bir kategori ise
                    KonutIsyeri::where('emlak_id', $emlak->id)->delete();
                    Arsa::where('emlak_id', $emlak->id)->delete();
                    TuristikTesis::where('emlak_id', $emlak->id)->delete();


            }
        }


        //güncellenen kategori özelliklerini kaydet
        switch ($emlak->categoryid) {
            case Category::KONUT:
            case Category::ISYERI:
            case Category::BINA:
            case Category::DEVREMULK:


                $konut_ozellikleri = KonutIsyeri::firstOrNew(["id" => $ozellik_id]);
                $konut_ozellikleri->emlak_id = $emlak->id;
                $konut_ozellikleri->oda_sayisi = (int)$request->input('oda_sayisi');
                $konut_ozellikleri->binanin_kat_sayisi = (int)$request->input('binanin_kat_sayisi');
                $konut_ozellikleri->binanin_yasi = (int)$request->input('binanin_yasi');
                $konut_ozellikleri->isinma_tipi = $request->input('isinma_tipi');
                $konut_ozellikleri->save();
                break;

            case Category::ARSA:

                $arsa_ozellikleri = Arsa::firstOrNew(["id" => $ozellik_id]);
                $arsa_ozellikleri->emlak_id = $emlak->id;
                $arsa_ozellikleri->tapu_durumu = $request->input('tapu_durumu');
                $arsa_ozellikleri->ada = $request->input('ada');
                $arsa_ozellikleri->parsel = $request->input('parsel');

                $arsa_ozellikleri->save();
                break;

            case Category::TURISTIK_TESIS:
                $turistik_tesis_ozellikleri = TuristikTesis::firstOrNew(["id" => $ozellik_id]);

                $turistik_tesis_ozellikleri->emlak_id = $emlak->id;
                $turistik_tesis_ozellikleri->kapali_alan_metrekare = $request->input('kapali_alan_metrekare');
                $turistik_tesis_ozellikleri->acik_alan_metrekare = $request->input('acik_alan_metrekare');
                $turistik_tesis_ozellikleri->oda_sayisi = $request->input('oda_sayisi_turistik');
                $turistik_tesis_ozellikleri->binanin_kat_sayisi = $request->input('binanin_kat_sayisi_turistik');
                $turistik_tesis_ozellikleri->binanin_yasi = $request->input('binanin_yasi_turistik');
                $turistik_tesis_ozellikleri->yatak_Sayisi = $request->input('yatak_Sayisi');

                $turistik_tesis_ozellikleri->save();

        }


        return redirect()->route('adminemlaks');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Emlak $emlak, $id)
    {
        $emlak = Emlak::find($id);


        KonutIsyeri::where('emlak_id', $emlak->id)->delete();
        Arsa::where('emlak_id', $emlak->id)->delete();
        TuristikTesis::where('emlak_id', $emlak->id)->delete();

        $emlak->delete();

        return redirect()->route('adminemlaks');


    }
}
