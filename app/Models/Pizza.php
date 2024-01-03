<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;
    protected $table = 'pizza';

    public function ingredients()
    {
        return $this->belongsToMany(PizzaIngredient::class, 'pizza_ingredients_', 'pizza_id', 'pizza_ingredient_id');
    }
    public static function getPizzasWithIngredientsArray()
    {
        $pizzasWithIngredients = self::with('ingredients')->get();



        return $pizzasWithIngredients;
    }


}
