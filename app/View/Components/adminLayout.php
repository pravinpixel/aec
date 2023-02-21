<?php

namespace App\View\Components;

use Illuminate\View\Component;

class adminLayout extends Component
{
   public $access = false;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        if(!is_null(Admin())) {
            $this->access = true;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin-layout');
    }
}
