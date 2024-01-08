<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderHeader extends Model
{
    use HasFactory;

    protected $table = 'order_header';

    protected $fillable = [
        'customer_Id',
        'address_Id',
        'delivery_type_Id',
        'payment_type_Id',
        'payment_status_Id',
        'employee_Id',
        'total_price',
        'gateway_code',
        'company_name',
        'note',
        'order_status_Id',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_Id', 'id');
    }

    public function deliveryType()
    {
        return $this->belongsTo(DeliveryType::class, 'delivery_type_Id', 'id');
    }

    public function paymentType()
    {
        return $this->belongsTo(PaymentType::class, 'payment_type_Id', 'id');
    }

    public function paymentStatus()
    {
        return $this->belongsTo(PaymentStatus::class, 'payment_status_Id', 'id');
    }

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_Id', 'id');
    }

    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class, 'order_header_Id', 'id');
    }

}
