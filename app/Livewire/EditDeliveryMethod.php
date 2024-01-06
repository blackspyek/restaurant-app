<?php

namespace App\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class EditDeliveryMethod extends ModalComponent
{
    public function render()
    {
        return view('livewire.edit-delivery-method');
    }
}
