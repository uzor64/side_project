@props(['class' => ''])

<div {{ $attributes->merge(['class' => $class]) }}>
    <div class="relative">
        <div class="mx-auto bg-white rounded-[2.25rem] shadow-[0_50px_80px_rgba(15,23,42,0.10)] ring-1 ring-slate-200/70 overflow-hidden">
            <div class="w-[380px] max-w-[92vw]">
                <div class="mx-3 my-3 rounded-[1.5rem] bg-white ring-1 ring-slate-200 overflow-hidden">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>
