<x-ui.phone-frame>
    <div class="px-5 pt-6">
        <x-ui.topbar title="Orders" />
    </div>

    <div class="px-4 pt-3">
        <x-orders.card>
            <x-orders.section-heading label="TODAY" />

            <x-orders.item id="9125" name="Hanako Yamada" amount="$150.00" status="processing" />

            <x-orders.section-heading label="YESTERDAY" class="mt-1" />

            <x-orders.item id="9124" name="Jacques Muller" amount="$200.00" status="processing" />
            <x-orders.item id="9123" name="John Appleseed" amount="$178.00" status="on-hold" />
            <x-orders.item id="9122" name="Jane Diaz" amount="$200.00" status="completed" />
            <x-orders.item id="9121" name="Anna Nowak" amount="$200.00" status="completed" />

            <x-orders.section-heading label="OLDER THAN 2 DAYS" class="mt-1" />

            <x-orders.item id="9120" name="Wei Qing" amount="$156.00" status="" />
        </x-orders.card>
    </div>

    <div class="pb-7 pt-3">
        <x-ui.bottom-nav active="orders" />
    </div>
</x-ui.phone-frame>
