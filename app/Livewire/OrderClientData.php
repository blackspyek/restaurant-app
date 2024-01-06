<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class OrderClientData extends Component
{
    public $deliveryMethod;
    public function render()
    {
        return view('livewire.order-client-data');
    }

    /**
     * Sets the delivery method when the event 'deliveryTypeChanged' is emitted
     *
     * @param $type
     * @return void
     */
    #[On('deliveryTypeChanged')]
    public function setDeliveryType($type): void
    {
        $this->deliveryMethod = $type;
    }
}
