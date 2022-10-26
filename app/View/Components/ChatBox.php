<?php

namespace App\View\Components;

use App\Helper\Notify;
use App\Models\Enquiry;
use Illuminate\View\Component;

class ChatBox extends Component
{
    public $status;
    public $moduleName;
    public $moduleId;
    public $menuName;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct($status,$moduleName,$moduleId,$menuName)
    {
        $this->status     = $status;
        $this->moduleName = $moduleName;
        $this->moduleId   = $moduleId;
        $this->menuName   = $menuName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */

    public function render()
    {
        $status        = $this->status;
        $moduleName    = $this->moduleName;
        $moduleId      = $this->moduleId;
        $menuName      = $this->menuName;

        $conversations = Notify::getMessages([
            'module_name'   => $moduleName,
            'module_id'     => $moduleId,
            'menu_name'     => $menuName,
        ]);

        $customer = getCustomerByEnquiryId($moduleId); 

        return view('components.chat-box', compact(
            'status',
            'moduleName',
            'moduleId',
            'menuName',
            'conversations',
            'customer'
        ));
    }
}