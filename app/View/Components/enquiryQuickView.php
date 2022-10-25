<?php

namespace App\View\Components;

use App\Http\Controllers\Customer\EnquiryController;
use Illuminate\Support\Facades\App;
use Illuminate\View\Component;

class enquiryQuickView extends Component
{
    public $id;
    public $table;
    public $chat;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $table, $chat) {
        $this->id    = $id;
        $this->table = $table;
        $this->chat  = $chat;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    { 
        $enquiry =  App::make("App\Http\Controllers\Customer\EnquiryController")->getEditEnquiryReview($this->id);

        $detail_table['project_name']     = $enquiry['project_infos']['project_name'];
        $detail_table['enquiry_number']   = $enquiry['project_infos']['enquiry_no'];
        $detail_table['name']             = $enquiry['project_infos']['contact_person'];
        $detail_table['company_name']     = $enquiry['project_infos']['company_name'];
        $detail_table['mobile']           = $enquiry['project_infos']['mobile_no'];
        $detail_table['email']            = $enquiry['additional_infos']->customer['email'] ?? "";
        $detail_table['type_of_delivery'] = $enquiry['project_infos']['delivery_type']['delivery_type_name'] ?? "";
        
        $table_status = $this->table;
        $chat_status  = $this->chat;

        return view('components.enquiry-quick-view', compact('enquiry', 'detail_table','table_status','chat_status'));
    }
}