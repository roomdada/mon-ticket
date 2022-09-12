<div class="flex space-x-1">
  @if (count($selected) > 0)
    <x-lv-drop-down label='Actions'>
      <x-lv-drop-down.header label='{{ count($selected) }} Selectionné(s)' />
      <x-lv-actions.icon-and-title :actions="$this->bulkActions" />
    </x-lv-drop-down>
  @endif

  @if ($this->hasBulkActions && isset($headers) <= 0)
    <button
      wire:click="$set('allSelected', {{ !$allSelected }})"
      class="border border-transparent hover:border-gray-300 focus:border-gray-300 focus:outline-none flex items-center text-xs mx-auto py-2 rounded hover:shadow-sm font-medium"
    >
      {{ __($allSelected ? 'Désélectionner tout' : 'Sélectionner tous') }}
    </button>
  @endif
</div>
