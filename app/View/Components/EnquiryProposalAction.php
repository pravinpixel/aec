<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EnquiryProposalAction extends Component
{
    public $proposal;
    public function __construct($proposal)
    {
        $this->proposal = $proposal;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.enquiry-proposal-action');
    }
}
