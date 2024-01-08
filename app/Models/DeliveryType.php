<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryType extends Model
{
    use HasFactory;

    protected $table = 'delivery_type';
    protected $fillable = [
        'Delivery_method_name',
        'Delivery_method_price',
    ];
}
