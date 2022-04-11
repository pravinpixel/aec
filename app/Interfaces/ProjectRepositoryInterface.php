<?php

namespace App\Interfaces;

interface ProjectRepositoryInterface
{
    public function create($enquiry_id, array  $data);
    public function assingProjectToUser($enquiry_id, array  $data);
    public function unestablishedProjectList($request);
    public function getProjectById($id);
    public function storeProjectCreation($id, $data);
    public function storeConnectPlatform($id, $data);
    public function checkReferenceNumber();
    public function storeTeamSetupPlatform($project_id, $data);
    public function getProjectTeamSetup($project_id);
    public function getGranttChartTaskLink($project_id);
}