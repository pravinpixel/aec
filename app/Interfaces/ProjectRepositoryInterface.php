<?php

namespace App\Interfaces;

interface ProjectRepositoryInterface
{
    public function create($enquiry_id, array  $data);
    public function assingProjectToUser($enquiry_id, array  $data);
    public function unestablishedProjectList($request);
}