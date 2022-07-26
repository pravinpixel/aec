<?php

namespace App\Helper\Bim360;

use App\Helper\Bim360\Bim360ApiHelper;

interface IBim360CompaniesApi
{
    public function createCompany($company);
    public function editCompany($id, $company);
    public function getCompanyList();
    public function getCompany($id);
}

class Bim360CompaniesApi implements IBim360CompaniesApi
{
    private $apiHelper;
    private $token;

    function __construct()
    {
        $this->apiHelper = new Bim360ApiHelper();
        $tokenInternal = $this->apiHelper->getTokenInternal();
        $this->token = $tokenInternal->getAccessToken();
    }

    public function createCompany($company)
    {
        $url = $this->apiHelper->urls['companies'];
        $result = $this->apiHelper->callAPI($this->token, 'POST', $url, $company);
        return $result;
    }

    public function editCompany($id, $company)
    {
        $url = $this->apiHelper->urls['companies_companyId'];
        $url = str_replace("{CompanyId}", $id, $url);
        $result = $this->apiHelper->callAPI($this->token, 'PATCH', $url, $company);
        return $result;
    }

    public function getCompanyList()
    {
        $url = $this->apiHelper->urls['companies'];
        $result = $this->apiHelper->callAPI($this->token, 'GET', $url, null);
        return $result;
    }

    public function getCompany($id)
    {
        $url = $this->apiHelper->urls['companies_companyId'];
        $url = str_replace("{CompanyId}", $id, $url);
        $result = $this->apiHelper->callAPI($this->token, 'GET', $url, null);
        return $result;
    }

    public function patchImage($id, $file)
    {
        $url = str_replace("{CompanyId}", $id, $this->urls['companies_companyId_image_patch']);
        $result = $this->apiHelper->patchImage($this->token, $file, $url);
        return $result;
    }
   
}
