<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function emlak()
    {
        return $this->belongsTo(Emlak::class, 'emlak_id');
    }
}
