<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class AddToBasketButton extends Component
{
    /**
     * @var int
     */
    public $qty = 1;

    public $current_qty = 0;
    public $dishId;



    /**
     * Mount Component, sets the public property $dishId with the dish id passed from the view
     * @param int $dishId
     * @return void
     */
    public function mount(int $dishId): void
    {
        $this->dishId = $dishId;
    }

    /**
     * Hydrate component.
     *
     * @return void
     */
    public function hydrate(): void
    {
        $this->current_qty = basket()->getCurrentQty($this->dishId);
    }
    /**
     * Add product to the basket.
     *
     * @return void
     */
    public function add() : void
    {
        $qty = $this->current_qty + 1;

        basket()->add($this->dishId, $qty);

        $qty = 1;

        $this->dispatch('basketUpdated');
    }
    /**
     * Render component.
     *
     * @return \Iluuminate\View\View
     */
    public function render(): View
    {
        return view('livewire.add-to-basket-button');
    }
}
