<?php

namespace App\Livewire;

use App\Models\Emlak;
use Livewire\Component;

class Search extends Component
{
    public $search = "";


    public function searchkategorigetir()
    {

        return redirect()->route('searchemlakara',["kelime"=>$this->search]);
    }

    public function selectEmlak($id)
    {
        $emlak = Emlak::find($id);


        return redirect()->route('ilan', ['id' => $emlak->id, 'slug' => $emlak->slug]);
    }


    public function render()
    {
        $datalist = Emlak::where(function ($query) {
            $query->where('title', 'LIKE', '%' . $this->search . '%')
                ->orWhere('city', 'LIKE', '%' . $this->search . '%');
        })->limit(10)->get();


        return view('livewire.search', [
            'datalist' => $datalist,
            'query' => $this->search,
        ]);

    }
}
