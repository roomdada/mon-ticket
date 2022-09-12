{{-- components.buttons.select

Renders a button like a select dropdown. Most likely used in conjunction with the components.drop-down
You can customize all the html and css classes but YOU MUST KEEP THE BLADE AND LIVEWIRE DIRECTIVES,
it is using the variant helper to get the styles for each variant
it could be primary, primary-light

You can customize the variants classes in config/laravel-views.php

props
 - icon --}}
@props(['icon' => 'chevron-down'])
<button
  class="btn btn-sm border-blue-500 hover:bg-white border-2 bg-white text-black hover:border-black focus:border-white  flex items-center gap-1 text-xs px-3 py-2 rounded-lg hover:shadow-sm font-medium"
>
  {{ $slot }}
  @if ($icon)
    <i data-feather="{{ $icon }}" class="w-4 h-4"></i>
  @endif
</button>
