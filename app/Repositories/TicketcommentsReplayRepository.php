<?php

namespace App\Repositories;

use App\Interfaces\TicketcommentsReplayinterface;
use App\Models\TicketcommentsReplay;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TicketcommentsReplayRepository implements TicketcommentsReplayinterface
{
    protected $model;
    public function __construct(
        TicketcommentsReplay $TicketreplayComments,
        Project $projectModel
    ) {
        $this->model = $TicketreplayComments;
        $this->Project   = $projectModel;
    }

    public function create(array $data)
    {
       
        return $this->model->create($data);
    }
}