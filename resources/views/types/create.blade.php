<x-app-layout>
    <x-section-header title="Nouveau type de ticket">
        <x-slot name="actions">
            <x-back url='tickets-types.index' />
        </x-slot>
    </x-section-header>
    <div class="bg-white px-6 py-12 rounded-md shadow-lg">
        <livewire:forms.create.create-ticket-type-form />
    </div>

</x-app-layout>
