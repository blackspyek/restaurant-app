<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class ShowCustomerModal extends Component
{
    public $order;

    public $CustomerName;
    public $CustomerSurname;
    public $CustomerEmail;
    public $CustomerPhoneNumber;

    public function render()
    {
        return view('livewire.show-customer-modal');
    }
    #[On('show-customer-modal')]
    public function update($orderData)
    {
        $this->CustomerName = $orderData["CustomerName"];
        $this->CustomerSurname = $orderData["CustomerSurname"];
        $this->CustomerEmail = $orderData["CustomerEmail"];
        $this->CustomerPhoneNumber = $orderData["CustomerPhoneNumber"];


        $this->dispatch('openCustomerModal');

    }
}
