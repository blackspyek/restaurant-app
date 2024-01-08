<?php

namespace App\Livewire;

use App\Models\Address;
use App\Models\Customer;
use App\Models\Dish;
use App\Models\OrderDetail;
use App\Models\OrderHeader;
use App\Models\Pizza;
use App\Models\PizzaIngredients;
use Illuminate\Support\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

class OrderCheckout extends Component
{
    public $deliveryMethod;

    public $paymentMethod;

    public $street_name;

    public $building_number;

    public $gateway_code;

    public $city_name;

    public $apartment_number;

    public $floor_number;

    public $zip_code;

    public $company_name;

    public $name;

    public $email;

    public $phone_number;

    public $note;

    public $dishes;

    public $total;
    public $visible = true;

    public $orderId;

    protected $rules = [
        'deliveryMethod' => 'required',
        'paymentMethod' => 'required',
        'street_name' => 'required_if:deliveryMethod,Delivery',
        'building_number' => 'required_if:deliveryMethod,Delivery',
        'city_name' => 'required_if:deliveryMethod,Delivery',
        'apartment_number' => 'required_if:deliveryMethod,Delivery',
        'zip_code' => 'required_if:deliveryMethod,Delivery',
        'name' => 'required|min:6',
        'email' => 'required|email',
        'phone_number' => 'required:max:9',
        'note' => 'max:250',
        'dishes' => 'required',
    ];

    public function boot(): void
    {
        $this->dishes = tap(
            basket()->getDishes(),
            function (Collection $dishes) {
                $this->total = $dishes->sum('total');
            }
        )->toArray();

        if ($this->dishes == null) {
            redirect()->route('menu');
        }

    }

    public function render()
    {

        return view('livewire.order-checkout');
    }

    #[On('deliveryTypeChanged')]
    public function setDelivery($type): void
    {
        $this->deliveryMethod = $type;
    }

    #[On('paymentTypeChanged')]
    public function setPayment($type): void
    {
        $this->paymentMethod = $type;
    }

    public function validateData()
    {
        $this->validator();
        $this->dispatch('swal:confirm', type: 'warning', message: 'Are you sure?', text: 'You will not be able to change the order!');
    }

    public function validator() :void
    {
        if ($this->deliveryMethod != 'Delivery') {
            $this->street_name = null;
            $this->building_number = null;
            $this->gateway_code = null;
            $this->city_name = null;
            $this->apartment_number = null;
            $this->floor_number = null;
            $this->zip_code = null;
            $this->company_name = null;
        }
        $this->validate();
    }

    #[On('submitOrder')]
    public function save()
    {
        $deliveryTypes = [
            'Delivery' => 1,
            'PickUp' => 2,
        ];
        $paymentTypes = [
            'Upon receipt' => 1,
            'Przelewy24' => 2,
        ];
        $this->validator();
        $first_name = substr($this->name, 0, strpos($this->name, ' '));
        $last_name = substr($this->name, strpos($this->name, ' ') + 1);
        $customer = Customer::firstOrCreate([
            'First_name' => $first_name,
            'Last_name' => $last_name,
            'Phone_number' => $this->phone_number,
            'Email' => $this->email,
        ]);
        if ($this->deliveryMethod == 'Delivery') {
            $address = Address::firstOrCreate([
                'city_name' => $this->city_name,
                'street_name' => $this->street_name,
                'building_number' => $this->building_number,
                'apartment_number' => $this->apartment_number,
                'zip_code' => $this->zip_code,
                'Customer_Id' => $customer->id,
            ]);

            $order_header = OrderHeader::create([
                'customer_Id' => $customer->id,
                'address_Id' => $address->id,
                'delivery_type_Id' => $deliveryTypes[$this->deliveryMethod],
                'payment_type_Id' => $paymentTypes[$this->paymentMethod],
                'payment_status_Id' => 1,
                'total_price' => $this->total,
                'gateway_code' => ($this->gateway_code == null) ? 'NULL' : $this->gateway_code,
                'company_name' => ($this->company_name == null) ? 'NULL' : $this->company_name,
                'note' => ($this->note == null) ? 'NULL' : $this->note,
                'order_status_Id' => 1,
            ]);
        } else {
            $order_header = OrderHeader::create([
                'customer_Id' => $customer->id,
                'delivery_type_Id' => $deliveryTypes[$this->deliveryMethod],
                'payment_type_Id' => $paymentTypes[$this->paymentMethod],
                'payment_status_Id' => 1,
                'total_price' => $this->total,
                'gateway_code' => ($this->gateway_code == null) ? 'NULL' : $this->gateway_code,
                'company_name' => ($this->company_name == null) ? 'NULL' : $this->company_name,
                'note' => ($this->note == null) ? 'NULL' : $this->note,
                'order_status_Id' => 1,
            ]);
        }

        foreach ($this->dishes as $dish) {
            $dish = OrderDetail::create(
                [
                    'order_header_Id' => $order_header->id,
                    'dish_Id' => $dish->id,
                    'quantity' => $dish->qty,
                    'price' => $dish->price,
                ]
            );
        }
        $this->orderId = $order_header->id;
        $this->visible = false;
    }

    #[On('orderStatusChanged')]
    public function showConfirmation()
    {
        basket()->clearBasket();
        return redirect()->route('showThankyou');
    }


}
