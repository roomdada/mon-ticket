{{-- Filters dropdown --}}
@if (isset($filtersViews) && $filtersViews)
  <x-lv-drop-down :dropDownWidth="100" label="Filtre">
    {{-- Each filter view --}}
    @foreach ($filtersViews as $filter)
      {{-- Filter title --}}
      <x-lv-drop-down.header :label="$filter->getTitle()" />
      <div class="mx-auto mt-4 w-36 px-2">
        {{-- Filter view --}}
        @include('laravel-views::components.filters.' . $filter->view, [
          'view' => $filter,
          'filter' => $filter,
        ])
      </div>
    @endforeach

    @if (count($filters) > 0)
      {{-- Clear filters button --}}
      <div class="mx-2 py-2 bg-gray-100 text-center flex justify-end border-t border-gray-200">
        <button wire:click.prevent="clearFilters" @click="open = false" class="text-gray-600 flex hover:text-gray-700 text-center focus:outline-none text-xs">
          {{__('Reinitialiser les filtres')}}
        </button>
      </div>
    @endif
  </x-lv-drop-down>
@endif
