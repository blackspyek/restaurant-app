<?php

namespace App\Livewire;

use Livewire\Component;

class StatisticButtons extends Component
{
    public $order;
    public function render()
    {
        return view('livewire.statistic-buttons');
    }

}
