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
    public static function getPizzaWithIngridients()
    {
        $pizza_ingredients = PizzaIngredients::join('pizza', 'pizza_ingredients_.pizza_id', '=', 'pizza.id')
            ->join('pizza_ingredient', 'pizza_ingredients_.pizza_ingredient_id', '=', 'pizza_ingredient.id')
            ->join('dish', 'pizza.id', '=', 'dish.pizza_id')
            ->select('dish.id', 'pizza.id as pizza_id','dish.dish_name','dish.dish_price', 'pizza_ingredient.pizza_ingredient_name', 'dish.status')
            ->get()
            ->groupBy('pizza_id')
            ->map(function ($group) {
                return [
                    'id' => $group->first()->id,
                    'pizza_id' => $group->first()->pizza_id,
                    'dish_name' => $group->first()->dish_name,
                    'dish_price' => $group->first()->dish_price,
                    'status' => $group->first()->status,
                    'ingredients' => $group->pluck('pizza_ingredient_name')->toArray(),
                ];
            })
            ->values();
        return $pizza_ingredients;
    }

}
