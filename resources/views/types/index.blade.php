<x-app-layout>
  <x-section-header title="Types de tickets">
    <x-slot name="actions">
      <x-create url='tickets-types.create' />
    </x-slot>
</x-section-header>
<div class="bg-white px-6 py-12 rounded-md shadow-lg">
  <livewire:tables.ticket-type-table/>
</div>
 
</x-app-layout>
