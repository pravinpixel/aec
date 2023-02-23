<?php

namespace App\View\Components;

use Illuminate\View\Component;

class customerLayout extends Component
{
    public $access;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        if (Customer() !== null) {
            $this->access = false;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.customer-layout');
    }
}
