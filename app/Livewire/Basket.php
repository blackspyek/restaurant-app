<?php

namespace App\Livewire;

use App\Models\Dish;
use Illuminate\Support\Collection;
use Livewire\Attributes\On;
use Livewire\Component;


class Basket extends Component
{
    /**
     * Indicates if the basket is open or closed
     *
     * @var bool
     */
    public $toggle = false;

    public $basket = [];

    public $dishes = [];

    /**
     * Indicates the total price of the basket
     *
     * @var float
     */
    public $total = 0.00;

    #[On('basketUpdated')]
    public function hydrate(): void
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

    }

    /**
     * Returns the Collection of dish objects with the following properties: ['id', 'name', 'price', 'qty', 'total'
     *
     * @return Collection
     */
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
                    'name' => $dish->dish_name,
                    'price' => $dish->dish_price,
                    'qty' => $qty = $this->basket[$dish->id],
                    'total' => $dish->dish_price * $qty
                ];
            });


    }

    public function render()
    {
        return view('livewire.basket');
    }

    /**
     * Toggles or untoggles the basket on click
     *
     * @return void
     */

    #[On('toggleBasket')]
    public function toggle(): void
    {
        $this->toggle = !$this->toggle;
    }

    /**
     * Updates the basket
     *
     * @return void
     */
    private function update() : void
    {
        $this->dispatch('basketUpdated');
    }
    /**
     * Increases the quantity of a dish in the basket
     *
     * @param $id
     * @return void
     */
    public function increase(int $id)
    {
        basket()->add($id, $this->basket[$id] + 1);
        $this->update();
    }

    /**
     * Decreases the quantity of a dish in the basket
     *
     * @param $id
     * @return void
     */
    public function decrease(int $id)
    {
        if (($qty = $this->basket[$id] - 1 ) < 1) {
            basket()->remove($id);
            $this->update();
        }
        else {
            basket()->add($id, $qty);
            $this->update();
        }
    }
}
