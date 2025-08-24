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
        'processing' => 'bg-green-100 text-green-800',
        'on-hold'    => 'bg-purple-100 text-purple-800',
        'completed'  => 'bg-gray-100 text-gray-700',
        default      => 'hidden',
    };
@endphp

<div class="px-4 py-4 border-b border-gray-100 last:border-b-0">
    <div class="flex items-center justify-between">
        <div class="flex-1 min-w-0">
            <div class="flex items-baseline gap-2">
                <span class="text-sm font-semibold text-gray-700">#{{ $id }}</span>
                <span class="text-base font-medium text-gray-800">{{ $name }}</span>
            </div>
            @if($statusLabel)
                <div class="mt-2">
                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium {{ $badgeClasses }}">
                        {{ $statusLabel }}
                    </span>
                </div>
            @endif
        </div>

        <div class="flex items-center gap-2">
            <span class="text-base font-semibold text-gray-800">{{ $amount }}</span>
            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </div>
    </div>
</div>
