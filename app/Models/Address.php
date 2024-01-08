<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'address';

    protected $fillable = [
        'city_name',
        'street_name',
        'building_number',
        'apartment_number',
        'zip_code',
        'floor_number',
        'Customer_Id',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'Customer_Id', 'id');
    }
}
