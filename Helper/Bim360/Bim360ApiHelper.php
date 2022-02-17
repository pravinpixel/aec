<?php

namespace App\Helper\Bim360;

use Autodesk\Auth\Configuration;
use Autodesk\Auth\OAuth2\TwoLeggedAuth;
use Autodesk\Forge\Client\Api\BucketsApi;
use Autodesk\Forge\Client\Model\PostBucketsPayload;
use Autodesk\Forge\Client\Api\ObjectsApi;

use Autodesk\Forge\Client\Api\DerivativesApi;
use Autodesk\Forge\Client\Api\HubsApi;
use Autodesk\Forge\Client\Model\JobPayload;
use Autodesk\Forge\Client\Model\JobPayloadInput;
use Autodesk\Forge\Client\Model\JobPayloadOutput;
use Autodesk\Forge\Client\Model\JobPayloadItem;

use Autodesk\Forge\Client\Api\ProjectsApi;
use Autodesk\Forge\Client\Api\AccountProjectsApi;
use Autodesk\Forge\Client\Model\Project;
use CURLFile;

class Bim360ApiHelper
{
   //https://developer.api.autodesk.com/hq/v1/accounts/e3d5ef8d-5c37-4b9d-925d-1e6d24753ace/projects' \
   private $base_url = "https://developer.api.autodesk.com/";
   //https://developer.api.autodesk.com/bim360/admin/v1/projects/:projectId/users
   // elaa1979@gmail.com
   private $clientId = "tAY4ATBA78LG9PZG3geOW7cbDyxs4JGR";
   private $clientSecret = "8fWzMPGVZH5bGfC6";
   private $accountid = "d6c5bc07-b549-4faf-aee4-7bfc521e8cce";
   private $hubid = "b.d6c5bc07-b549-4faf-aee4-7bfc521e8cce";

   // Arun account
   // private $clientId = "AA9tRkeDQP9TmvPPtUG540plagL9XKCH";
   // private $clientSecret = "zyUTW5b1ITHYYSfc";
   // private $accountid = "ae8f84cf-204a-45bd-9cbc-684e323e1ba3";
   // private $hubid = "b.ae8f84cf-204a-45bd-9cbc-684e323e1ba3";

   private $accountRegion = "US";
   private $token;
   public  $urls = [];

   function __construct()
   {
      $this->setUrls($this->accountRegion);
      Configuration::getDefaultConfiguration()
         ->setClientId($this->clientId)
         ->setClientSecret($this->clientSecret);
   }

   public static function getScopeInternal()
   {
      return [
         // 'user-profile:read',
         // 'user:read',
         // 'user:write',
         'bucket:create',
         'bucket:read',
         'bucket:update',
         'bucket:delete',
         'data:read',
         'data:write',
         'data:search',
         'account:read',
         'account:write',
      ];
   }

   // Required scope of the token sent to the client
   public static function getScopePublic()
   {
      // Will update the scope to viewables:read when #13 of autodesk/forge-client is fixed
      return ['data:read'];
   }

   public function getTokenPublic()
   {
      if (!isset($_SESSION['AccessTokenPublic']) || $_SESSION['ExpiresTime'] < time()) {
         $twoLeggedAuthPublic = new TwoLeggedAuth();
         $twoLeggedAuthPublic->setScopes($this->getScopePublic());
         $twoLeggedAuthPublic->fetchToken();
         $_SESSION['AccessTokenPublic'] = $twoLeggedAuthPublic->getAccessToken();
         $_SESSION['ExpiresInPublic']   = $twoLeggedAuthPublic->getExpiresIn();
         $_SESSION['ExpiresTime']       = time() . $_SESSION['ExpiresInPublic'];
      }
      return array(
         'access_token'  => $_SESSION['AccessTokenPublic'],
         'expires_in'    => $_SESSION['ExpiresInPublic'],
      );
   }

   public function getTokenInternal()
   {
      $twoLeggedAuthInternal = new TwoLeggedAuth();
      $twoLeggedAuthInternal->setScopes($this->getScopeInternal());

      if (!isset($_SESSION['AccessTokenInternal']) || $_SESSION['ExpiresTime'] < time()) {
         $twoLeggedAuthInternal->fetchToken();
         $_SESSION['AccessTokenInternal'] =  $twoLeggedAuthInternal->getAccessToken();
         $_SESSION['ExpiresInInternal']   =    $twoLeggedAuthInternal->getExpiresIn();
         $_SESSION['ExpiresTime']         = time() + $_SESSION['ExpiresInInternal'];
      }

      $twoLeggedAuthInternal->setAccessToken($_SESSION['AccessTokenInternal']);
      return $twoLeggedAuthInternal;
   }

   public function GetToken()
   {
      $url = "https://developer.api.autodesk.com/authentication/v1/authenticate";

      $curl = curl_init($url);
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

      $headers = array(
         "Content-Type: application/x-www-form-urlencoded",
      );
      curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

      $data = "client_id=" . $this->clientId . "&client_secret=" . $this->clientSecret . "&grant_type=client_credentials&scope=data%3Aread";

      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

      //for debug only!
      curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

      $resp = curl_exec($curl);
      curl_close($curl);
      var_dump($resp);
      return $resp;
   }

