<?php

namespace App\Livewire;

use App\Models\Dish;
use App\Models\OrderHeader;
use Livewire\Attributes\On;
use Livewire\Component;

class AcceptOrder extends Component
{
    public $orderId;

    public function render()
    {
        return view('livewire.accept-order');
    }

    #[On('acceptOrder')]
    public function acceptOrder($id, $time, $employeeId)
    {
        $tempOrder = OrderHeader::find($id);
        $tempOrder->order_status_Id = 2;
        $tempOrder->eta = $time;
        $tempOrder->employee_Id = $employeeId;
        $tempOrder->save();

    }
}
