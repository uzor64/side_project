@props(['active' => null])

<nav class="px-6">
    <div class="grid grid-cols-4 gap-2 rounded-2xl bg-white ring-1 ring-slate-200 shadow-sm py-3">
        <x-ui.bottom-nav-item :active="$active==='store'" label="My store">
            <x-ui.icons.store class="w-6 h-6" />
        </x-ui.bottom-nav-item>

        <x-ui.bottom-nav-item :active="$active==='orders'" label="Orders">
            <x-ui.icons.orders class="w-6 h-6" />
        </x-ui.bottom-nav-item>

        <x-ui.bottom-nav-item :active="$active==='products'" label="Products">
            <x-ui.icons.products class="w-6 h-6" />
        </x-ui.bottom-nav-item>

        <x-ui.bottom-nav-item :active="$active==='reviews'" label="Reviews">
            <x-ui.icons.reviews class="w-6 h-6" />
        </x-ui.bottom-nav-item>
    </div>
</nav>
