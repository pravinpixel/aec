<?php

namespace App\Helper\Bim360;

use App\Helper\Bim360\Bim360ApiHelper;

interface IBim360ProjectsApi
{
    public function createProject($project);
    public function editProject($id, $project);
    public function getProjectList();
    public function getProject($id);
}

class Bim360ProjectsApi implements IBim360ProjectsApi
{
    private $apiHelper;
    private $token;

    function __construct()
    {
        $this->apiHelper = new Bim360ApiHelper();
        $tokenInternal = $this->apiHelper->getTokenInternal();
        $this->token = $tokenInternal->getAccessToken();
    }

    public function createProject($project)
    {
        $url = $this->apiHelper->urls['projects'];
        $result = $this->apiHelper->callAPI($this->token, 'POST', $url, $project);
        return $result;
    }

    public function editProject($id, $project)
    {
        $url = $this->apiHelper->urls['projects_projectId'];
        $url = str_replace("{ProjectId}", $id, $url);
        $result = $this->apiHelper->callAPI($this->token, 'PATCH', $url, $project);
        return $result;
    }

    public function getProjectList()
    {
        $url = $this->apiHelper->urls['projects'];
        $result = $this->apiHelper->callAPI($this->token, 'GET', $url, null);
        return $result;
    }

    public function getProject($id)
    {
        $url = $this->apiHelper->urls['projects_projectId'];
        $url = str_replace("{ProjectId}", $id, $url);
        $result = $this->apiHelper->callAPI($this->token, 'GET', $url, null);
        return $result;
    }

    public function patchImage($id, $file)
    {
        $url = str_replace("{ProjectId}", $id, $this->urls['projects_projectId_image_patch']);
        $result = $this->apiHelper->patchImage($this->token, $file, $url);
        return $result;
    }

    public function getProjectUsers($id)
    {
        $url = $this->apiHelper->urls['projects_projectId_users1'];
        $url = str_replace("{ProjectId}", $id, $url);
        $result = $this->apiHelper->callAPI($this->token, 'GET', $url, null);
        return $result;
    }

    public function getProjectIndustryRoles($id)
    {
        $url = $this->apiHelper->urls['projects_projectId_industryRoles'];
        $url = str_replace("{ProjectId}", $id, $url);
        $result = $this->apiHelper->callAPI($this->token, 'GET', $url, null);
        return $result;
    }

    public function getAccountUsers()
    {
        $url = $this->apiHelper->urls['users'];
        $result = $this->apiHelper->callAPI($this->token, 'GET', $url, null);
        return $result;
    }
}
