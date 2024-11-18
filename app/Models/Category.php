<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    const KONUT = 1;
    const ISYERI = 2;
    const ARSA = 3;
    const BINA = 4;
    const DEVREMULK = 5;
    const TURISTIK_TESIS = 6;




    public function parent()
    {
        return $this->belongsTo(Category::class, 'parentid');
    }

    public function children(){
        return $this->hasMany(Category::class, 'parentid');
    }

    public function emlak()
    {
        return $this->hasMany(Emlak::class, 'categoryid');
    }
}
