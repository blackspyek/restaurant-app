<?php

namespace App\Livewire;

use App\Models\Dish;
use Livewire\Component;

class DisableDish extends Component
{
    public $dishes;

    public $dishCheck = [];
    public function mount()
    {
        $this->dishes = Dish::all();
    }
    public function render()
    {
        return view('livewire.disable-dish');
    }
    public function disableSelected()
    {
        $tempDish = Dish::whereIn('id', $this->dishCheck)->get();

        foreach ($tempDish as $dish)
        {
            $dish->update([
                'status' => ($dish->status == 1 ? 0 : 1)
            ]);
        }
        $this->dishes = Dish::all();
        $this->dishCheck = [];
    }
}
