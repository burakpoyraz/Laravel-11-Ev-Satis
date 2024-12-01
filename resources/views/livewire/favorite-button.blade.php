
    <button wire:click="controlfavorite" class="{{ $this->isfavorite ? 'favori-active' : 'favori-inactive' }}">
        @if($this->isfavorite)
            <i class="fa fa-heart" style="color: white;"></i> Favorilerden Kaldır

        @else
            <i class="fa fa-heart-o"></i> Favoriye Ekle
        @endif
    </button>

