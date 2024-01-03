<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;
    protected $table = 'dish';
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
