<?php

namespace App\Livewire;

use App\Models\Dish;
use App\Models\OrderHeader;
use Livewire\Component;

class AcceptOrder extends Component
{
    public $orderId;

    public function render()
    {
        return view('livewire.accept-order');
    }
    public function acceptOrder()
    {
        $tempOrder = OrderHeader::find($this->orderId);
        $tempOrder->order_status_Id = 2;
        $tempOrder->save();
        $this->dispatch('orderStatusUpdated');

    }
}
