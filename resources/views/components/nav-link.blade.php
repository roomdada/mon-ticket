@props(['active', 'icon' => 'grid'])

@php
$classes = $active ?? false ? 'flex items-center space-x-3 px-3 font-medium rounded text-white bg-secondary-900' : 'flex items-center space-x-3 px-3 font-medium rounded text-gray-50 hover:text-gray-700 hover:bg-gray-50 active:bg-primary-50';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    <span class="flex-none flex items-center hover:text-primary-800 opacity-50">
        <x-icon name="{{ $icon }}" />
    </span>
    <span class="py-2 flex-grow text-md">
        {{ $slot }}
    </span>
</a>
