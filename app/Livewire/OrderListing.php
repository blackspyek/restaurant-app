<?php

namespace App\Livewire;

use App\Models\Dish;
use App\Models\PizzaIngredients;
use Illuminate\Support\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

class OrderListing extends Component
{
    public $basket = [];

    public $dishes = [];

    public $ingredients = [];
    public $total = 0.00;



    public function boot(): void
    {
        $this->basket = basket()->all(); // Sets the basket with the associated array of all dishes in the basket and their quantities ['dish_id' => 'qty'']

        /**
         *
         *  Sets the dishes property with the array of objects from the dishes() method
         *  and sets the total property with the sum of the total price of all dishes in the basket
         */

        $this->dishes = tap(
            $this->dishes(),
            function (Collection $dishes) {
                $this->total = $dishes->sum('total');
            }
        )->toArray();

        $this->ingredients = $this->ingredients();
    }
    public function render()
    {
        return view('livewire.order-listing');
    }
    private function dishes(): Collection
    {
        if (empty($this->basket)) {
            return collect();
        }
        /**
         *
         *  Fetches dishes from the database that are in the basket, and for each dish, creates an object with the following properties:
         *
         */
        return Dish::whereIn('id', array_keys($this->basket))
            ->get()
            ->map(function (Dish $dish) {
                return (object)[
                    'id' => $dish->id,
                    'pizza_id' => $dish->pizza_id,
                    'name' => $dish->dish_name,
                    'price' => $dish->dish_price,
                    'qty' => $qty = $this->basket[$dish->id],
                    'total' => $dish->dish_price * $qty
                ];
            });


    }
    private function ingredients()
    {
        if (($test = $this->dishes()->pluck('pizza_id')->unique()->toArray()) == null)
            return array();
        return PizzaIngredients::join('pizza', 'pizza_ingredients_.pizza_id', '=', 'pizza.id')
            ->join('pizza_ingredient', 'pizza_ingredients_.pizza_ingredient_id', '=', 'pizza_ingredient.id')
            ->select('pizza.id as pizza_id', 'pizza_ingredient.pizza_ingredient_name')
            ->whereIn('pizza_id',$test)
            ->get()
            ->groupBy('pizza_id')
            ->map(function ($group) {
                return $group->pluck('pizza_ingredient_name');
            })
            ->toArray();

    }

}
