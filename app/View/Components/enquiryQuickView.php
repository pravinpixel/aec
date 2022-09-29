<?php

namespace App\View\Components;

use App\Http\Controllers\Customer\EnquiryController;
use App\Interfaces\CustomerEnquiryRepositoryInterface;
use Illuminate\View\Component;

class enquiryQuickView extends Component
{
    public $id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(EnquiryController $enquiry, $id) {
        $this->enquiry = $enquiry;
        $this->id      = $id;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    { 
        $enquiry = $this->enquiry->getEditEnquiryReview($this->id); 
        return view('components.enquiry-quick-view', compact('enquiry'));
    }
}