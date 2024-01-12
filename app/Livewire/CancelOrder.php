<?php

namespace App\Livewire;

use App\Models\OrderHeader;
use Livewire\Component;

class CancelOrder extends Component
{
    public $orderId;

    public function render()
    {
        return view('livewire.cancel-order');
    }
    public function cancelOrder()
    {
        $tempOrder = OrderHeader::find($this->orderId);
        $tempOrder->order_status_Id = 7;
        $tempOrder->save();

    }
}
