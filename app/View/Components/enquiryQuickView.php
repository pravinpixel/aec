<?php

namespace App\View\Components;

use App\Http\Controllers\Customer\EnquiryController;
use Illuminate\Support\Facades\App;
use Illuminate\View\Component;

class enquiryQuickView extends Component
{
    public $id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id) {
        $this->id = $id;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $enquiry =  App::make("App\Http\Controllers\Customer\EnquiryController")->getEditEnquiryReview($this->id);
        return view('components.enquiry-quick-view', compact('enquiry'));
    }
}