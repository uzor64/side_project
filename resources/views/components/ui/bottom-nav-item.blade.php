@props(['label' => '', 'active' => false])

<div class="flex flex-col items-center justify-center gap-1">
    <div @class([
        'rounded-xl p-1',
        'text-violet-600' => $active,
        'text-slate-500' => ! $active,
    ])>
        {{ $slot }}
    </div>
    <span @class([
        'text-[12px] leading-none font-medium',
        'text-violet-600' => $active,
        'text-slate-500' => ! $active,
    ])>{{ $label }}</span>
</div>
