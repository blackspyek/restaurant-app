<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DishType extends Model
{
    use HasFactory;
    protected $table = 'dish_type';
    public function dish()
    {
        return $this->belongsToMany(Dish::class, 'dish_dish_type', 'dish_type_id', 'dish_id');

    }
}
