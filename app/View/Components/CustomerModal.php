<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CustomerModal extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public string $lastname,
        public string $email,
        public string $phone,
        public string $orderId,

    ){}



    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.customer-modal');
    }
}
