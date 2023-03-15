<?php

namespace App\View\Components;

use Illuminate\View\Component;

class adminLayout extends Component
{ 
    public function render()
    {
        if(Admin() !== null) {
            $access = true;
        } else {
            $access = false;
        }
        return view('components.admin-layout',compact('access'));
    }
}
