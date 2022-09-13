<x-app-layout>
    <x-section-header title="Tickets">
        <x-slot name="actions">
          @if(!auth()->user()->isAdmin())
            <x-create url='tickets.create' />
          @endif
        </x-slot>
    </x-section-header>
    <div class="bg-white px-6 py-12 rounded-md shadow-lg">
        <livewire:tables.ticket-table />
    </div>

</x-app-layout>
