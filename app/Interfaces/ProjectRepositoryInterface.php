<?php

namespace App\Interfaces;

interface ProjectRepositoryInterface
{
    public function create($enquiry_id, array  $data);
    public function assignProjectToUser($enquiry_id, array  $data);
    public function unestablishedProjectList($request);
    public function getProjectById($id);
    public function storeProjectCreation($id, $data);
    public function storeConnectPlatform($id, $data);
    public function checkReferenceNumber();
    public function storeTeamSetupPlatform($project_id, $data);
    public function getProjectTeamSetup($project_id);
    public function getGranttChartTaskLink($project_id);
    public function getInvoicePlan($project_id);
    public function storeInvoicePlan($project_id, $data, $flag = true);
    public function getTeamsetupTemplate($data);
    public function storeTeamsetupTemplate($data);
    public function getTeamsetupTemplateById($id);
    public function getFolderById($id);
    public function storeFolder($data);
    public function updateFolder($id, $data);
    public function getSharePointFolder($id);
    public function getToDoListData($id);
    public function draftOrSubmit($id, $data);
    public function liveProjectList($request);
    public function createSharepointFolder($project_id);
    public function updateWizardStatus($project, $column, $value);
    public function liveprojectdata($id);
    public function getliveProjectById($id);
    public function getliveProjectchart($id,$type);
    // public function storeToDoList($id, $data);
}