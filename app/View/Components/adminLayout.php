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
        if(Admin() !== null) {
            $this->access = true;
        } else {
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
        return view('components.admin-layout');
    }
}
