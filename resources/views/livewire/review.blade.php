@if (session()->has("message"))
    <div class="alert alert-success">
        {{session("message")}}
    </div>
@endif
<div>
<form wire:submit.prevent="store">
    <span>
        <input type="text" wire:model.live="subject" placeholder="Konu"/>

    </span>
    <textarea wire:model.live="question" placeholder="Mesajınız..."></textarea>
    <button type="submit" class="btn btn-default pull-right">
        Gönder
    </button>
</form>

</div>
