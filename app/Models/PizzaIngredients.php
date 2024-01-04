<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PizzaIngredients extends Model
{
    use HasFactory;
    protected $table = 'pizza_ingredients_';
    protected $fillable = [
        'pizza_id',
        'pizza_ingredient_id',
    ];
    public function pizza()
    {
        return $this->belongsTo(Pizza::class, 'pizza_id', 'id');
    }
    public function pizzaIngredient()
    {
        return $this->belongsTo(PizzaIngredient::class, 'pizza_ingredient_id', 'id');
    }

    public static function getArrayOfIngredients($pizza_id)
    {
        $pizza_ingredients = PizzaIngredients::where('pizza_id', $pizza_id)->get();
        $pizza_ingredients_array = [];
        foreach ($pizza_ingredients as $pizza_ingredient) {
            array_push($pizza_ingredients_array,$pizza_ingredient["pizza_ingredient_id"]);
        }
        return $pizza_ingredients_array;
    }


}
