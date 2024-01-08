<?php

namespace App\Livewire;

use Livewire\Component;

class ShowCustomer extends Component
{
    public $order;

    public $street_name;
    public $building_number;
    public $city_name;
    public $apartment_number;
    public $floor_number;
    public $zip_code;

    public $first_name;

    public $last_name;

    public $email;

    public $phone_number;
    public function hydrate()
    {
        if ($this->order["delivery_type_Id"] == 1)
        {
            $this->street_name = $this->order["street_name"];
            $this->building_number = $this->order["building_number"];
            $this->city_name = $this->order["city_name"];
            $this->apartment_number = $this->order["apartment_number"];
            $this->floor_number = $this->order["floor_number"];
            $this->zip_code = $this->order["zip_code"];
        }

        $this->first_name = $this->order["First_name"];
        $this->last_name = $this->order["Last_name"];
        $this->email = $this->order["Email"];
        $this->phone_number = $this->order["Phone_number"];
    }
    public function render()
    {
        return view('livewire.show-customer');
    }
    public function showCustomer()
    {
        if ($this->order["delivery_type_Id"] == 1)
        {
            $this->dispatch('swal:showCustomer' ,message: 'Customer Data:',text: 'First Name: '.$this->first_name. PHP_EOL.' Last Name: '.$this->last_name. PHP_EOL.' Email: '.$this->email. PHP_EOL.' Phone Number: '.$this->phone_number. PHP_EOL.PHP_EOL.' Street Name: '.$this->street_name. PHP_EOL.' Building Number: '.$this->building_number. PHP_EOL.' City Name: '.$this->city_name. PHP_EOL.' Apartment Number: '.$this->apartment_number. PHP_EOL.' Floor Number: '.$this->floor_number. PHP_EOL.' Zip Code: '.$this->zip_code.'');

        }
        else{
            $this->dispatch('swal:showCustomer' ,message: 'Customer Data:',text: 'First Name: '.$this->first_name. PHP_EOL.' Last Name: '.$this->last_name. PHP_EOL.' Email: '.$this->email. PHP_EOL.' Phone Number: '.$this->phone_number);

        }

    }
}
