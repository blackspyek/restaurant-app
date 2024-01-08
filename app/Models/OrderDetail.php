<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'order_detail';

    protected $fillable = [
        'order_header_Id',
        'dish_Id',
        'quantity',
        'price',
    ];

    public function orderHeader()
    {
        return $this->belongsTo(OrderHeader::class, 'order_header_Id', 'id');
    }

    public function dish()
    {
        return $this->belongsTo(Dish::class, 'dish_Id', 'id');
    }
}
