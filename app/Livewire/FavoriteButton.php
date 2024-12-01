<?php

namespace App\Livewire;

use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FavoriteButton extends Component
{


    public $emlakid;
    public $isfavorite = False;

    public function mount($id)
    {
        $this->emlakid = $id;

        $this->isfavorite = Favorite::where('emlakid', $this->emlakid)->where("userid", Auth::id())->exists();


    }

    public function controlfavorite()
    {

        if ($this->isfavorite) {
            Favorite::where('emlakid', $this->emlakid)->where("userid", Auth::id())->delete();
            $this->isfavorite = False;
        }
        else {
            $favorite=new Favorite();
            $favorite->emlakid=$this->emlakid;
            $favorite->userid=Auth::id();
            $favorite->save();
            $this->isfavorite = True;
        }
    }


    public function render()
    {
        return view('livewire.favorite-button');
    }
}
