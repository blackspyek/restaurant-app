<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class ShowDeliveryModal extends Component
{
    public $order;

    public $CityName;

    public $StreetName;

    public $BuildingNumber;

    public $ApartmentNumber;

    public $ZipCode;

    public $FloorNumber;

    public function render()
    {
        return view('livewire.show-delivery-modal');
    }
    #[On('show-address-modal')]
    public function update($orderData)
    {
        $this->CityName = $orderData["CityName"];
        $this->StreetName = $orderData["StreetName"];
        $this->BuildingNumber = $orderData["BuildingNumber"];
        $this->ApartmentNumber = $orderData["ApartmentNumber"];
        $this->ZipCode = $orderData["ZipCode"];
        $this->FloorNumber = $orderData["FloorNumber"];

        $this->dispatch('openAddressModal');

    }

}
