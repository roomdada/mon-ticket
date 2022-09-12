<x-app-layout>
  <x-section-header title="Utilisateurs">
    <x-slot name="actions">
      <x-create url='users.create' />
    </x-slot>
</x-section-header>
<div class="bg-white px-6 py-12 rounded-md shadow-lg">
  <livewire:tables.user-table/>
</div>
 
</x-app-layout>
