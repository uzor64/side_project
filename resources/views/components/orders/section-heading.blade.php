@props(['label' => ''])

<div {{ $attributes->merge(['class' => 'px-4 py-3 text-[11px] tracking-wide font-semibold uppercase text-slate-400']) }}>
    {{ $label }}
</div>
