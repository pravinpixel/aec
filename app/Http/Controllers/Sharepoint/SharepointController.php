<?php

namespace App\Http\Controllers\Sharepoint;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class SharepointController extends Controller
{
    public function __construct()
    {
       
    }

    public function getToken()
    {
        $client  = new Client();
        $res = $client->request('POST', 'https://accounts.accesscontrol.windows.net/ae3eb95f-ac8f-4337-88b5-dbd0afe01b6f/tokens/OAuth/2', [
            'form_params' => [
                'grant_type' => 'client_credentials',
                        'client_id' => '47e46fb2-ec3b-4927-9596-290f5976be4d@ae3eb95f-ac8f-4337-88b5-dbd0afe01b6f',
                        'client_secret' => 'qkASV5P8TZ6Zru9+oJsfs3Gep9KF2rP5JyoCfd2ZxzI=',
                        'resource' => '00000003-0000-0ff1-ce00-000000000000/aecprefab.sharepoint.com@ae3eb95f-ac8f-4337-88b5-dbd0afe01b6f'
            ]
        ]);
        $responseJson = $res->getBody()->getContents();
        $responseData = json_decode($responseJson, true);
        Session::put('access_token', $responseData['access_token']);
        Log::info("Sharepoint Token set successfully");
    }

    public function create( $folder)
    {
        if(empty(Session::get('access_token'))) {
            $this->getToken();
        }
        Log::info("New folder created start - path :".$folder);
        $client = new Client();
        $url = $this->getUrl('folders');
        $res = $client->post($url, [
            'headers' => array('Authorization' =>  'Bearer '.Session::get('access_token'),'Content-Type' => 'application/json;odata=verbose','Accept'=> 'application/json;odata=verbose'),
            "json"=> [
                "__metadata"=> ["type"=> "SP.Folder"],
                "ServerRelativeUrl"=> "/sites/AECCRMApplication/Shared Documents".$folder
            ]
        ]);
        $responseJson = $res->getBody()->getContents();
        $responseData = json_decode($responseJson, true);
        Log::info("New folder created end");
        return $responseData;
    }

    public function delete( $folder)
    {
        if(empty(Session::get('access_token'))) {
            $this->getToken();
        }
        Log::info("folder deleted start- path :".$folder);
        $client = new Client();
        $url = $this->getUrl("GetFolderByServerRelativeUrl('/sites/AECCRMApplication/Shared Documents/".$folder."')");
        $res = $client->post($url, [
            'headers' => array('Authorization' =>  'Bearer '.Session::get('access_token'),'X-HTTP-Method'=> 'DELETE','Content-Type' => 'application/json;odata=verbose','Accept'=> 'application/json;odata=verbose'),
        ]);
        $responseJson = $res->getBody()->getContents();
        $responseData = json_decode($responseJson, true);
        Log::info("folder deleted end");
        return $responseData;
    }

    public function getUrl($route, $options = [])
    {
        return Config::get('services.sharepoint.site_url').'/_api/web/'.$route;
    }
}
