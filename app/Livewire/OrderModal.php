<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class OrderModal extends Component
{
    public $deliveryMethod;
    public $paymentMethod;
    public function render()
    {
        return view('livewire.order-modal');
    }
    #[On('deliveryTypeChanged')]
    public function setDeliveryType($type)
    {
        $this->deliveryMethod = $type;
    }

    #[On('paymentTypeChanged')]
    public function setPaymentType($type)
    {
        $this->paymentMethod = $type;
    }


}
