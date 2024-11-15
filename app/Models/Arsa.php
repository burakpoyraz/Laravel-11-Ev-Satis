<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arsa extends Model
{
    protected $table = 'arsas';


    protected $fillable = [
        'id',
        'emlak_id',
        'tapu_durumu',
        'ada',
        'parsel'
    ];
    public function emlak()
    {
        return $this->belongsTo(Emlak::class, 'emlak_id');
    }
}
