{{-- table-view.select.blade

Renders a select component
You can customize all the html and css classes but YOU MUST KEEP THE BLADE AND LIVEWIERE DIRECTIVES

props:
 - $label
 - $name
 - $options
 - $selected
 - $model --}}
<div class="text-left mb-4">
    @if (isset($label))
        <label class="block">
            {{ $label }}
        </label>
    @endif
    <div class="form-control relative w-full max-w-xs">
        <select
            class="block appearance-none w-full bg-white border border-blue-300 hover:border-gray-500 px-4 py-2 pr-8 rounded leading-tight focus:outline-none"
            {{ isset($model) ? 'wire:model=' . $model : '' }} name="{{ $name }}" class="{{ $class ?? '' }}">
            @if (count($options))
                @foreach ($options as $option => $value)
                    <option value="{{ $value }}"
                        {{ isset($selected) && $selected != '' && $selected == $value ? 'selected' : '' }}>
                        {{ $option }}
                    </option>
                @endforeach
            @endif
        </select>
        {{-- Down icon --}}
    </div>
</div>
