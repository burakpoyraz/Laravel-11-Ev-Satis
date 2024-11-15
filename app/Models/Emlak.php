<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emlak extends Model
{

    use HasFactory;



    public function kategori(){

        return $this->belongsTo(Category::class, 'categoryid',"id");
    }

    public function kullanici(){
        return $this->belongsTo(User::class, 'userid',"id");
    }

    public function konutIsyeriOzellikleri()
    {
        return $this->hasOne(KonutIsyeri::class, 'emlak_id',"id");
    }

    public function arsaOzellikleri()
    {
        return $this->hasOne(Arsa::class, 'emlak_id',"id");
    }

    public function turistikTesisOzellikleri()
    {
        return $this->hasOne(TuristikTesis::class, 'emlak_id',"id");
    }
}
