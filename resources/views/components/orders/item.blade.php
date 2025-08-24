@props([
    'id' => '',
    'name' => '',
    'amount' => '',
    'status' => '', 
])

@php
    $statusLabel = [
        'processing' => 'Processing',
        'on-hold'    => 'On Hold',
        'completed'  => 'Completed',
        ''           => null,
    ][$status] ?? $status;

    $badgeClasses = match($status) {
        'processing' => 'bg-emerald-200/80 text-emerald-800',
        'on-hold'    => 'bg-violet-200/80 text-violet-800',
        'completed'  => 'bg-slate-200 text-slate-700',
        default      => 'hidden',
    };
@endphp

<div class="px-4 py-4 border-t border-slate-200/80 first:border-t-0">
    <div class="flex items-center">
        <div class="flex-1 min-w-0">
            <div class="flex items-center gap-2">
                <span class="font-semibold text-slate-700">#{{ $id }}</span>
                <span class="text-slate-700">{{ $name }}</span>
            </div>
            <div class="mt-2">
                <span class="inline-flex items-center px-3 py-1 rounded-md text-[12px] font-semibold {{ $badgeClasses }}">
                    {{ $statusLabel }}
                </span>
            </div>
        </div>

        <div class="flex items-center gap-2">
            <span class="text-slate-800 font-semibold tabular-nums">{{ $amount }}</span>
            <x-ui.icons.chevron-right class="w-5 h-5 text-slate-400" />
        </div>
    </div>
</div>
