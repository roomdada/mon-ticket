<x-app-layout>
  <x-section-header title="Ajouter un ticket">
      <x-slot name="actions">
          <x-back url='tickets.index' />
      </x-slot>
  </x-section-header>
  <div class="bg-white px-6 py-12 rounded-md shadow-lg">
      <livewire:forms.create.create-ticket-form />
  </div>

</x-app-layout>
