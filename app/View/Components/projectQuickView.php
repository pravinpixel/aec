<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\App;

class projectQuickView extends Component
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
        $project =  App::make("App\Http\Controllers\Admin\Project\ProjectController")->overViewProject($this->id);
        $table_status = $this->table;
        $chat_status  = $this->chat;
        return view('components.project-quick-view',compact('table_status','chat_status','project'));
    }
}
