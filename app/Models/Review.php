<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';

    protected $fillable = [
        "emlakid",
        "userid",
        "subject",
        "question",
        "ip",
        "status",
        "answer",
        "answered_at"
    ];

    public function user(){
        return $this->belongsTo(User::class, 'userid', 'id');
    }

    public function emlak(){
        return $this->belongsTo(Emlak::class,'emlakid', 'id');
    }
}
