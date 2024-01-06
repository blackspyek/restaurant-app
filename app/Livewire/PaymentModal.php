<?php

namespace App\Livewire;

use Livewire\Component;

class PaymentModal extends Component
{
    public $paymentMethod;

    public function render()
    {
        return view('livewire.payment-modal');
    }
    public function setPaymentType()
    {
        $this->dispatch('paymentTypeChanged', type: $this->paymentMethod);

    }
}
