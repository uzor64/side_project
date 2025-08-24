@props(['label' => '', 'class' => ''])

<div {{ $attributes->merge(['class' => 'px-4 py-3 bg-gray-50 border-b border-gray-100 ' . $class]) }}>
    <h2 class="text-xs font-medium text-gray-500 uppercase tracking-wide">{{ $label }}</h2>
</div>
