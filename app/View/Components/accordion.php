<?php

namespace App\View\Components;

use Illuminate\View\Component;

class accordion extends Component
{
    public $title;
    public $path;
    public $open;
    public $slug;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $path, $open, $slug)
    {
        $this->title = $title;
        $this->path  = $path;
        $this->open  = $open == 'true' ? 'show' : $open;
        $this->slug  = $slug;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    { 
        return view('components.accordion');
    }
}
