<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;
    protected $table = 'dish';
    protected $fillable = [
        'dish_name',
        'dish_price',
        'dish_description',
        'dish_type_id',
    ];
    public function dishType()
    {
        return $this->belongsTo(DishType::class, 'dish_type_id', 'id');
    }
    public static function getDishInfo()
    {
        $dishInfo = self::with('dishType')->get();
        return $dishInfo;
    }
}
