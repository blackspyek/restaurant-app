<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PizzaIngredients extends Model
{
    use HasFactory;
    protected $table = 'pizza_ingredients_';

    public function pizza()
    {
        return $this->belongsTo(Pizza::class, 'pizza_id', 'id');
    }
    public function pizzaIngredient()
    {
        return $this->belongsTo(PizzaIngredient::class, 'pizza_ingredient_id', 'id');
    }


}
