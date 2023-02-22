<?php
namespace App\Interfaces;

interface LiveProjectInterface {
    public function get_milestones($id);
    public function store_milestones($id,$request);
    public function update_milestones($project_id,$task_id,$request);
    public function destroy_milestones($task_id);
}