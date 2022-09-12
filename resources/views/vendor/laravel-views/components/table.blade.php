{{-- components.table

Renders a data table
You can customize all the html and css classes but YOU MUST KEEP THE BLADE AND LIVEWIRE DIRECTIVES,

props:
  - headers
  - itmes
  - actionsByRow --}}
<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 px-2">
        <div class="px-2 py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-500">

                    <thead class="bg-primary-900 uppercase text-xs">
                        <tr>
                            @if ($this->hasBulkActions)
                                <th class="px-4">
                                    <span class="flex items-center justify-center">
                                        <x-lv-checkbox wire:model="allSelected" />
                                    </span>
                                </th>
                            @endif
                            {{-- Renders all the headers --}}
                            @foreach ($headers as $header)
                                <th class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider"
                                    {{ is_object($header) && !empty($header->width) ? 'width=' . $header->width . '' : '' }}>
                                    @if (is_string($header))
                                        {{ $header }}
                                    @else
                                        @if ($header->isSortable())
                                            <div class="flex">
                                                <a href="#!" wire:click.prevent="sort('{{ $header->sortBy }}')"
                                                    class="flex-1">
                                                    {{ $header->title }}
                                                </a>
                                                <a href="#!" wire:click.prevent="sort('{{ $header->sortBy }}')"
                                                    class="flex">
                                                    <i data-feather="chevron-up"
                                                        class="{{ $sortBy === $header->sortBy && $sortOrder === 'asc' ? 'text-gray-900' : 'text-gray-400' }} h-4 w-4"></i>
                                                    <i data-feather="chevron-down"
                                                        class="{{ $sortBy === $header->sortBy && $sortOrder === 'desc' ? 'text-gray-900' : 'text-gray-400' }} h-4 w-4"></i>
                                                </a>
                                            </div>
                                        @else
                                            {{ $header->title }}
                                        @endif
                                    @endif
                                </th>
                            @endforeach

                            {{-- This is a empty cell just in case there are action rows --}}
                            @if (count($actionsByRow) > 0)
                                <th class='uppercase text-extrabold text-white'>Actions</th>
                            @endif
                        </tr>
                    </thead>

                    <tbody class='bg-white divide-y divide-gray-200'>
                        @foreach ($items as $item)
                            <tr class="border-b border-blue-200 text-sm" wire:key="{{ $item->getKey() }}">
                                @if ($this->hasBulkActions)
                                    <td class="">
                                        <span class="flex items-center justify-center">
                                            <x-lv-checkbox value="{{ $item->getKey() }}" wire:model="selected" />
                                        </span>
                                    </td>
                                @endif
                                {{-- Renders all the content cells --}}
                                @foreach ($view->row($item) as $column)
                                    <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {!! $column !!}
                                    </td>
                                @endforeach

                                {{-- Renders all the actions row --}}
                                @if (count($actionsByRow) > 0)
                                    <td>
                                        <div class="px-3 py-2 flex justify-end">
                                            <x-lv-actions :actions="$actionsByRow" :model="$item" />
                                        </div>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
