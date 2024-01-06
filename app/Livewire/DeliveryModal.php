<?php

namespace App\Livewire;

use Livewire\Component;

class DeliveryModal extends Component
{
    public $deliveryMethod;

    public function render()
    {
        return view('livewire.delivery-modal');
    }

    public function setDeliveryType()
    {
        $this->dispatch('deliveryTypeChanged', type: $this->deliveryMethod);

    }
}
