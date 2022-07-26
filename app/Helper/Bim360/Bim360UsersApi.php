<?php

namespace App\Helper\Bim360;

use App\Helper\Bim360\Bim360ApiHelper;

interface IBim360UsersApi
{
    public function createUser($user);
    public function editUser($id, $user);
    public function getUserList();
    public function getUser($id);
}

class Bim360UsersApi implements IBim360UsersApi
{
    private $apiHelper;
    private $token;

    function __construct()
    {
        $this->apiHelper = new Bim360ApiHelper();
        $tokenInternal = $this->apiHelper->getTokenInternal();
        $this->token = $tokenInternal->getAccessToken();
    }

    public function createUser($user)
    {
        $url = $this->apiHelper->urls['users'];
        $result = $this->apiHelper->callAPI($this->token, 'POST', $url, $user);
        return $result;
    }

    public function editUser($id, $user)
    {
        $url = $this->apiHelper->urls['users_userId'];
        $url = str_replace("{UserId}", $id, $url);
        $result = $this->apiHelper->callAPI($this->token, 'PATCH', $url, $user);
        return $result;
    }

    public function getUserList()
    {
        $url = $this->apiHelper->urls['users'];
        $result = $this->apiHelper->callAPI($this->token, 'GET', $url, null);
        return $result;
    }

    public function getUser($id)
    {
        $url = $this->apiHelper->urls['users_userId'];
        $url = str_replace("{UserId}", $id, $url);
        $result = $this->apiHelper->callAPI($this->token, 'GET', $url, null);
        return $result;
    }

    public function patchImage($id, $file)
    {
        $url = $this->apiHelper->urls['users_userId_image_patch'];
        $url = str_replace("{UserId}", $id,  $url);
        $result = $this->apiHelper->patchImage($this->token, $file, $url);
        return $result;
    }

}
