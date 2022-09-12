<div>
    {{ $this->form }}
    <button wire:click.prevent='save' wire:loading.class="bg-blue-200" wire:loading.attr="disabled"
        class="btn btn-sm bg-primary-900 flex float-right mt-2">
        Enregistrer
    </button>
    <div wire:loading wire:target="save">
        Traitement en cours...
    </div>

</div>
