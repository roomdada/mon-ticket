@props(['label', 'value', 'icon'])

<!-- Card: Simple Widget with Icon -->
<div
    class="flex flex-col rounded-2xl border-double  border-4 border-success-500 shadow-lg bg-white overflow-hidden hover:shadow-sm hover:cursor-pointer">
    <!-- Card Body: Simple Widget with Icon -->
    <div class="p-5 lg:p-6 flex-grow w-full flex justify-between items-center">
        <div class="flex justify-center items-center w-16 h-16 border-4 rounded-br-lg border-success-500">
            <x-icon name="{{ $icon }}" class="w-8 h-8 text-primary-900" />
        </div>
        <dl class="text-right">
            <dt class="text-2xl font-bold text-black">
                {{ $value }}
            </dt>
            <dd class="uppercase font-extrabold text-sm text-green-900 tracking-wider">
                {{ $label }}
            </dd>
        </dl>
    </div>
    <!-- END Card Body: Simple Widget with Icon -->
</div>
