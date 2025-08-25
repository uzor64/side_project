@props(['class' => ''])

<div {{ $attributes->merge(['class' => 'flex-1 bg-gray-50 overflow-y-auto ' . $class]) }}>
    <div class="max-w-sm md:max-w-4xl mx-auto bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
        {{ $slot }}
    </div>
</div>
