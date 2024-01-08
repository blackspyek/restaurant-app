<?php

namespace App\Livewire;

use App\Models\OrderHeader;
use Livewire\Attributes\On;
use Livewire\Component;

class WaitingModal extends Component
{
    public $orderId;

    public function render()
    {
        return view('livewire.waiting-modal');
    }
    public function refreshOrderStatus()
    {
        $tempOrder = OrderHeader::where('id', $this->orderId)->first();
        if ($tempOrder->order_status_Id == 2) {
            $this->dispatch("orderStatusChanged");
        }
    }
}
