{{-- components.form.input-group.blade

Renders a input group component
You can customize all the html and css classes but YOU MUST KEEP THE BLADE AND LIVEWIERE DIRECTIVES

props:
 - $label
 - $name
 - $placeholder
 - $value
 - $model
 - $id
 - $onClick
 - $icon
--}}

<div class="relative text-left mb-4">
  <label class="block">
    {{ $label ?? '' }}
  </label>
  <input
    class="appearance-none w-full bg-white border-2 border-blue-500 rounded-lg hover:border-blue-900 px-2 py-2 pr-8  leading-tight focus:outline-none focus:bg-white focus:border-gray-500 focus:border-2"
    type="text"
    name="{{ $name ?? '' }}"
    placeholder="{{ $placeholder ?? ''}}"
    autocomplete="off"
    @if (isset($id))
      id="{{ $id ?? ''}}"
    @endif
    wire:model="{{ $model ?? '' }}"
  >
  <div class="absolute right-0 top-0 mt-2 mr-4 text-purple-lighter">
    <a wire:click.prevent="{{ $onClick ?? '' }}" href="#" class="text-black hover:text-blue-600">
      <i data-feather="{{ $icon }}" class="w-4"></i>
    </a>
  </div>
</div>
