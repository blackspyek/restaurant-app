<?php

namespace App\Livewire;

use App\Models\OrderHeader;
use App\Models\OrderStatus;
use Livewire\Attributes\On;
use Livewire\Component;

class ShowOrderManagementModal extends Component
{
    public $order;


    public $orderStatus;

    public $orderStatuses;

    public $currStatus;
    public function mount()
    {
        $this->orderStatuses = OrderStatus::all();
    }
    public function render()
    {
        return view('livewire.show-order-management-modal');
    }
    #[On('show-order-management-modal')]
    public function update($orderData, $orderStatus)
    {
        $this->order = $orderData;
        $this->orderStatus = $orderStatus;
        $this->dispatch('openManagementModal');

    }

    public function updateOrderStatus()
    {
        $order = OrderHeader::find($this->order);
        $order->order_status_id = $this->currStatus;
        $order->save();
        $this->dispatch('closeManagementModal');
    }
}
