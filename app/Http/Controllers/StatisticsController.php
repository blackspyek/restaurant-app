<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Models\OrderHeader;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function index(Request $request)
    {
        return view('statistics.statisticsPage', [
            'orders' => OrderHeader::join('customer', 'customer.id', '=', 'order_header.customer_Id')
                ->join('delivery_type', "delivery_type.id", '=', 'order_header.delivery_type_Id')
                ->join('payment_type', 'payment_type.id', '=', 'order_header.payment_type_Id')
                ->join('order_status', 'order_status.id', '=', 'order_header.order_status_Id')
                ->leftjoin('address', 'address.id', '=', 'order_header.address_Id')
                ->select("order_header.id as OrderId", "order_header.total_price as TotalPrice",
                "order_header.gateway_code as GatewayCode", "order_header.company_name as CompanyName", "order_header.note as Note",
                "order_header.created_at as CreatedAt", "order_header.updated_at as UpdatedAt",
                "customer.First_name as CustomerName", "customer.Last_name as CustomerSurname",
                "customer.Phone_number as CustomerPhoneNumber", "customer.Email as CustomerEmail",
                "payment_type.Payment_method_name as PaymentMethodName", "delivery_type.Delivery_method_name as DeliveryTypeName",
                "order_status.Order_status_name as OrderStatusName", "address.city_name as CityName", "address.street_name as StreetName",
                "address.building_number as BuildingNumber", "address.apartment_number as ApartmentNumber", "address.zip_code as ZipCode",
                "address.floor_number as FloorNumber")
                ->when($request->q,function(Builder $builder) use($request){
                    $builder->where('order_header.id','=',"{$request->q}")
                        ->orWhere('customer.Email','=',"{$request->q}")
                        ->orWhere('customer.Phone_number','=',"{$request->q}");
                })

                ->orderBy('order_header.created_at', 'desc')
                ->paginate(3),
            'deliveryStats' => OrderHeader::join('delivery_type', "delivery_type.id", '=', 'order_header.delivery_type_Id')
                ->select('Delivery_method_name', DB::raw('count(*) as count'))
                ->groupBy('Delivery_method_name')
                ->get(),
            'mostOrderedDish' => OrderDetail::join("dish" , "dish.id" , '=', 'order_detail.dish_Id')
                ->select("dish.dish_name as DishName", DB::raw('count(*) as TotalOrders'))
                ->groupBy('dish.dish_name')
                ->orderBy('TotalOrders', 'desc')
                ->limit(5)
                ->get(),
            'soFarBestMonth' => OrderHeader::select(DB::raw('MONTHNAME(created_at) as MonthName'), DB::raw('count(*) as TotalOrders'))
                ->groupBy('MonthName')
                ->orderBy('TotalOrders', 'desc')
                ->limit(3)
                ->get(),
            'request' => $request
        ]);
    }
    public function generateReceipt($orderId)
    {
        $order = OrderDetail::where('order_header_Id', '=', $orderId)
            ->join('dish', 'dish.id', '=', 'order_detail.dish_Id')
            ->select('dish.dish_name as DishName', 'order_detail.quantity as Quantity', 'order_detail.price as Price')
            ->get();
       $data = [
           'order' => $order,
           'orderId' => $orderId,
           'totalPrice' => OrderHeader::where('id', '=', $orderId)->select('total_price')->first()->total_price,
           'date' => date('m/d/Y')
       ];

       $pdf = PDF::loadView('statistics.receiptPDF', $data);
       return $pdf->stream();
    }
}
