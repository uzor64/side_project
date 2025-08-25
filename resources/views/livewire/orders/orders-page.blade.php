<div class="flex flex-col h-screen">
    {{-- Header --}}
    <x-orders.header title="Orders" />

    {{-- Main Content --}}
    <x-orders.container class="flex-1">
        <div class="py-6">
            {{-- Today Section --}}
            <x-orders.section-heading-new label="TODAY" />

            <x-orders.order-item-new id="9125" name="Hanako Yamada" amount="$150.00" status="processing" />

            {{-- Yesterday Section --}}
            <x-orders.section-heading-new label="YESTERDAY" />

            <x-orders.order-item-new id="9124" name="Jacques Muller" amount="$200.00" status="processing" />
            <x-orders.order-item-new id="9123" name="John Appleseed" amount="$178.00" status="on-hold" />
            <x-orders.order-item-new id="9122" name="Jane Diaz" amount="$200.00" status="completed" />
            <x-orders.order-item-new id="9121" name="Anna Nowak" amount="$200.00" status="completed" />

            {{-- Older Than 2 Days Section --}}
            <x-orders.section-heading-new label="OLDER THAN 2 DAYS" />

            <x-orders.order-item-new id="9120" name="Wei Qing" amount="$156.00" status="" />
        </div>
    </x-orders.container>

    {{-- Bottom Navigation --}}
    <x-ui.bottom-nav-new active="orders" />
</div>
