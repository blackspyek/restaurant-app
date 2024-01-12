<?php

namespace App\Livewire;

use App\Models\OrderDetail;
use App\Models\OrderHeader;
use Livewire\Component;

class ShowOrders extends Component
{
    public $orders;

    public function render()
    {
        return view('livewire.show-orders');
    }

    public function boot()
    {

        $OrderItems =
            OrderDetail::join('dish', 'order_detail.dish_Id', '=','dish.id')
                ->get()
                ->groupBy('order_header_Id')
                ->toArray();
        $this->orders =
            OrderHeader::
            join('customer', 'order_header.customer_Id', '=', 'customer.id')
                ->join('order_status', 'order_header.order_status_Id', '=', 'order_status.id')
                ->join('payment_status', 'order_header.payment_status_Id', '=', 'payment_status.id')
                ->join('payment_type', 'order_header.payment_type_Id', '=', 'payment_type.id')
                ->join('delivery_type', 'order_header.delivery_type_Id', '=', 'delivery_type.id')
                ->leftJoin('address', 'order_header.address_Id', '=', 'address.id')
                ->get(["order_header.id as order_header_id",
                    "order_status.Order_status_name as order_status_name",
                    "customer.id as customer_id",
                    "address.*",
                    "customer.*",
                    "order_header.total_price",
                    "payment_status.Payment_status_name as payment_status_name",
                    "payment_type.Payment_method_name as payment_type_name",
                    "delivery_type.Delivery_method_name as delivery_type_name",
                    "order_header.note",
                    "order_header.company_name",
                    "order_header.gateway_code",
                    "order_header.delivery_type_Id",
                    "order_header.order_status_Id",
                    "order_header.created_at as order_header_created_at",
                    "order_header.updated_at as order_header_updated_at",


                ])
                ->map(function ($order) use ($OrderItems) {
                    $order->items = $OrderItems[$order->order_header_id];
                    $order->formattedDate = $order->created_at->format('d-m-Y H:i:s');
                    return $order;
                })
                ->toArray();

    }

}
