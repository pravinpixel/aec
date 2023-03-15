<?php

namespace App\View\Components;

use Illuminate\View\Component;

class customerLayout extends Component
{
    public function render()
    {
        if(Customer() !== null) {
            $access = true;
        } else {
            $access = false;
        }
        return view('components.customer-layout',compact('access'));
    }
}
