<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('livewire.layout.landing')]
class OrdersPage extends Component
{
    public function render()
    {
        return view('livewire.orders.orders-page');
    }
}
