<?php

namespace App\Livewire;

use App\Mail\OrderConfirmationEmail;
use App\Models\OrderDetail;
use App\Models\OrderHeader;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\On;
use Livewire\Component;

class WaitingModal extends Component
{
    public $orderId;

    public function render()
    {
        return view('livewire.waiting-modal');
    }
    public function refreshOrderStatus()
    {
        $OrderItems =
            OrderDetail::join('dish', 'order_detail.dish_Id', '=','dish.id')
                ->where('order_header_id', $this->orderId)
                ->get()
                ->toArray();

        $tempOrder =
            OrderHeader::
            join('customer', 'order_header.customer_Id', '=', 'customer.id')
                ->join('order_status', 'order_header.order_status_Id', '=', 'order_status.id')
                ->join('payment_status', 'order_header.payment_status_Id', '=', 'payment_status.id')
                ->join('payment_type', 'order_header.payment_type_Id', '=', 'payment_type.id')
                ->join('delivery_type', 'order_header.delivery_type_Id', '=', 'delivery_type.id')
                ->leftJoin('address', 'order_header.address_Id', '=', 'address.id')
                ->where('order_header.id', $this->orderId)
                ->get(["order_header.id as order_header_id",
                    "order_status.Order_status_name as order_status_name",
                    "customer.id as customer_id",
                    "address.id as address_id",
                    "address.*",
                    "customer.First_name",
                    "customer.Email",
                    "customer.Phone_number",
                    "order_header.total_price",
                    "payment_type.Payment_method_name as payment_type_name",
                    "delivery_type.Delivery_method_name as delivery_type_name",
                    "order_header.order_status_Id as order_status_Id",
                    "order_header.created_at as order_header_created_at",
                    "order_header.received_email",

                ])
                ->map(function ($order) use ($OrderItems) {
                    $order->items = $OrderItems;
                    $order->formattedDate = date('d-m-Y H:i:s', strtotime($order->order_header_created_at));
                    return $order;
                })
                ->toArray();
        $tempOrder = $tempOrder[0];

        if ($tempOrder["order_status_Id"] == 2 || $tempOrder["order_status_Id"] == 7) {
            if ($tempOrder["received_email"] == 0) {
                Mail::to('ouremail@test.com')->send(new OrderConfirmationEmail($tempOrder));
                OrderHeader::where('id', $tempOrder["order_header_id"])->update(['received_email' => 1]);
            }
            $this->dispatch("orderStatusChanged", $tempOrder["order_status_Id"]);
        }
    }
}
