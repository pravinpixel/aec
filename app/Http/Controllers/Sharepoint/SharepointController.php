<?php

namespace App\Http\Controllers\Sharepoint;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Models\Project;
use App\Services\GlobalService;

class SharepointController extends Controller
{
    protected $basePath = "/sites/4Projects/Shared Documents";

    public function getToken()
    {
        $sharepoint = GlobalService::getSharepointToken();
        Log::info("Sharepoint Token ".json_encode(Session::get('sharepoint')));
        if(!$sharepoint) {
            $this->accessToken();
        } else {
            if(!isset($sharepoint['access_token']) || $sharepoint['expires_time'] < time() ){
                $this->accessToken();
            }
        }   
        $sharepoint = GlobalService::getSharepointToken();
        return $sharepoint['access_token'];
    }

    public function accessToken() 
    {
        $sharepoint = [];
        $client  = new Client();
        $res = $client->request('POST', 'https://accounts.accesscontrol.windows.net/ae3eb95f-ac8f-4337-88b5-dbd0afe01b6f/tokens/OAuth/2', [
            'form_params' => [
                'grant_type' => 'client_credentials',
                        'client_id' => 'bbfb2ede-2c61-4909-8c5c-b4cf6a7ce1b3@ae3eb95f-ac8f-4337-88b5-dbd0afe01b6f',
                        'client_secret' => 'bDYshqKJ5BARo3SztwfKrBHPcfGRPMlibfoA+n7DbQw=',
                        'resource' => '00000003-0000-0ff1-ce00-000000000000/aecprefab.sharepoint.com@ae3eb95f-ac8f-4337-88b5-dbd0afe01b6f'
            ]
        ]);
        $responseJson = $res->getBody()->getContents();
        $responseData = json_decode($responseJson, true);

        $sharepoint['access_token'] = $responseData['access_token'];
        $sharepoint['expires_in']   = $responseData['expires_in'];
        $sharepoint['expires_time'] = time() + $responseData['expires_in'];
        GlobalService::updateSharePointToken($sharepoint);
        Log::info("Sharepoint Token set successfully".json_encode($sharepoint));
    }

    public function create( $folder)
    {
        $token = $this->getToken();
        Log::info("Path :".$folder);
        $url = $this->getUrl('folders');
        $res = Http::retry(3, 100)
                        ->withHeaders([
                            'Authorization' =>  'Bearer '.$token,'Content-Type' => 'application/json;odata=verbose','Accept'=> 'application/json;odata=verbose'
                        ])
                        ->post($url, [
                                "__metadata"=> ["type"=> "SP.Folder"],
                                "ServerRelativeUrl"=> $this->basePath.$folder
                        ]);
        Log::info("Folder Creation {json_encode($res)}");
        $responseJson = $res->getBody()->getContents();
        $responseData = json_decode($responseJson, true);
        Log::info("New folder created end");
        return $responseData;
    }

    public function delete( $folder)
    {
        $token = $this->getToken();
        Log::info("folder deleted start- path :".$folder);
        $url = $this->getUrl("GetFolderByServerRelativeUrl('".$this->basePath.$folder."')");
        $res = Http::retry(3, 100)
                    ->withHeaders([
                        'Authorization' =>  'Bearer '.$token,'X-HTTP-Method'=> 'DELETE','Content-Type' => 'application/json;odata=verbose','Accept'=> 'application/json;odata=verbose'
                    ])      
                    ->post($url);
        $responseJson = $res->getBody()->getContents();
        $responseData = json_decode($responseJson, true);
        Log::info("folder deleted end");
        return $responseData;
    }

    public function createFile($folder, $file, $clientFileName)
    {
        $token = $this->getToken();
        Log::info("folder  path :".$folder);
        $url = $this->getUrl("GetFolderByServerRelativeUrl('".$this->basePath.$folder."')/Files/Add(url='".$clientFileName."', overwrite=true)");
        $res =  Http::attach('file', file_get_contents($file), $clientFileName)->withHeaders([
            'Authorization' =>  'Bearer '.$token,
            'Content-Type' => 'octet-stream',
            'Accept'=> 'application/json;odata=verbose'
        ])->post( $url );
        $responseJson = $res->getBody()->getContents();
        $responseData = json_decode($responseJson, true);
        Log::info("folder deleted end");
        return $responseData;
    }

    public function listAllFolder($projectId){
        $projectcollection  = Project :: find($projectId);
        $foldername = str_replace ("/", "-", $projectcollection->reference_number);
        $folder = '/DataBase Test/Projects/'.$foldername;
        $token = $this->getToken();
        ///Log::info("folder  path :".$folder);
        $url = $this->getUrl("GetFolderByServerRelativeUrl('".$this->basePath.$folder."')/Folders");
        $res =  Http::withHeaders([
            'Authorization' =>  'Bearer '.Session::get('sharepoint')['access_token'],
            'Content-Type' => 'octet-stream',
            'Accept'=> 'application/json;odata=verbose'
        ])->get( $url );
        $responseJson = $res->getBody()->getContents();
        $responseData = json_decode($responseJson, true);
        $data = array();
        foreach($responseData as $res){
            $rescollection = $res['results'];
            foreach($rescollection as $resdata){
                $items = array();
                if($resdata['ItemCount']  != 0){
                    $folderfiles = '/DataBase Test/Projects/'.$foldername. $resdata['Name'];
                    $url = $this->getUrl("GetFolderByServerRelativeUrl('".$this->basePath.$folderfiles."')/Files");
       
                    $res =  Http::withHeaders([
                        'Authorization' =>  'Bearer '.$token,
                        'Content-Type' => 'octet-stream',
                        'Accept'=> 'application/json;odata=verbose'
                    ])->get( $url );
                    $responsefileJson = $res->getBody()->getContents();
                    $responsefileData = json_decode($responsefileJson, true);
                    foreach($responsefileData as $resfile){
                        $resfilecollection = $resfile['results'];
                       
                        foreach($resfilecollection as $resfiledata){
                            $items[] = array('name' => $resfiledata['Name'],
                            'isDirectory' => false);
                        }
                    }
                }
                $data[] = array('name' => $resdata['Name'],
                'isDirectory' => ($resdata['ItemCount'] != 0 ? true : false),
                'items'         =>  $items, ); 
            }
        }
        $result = $data;
        return $result;
    }

    public function getUrl($route, $options = [])
    {
        return Config::get('services.sharepoint.site_url').'/_api/web/'.$route;
    }
}