   function callAPI($authtoken, $method, $url, $data)
   {
      $token = 'Authorization: Bearer ' . $authtoken;
      $curl = curl_init();
      switch ($method) {
         case "POST":
            curl_setopt($curl, CURLOPT_POST, true);
            if ($data)
               curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
         case "PUT":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
            if ($data)
               curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
         case "PATCH":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PATCH");
            if ($data)
               curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
         default:
            if ($data)
               $url = sprintf("%s?%s", $url, http_build_query((array)$data));
      }
      // OPTIONS:
      curl_setopt($curl, CURLOPT_URL, $this->base_url . $url);
      curl_setopt($curl, CURLOPT_HTTPHEADER, array(
         $token,
         'Content-Type: application/json',
      ));
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BEARER);
      // curl_setopt($curl,CURLOPT_XOAUTH2_BEARER,$authtoken);
      // EXECUTE:
      $result = curl_exec($curl);
      // get info about the request
      $info = curl_getinfo($curl);
      if (!$result) {
         die("Connection Failure");
      }

      curl_close($curl);
      return $result;
   }

   function setUrls($accountRegion)
   {
      $regionBasedUrl = "";
      $Urls = [];
      switch ($accountRegion) {
         case "US":
            break;

         case "EU":
            $regionBasedUrl = "regions/eu/";
            break;
         default:
            break;
      }

      $Urls["projects"] = "hq/v1/" . $regionBasedUrl . "accounts/" . $this->accountid . "/projects";
      $Urls["projects_projectId"] = "hq/v1/" . $regionBasedUrl . "accounts/" . $this->accountid . "/projects/{ProjectId}";
      $Urls["projects_projectId_companies"] = "hq/v1/" . $regionBasedUrl . "accounts/" . $this->accountid . "/projects/{ProjectId}/companies";
      $Urls["projects_projectId_image_patch"] = "hq/v1/accounts/" . $this->accountid . "/projects/{ProjectId}/image";
      //https://developer.api.autodesk.com/bim360/admin/v1/projects/:projectId/users
      $Urls["projects_projectId_users"] = "hq/v1/" . $regionBasedUrl . "accounts/" . $this->accountid . "/projects/{ProjectId}/users";
      $Urls["projects_projectId_users1"] = "bim360/admin/v1/projects/{ProjectId}/users";
      $Urls["projects_projectId_users_import"] = "hq/v2/" . $regionBasedUrl . "accounts/" . $this->accountid . "/projects/{ProjectId}/users/import";
      $Urls["projects_projectId_user_patch"] = "hq/v2/" . $regionBasedUrl . "accounts/" . $this->accountid . "/projects/{ProjectId}/users/{UserId}";
      $Urls["projects_projectId_industryRoles"] = "hq/v2/" . $regionBasedUrl . "accounts/" . $this->accountid . "/projects/{ProjectId}/industry_roles";
      
      $Urls["companies"] = "hq/v1/" . $regionBasedUrl . "accounts/" . $this->accountid . "/companies";
      $Urls["companies_companyId"] = "hq/v1/" . $regionBasedUrl . "accounts/" . $this->accountid . "/companies/{CompanyId}";
      $Urls["companies_import"] = "hq/v1/" . $regionBasedUrl . "accounts/" . $this->accountid . "/companies/import";
      $Urls["companies_companyId_image_patch"] = "hq/v1/accounts/" . $this->accountid . "/companies/{CompanyId}/image";
      
      $Urls["users"] = "hq/v1/" . $regionBasedUrl . "accounts/" . $this->accountid . "/users";
      $Urls["users_userId"] = "hq/v1/" . $regionBasedUrl . "accounts/" . $this->accountid . "/users/{UserId}";
      $Urls["users_import"] = "hq/v1/" . $regionBasedUrl . "accounts/" . $this->accountid . "/users/import";
      $Urls["users_userId_image_patch"] = "hq/v1/accounts/" . $this->accountid . "/users/{UserId}/image";
      
      $Urls["businessUnitsStructure"] = "hq/v1/" . $regionBasedUrl . "accounts/" . $this->accountid . "/business_units_structure";
      $Urls["folders_folder_contents"] = "data/v1/projects/{ProjectId}/folders/{FolderId}/contents";
      $Urls["hubs"] = "project/v1/hubs";
      $Urls["hubs_hubId"] = "project/v1/hubs/{HubId}";
      $Urls["hubs_topfolders"] = "project/v1/hubs/{HubId}/projects/{ProjectId}/topFolders";
      $Urls["folder_permission"] = "bim360/docs/v1/projects/{ProjectId}/folders/{FolderId}/permissions";
      $Urls["folder_permission_create"] = "bim360/docs/v1/projects/{ProjectId}/folders/{FolderId}/permissions:batch-create";

      $this->urls = $Urls;
   }

   function patchImage($authtoken, $file, $url)
   {
      
      $token = 'Authorization: Bearer ' . $authtoken;

      $pathoffile = $file['tmp_name'];
      $handle = fopen($pathoffile, "r");
      $data = fread($handle, filesize($pathoffile));

      $chunkdata = array('chunk' => curl_file_create($pathoffile, $file['type']));

      $curl = curl_init();
      curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PATCH");
      curl_setopt($curl, CURLOPT_URL, $this->base_url . $url);
      curl_setopt($curl, CURLOPT_HTTPHEADER, array(
         $token,
         'Content-Type: multipart/form-data',
      ));
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $chunkdata);

      // EXECUTE:
      $result = curl_exec($curl);
      // get info about the request
      //$info = curl_getinfo($curl);
      if (curl_errno($curl)) {
         echo 'Error:' . curl_error($curl);
      }
      if (!$result) {
         die("Connection Failure");
      }

      curl_close($curl);
      return $result;
   }

   function __destruct()
   {
   }
}
