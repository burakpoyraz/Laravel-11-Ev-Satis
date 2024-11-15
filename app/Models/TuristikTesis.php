<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TuristikTesis extends Model
{

    protected $table = 'turistik_teses';


    protected $fillable = [
        "id",
        "emlak_id",
        "kapali_alan_metrekare",
        "acik_alan_metrekare",
        "oda_sayisi",
        "binanin_kat_sayisi",
        "binanin_yasi",
        "yatak_Sayisi"
    ];


    public function emlak()
    {
        return $this->belongsTo(Emlak::class, 'emlak_id');
    }
}
