<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;
    protected $table = 'dish';
    protected $fillable = [
        'pizza_id',
        'dish_name',
        'dish_price',
        'dish_description',
        'dish_type_id',
    ];
    public function dishType()
    {
        return $this->belongsTo(DishType::class, 'dish_type_id', 'id');
    }
    public function pizza()
    {
        return $this->hasOne(Pizza::class, 'id', 'pizza_id');
    }
    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class, 'dish_Id', 'id');
    }
    public static function getDishInfo()
    {
        $dishInfo = self::with('dishType')->get();
        return $dishInfo;
    }


    public static function getPizzasWithIngredientsArray()
    {
       $dishInfo = self::join('pizza', 'dish.pizza_id', '=', 'pizza.id')
                    ->join('dish_type', 'dish.dish_type_id', '=', 'dish_type.id')
                    ->select('dish.*','dish_type.dish_type_name', 'pizza.pizza_name')
                    ->with('dishType')
                    ->get();
        return $dishInfo;
    }
}
