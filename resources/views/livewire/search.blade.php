<div>
    <form wire:submit.prevent="searchkategorigetir">
        <input
            wire:model.live="search"
            class="search-input"
            name="search"
            type="text"
            autocomplete="off"
            placeholder="Emlak Ara..."
        />

    @if(!empty($search) && $datalist->count() > 0)
        <div class="search-dropdown">
            @foreach($datalist as $rs)
                <div class="search-item" wire:click="selectEmlak({{ $rs->id }})">


                    <img
                        src="{{\Illuminate\Support\Facades\Storage::url($rs->image)}}"
                        alt="{{ $rs->title }}"
                        class="search-item-image">

                    <span class="search-item-title">{{ $rs->title }}</span>
                    <span class="search-item-price">{{ number_format($rs->fiyati, 0, ',', '.') }} TL</span>
                </div>
            @endforeach
        </div>
    @endif
    </form>

</div>
