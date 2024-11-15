<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    const KONUT = 15;
    const ISYERI = 16;
    const ARSA = 17;
    const BINA = 19;
    const DEVREMULK = 20;
    const TURISTIK_TESIS = 21;




    public function parent()
    {
        return $this->belongsTo(Category::class, 'parentid');
    }
}
