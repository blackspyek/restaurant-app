<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class BasketButton extends Component
{
    public $qty = 0;

    /**
     * Mount component.
     *
     * @return void
     */
    public function mount(): void
    {
        $this->update();
    }

    /**
     * Update quantity if the basketUpdate occured
     *
     * @return void
     */
    #[On('basketUpdated')]
    public function update() : void
    {
        $this->qty = array_sum(basket()->all());

    }

    /**
     * Toggles the basket on click
     *
     * @return void
     */
    public function toggle() : void
    {
        $this->dispatch('toggleBasket');
    }

    /**
     * Render the component.
     *
     * @return View
     */
    public function render() : View
    {
        return view('livewire.basket-button');
    }
}
