@props(['title' => ''])

<header class="flex items-center justify-between">
    <h1 class="text-[28px] leading-8 font-semibold text-slate-800">{{ $title }}</h1>
    <button type="button" aria-label="Menu" class="p-2 rounded-xl text-violet-500 hover:bg-violet-50">
        <x-ui.icons.menu class="w-6 h-6" />
    </button>
</header>
