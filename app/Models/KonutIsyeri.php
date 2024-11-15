<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KonutIsyeri extends Model
{

    protected $table = 'konut_isyeris';

    protected $fillable = [

        "emlak_id",
        "oda_sayisi",
        "binanin_kat_Sayisi",
        "binanin_yasi",
        "isinma_tipi"



    ]
    ;


    public function emlak(){

        return $this->belongsTo(Emlak::class,"emlak_id","id");
    }
}
