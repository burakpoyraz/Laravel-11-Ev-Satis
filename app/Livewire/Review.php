<?php

namespace App\Livewire;

use AllowDynamicProperties;
use App\Models\Emlak;
use App\Models\Review as ModelsReview;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
class Review extends Component
{

    public $emlak,$subject,$question,$emlakid;

    public function mount($id){

        $this->emlak=Emlak::findOrFail($id);
        $this->emlakid=$this->emlak->id;

    }

    public function store(){


        $this->validate([
            'subject'=>'required',
            'question'=>'required',

        ]);

        $review = new ModelsReview();
        $review->subject = $this->subject;
        $review->question = $this->question;
        $review->emlakid = $this->emlakid;
        $review->userid=Auth::id();
        $review->ip=$_SERVER['REMOTE_ADDR'];
        $review->status="False";
        $review->save();


        session()->flash('message','Sorunuz başarıyla gönderildi');
        $this->resetInput();

    }


    public function render()
    {
        return view('livewire.review');
    }

    private function resetInput()
    {
        $this->subject = null;
        $this->question = null;
        $this->emlakid = null;

    }
}
