<?php

namespace App\Repositories;

use App\Interfaces\AutoDeskRepositoryInterface;
use App\Http\Controllers\Controller;
use Autodesk\Auth\Configuration;
use Autodesk\Auth\OAuth2\TwoLeggedAuth;
use Illuminate\Http\Request;
use Autodesk\Forge\Client\Api\BucketsApi;
use Autodesk\Forge\Client\Model\PostBucketsPayload;
use Autodesk\Forge\Client\Api\ObjectsApi;
use Autodesk\Forge\Client\Api\DerivativesApi;
use Autodesk\Forge\Client\Model\JobPayload;
use Autodesk\Forge\Client\Model\JobPayloadInput;
use Autodesk\Forge\Client\Model\JobPayloadOutput;
use Autodesk\Forge\Client\Model\JobPayloadItem;
use Exception;
use Illuminate\Support\Facades\Log;

class AutoDeskRepository implements AutoDeskRepositoryInterface{
    private $twoLeggedAuthInternal = null;
    private $twoLeggedAuthPublic   = null;

    public function __construct(){
        set_time_limit(0);
        Configuration:: getDefaultConfiguration()
			->setClientId(config('autodesk.client_id'))
			->setClientSecret(config('autodesk.client_secret'));
    } 
	
	 public static function getScopeInternal(){
      return ['bucket:create', 'bucket:read','bucket:update','bucket:delete', 'data:read', 'data:create', 'data:write'];
    }

    // Required scope of the token sent to the client
    public static function getScopePublic(){
      // Will update the scope to viewables:read when #13 of autodesk/forge-client is fixed
      return ['data:read'];
    }
	
	public function getTokenPublic(){     
        if(!isset($_SESSION['AccessTokenPublic']) || $_SESSION['ExpiresTime']< time() ){
            $twoLeggedAuthPublic = new TwoLeggedAuth();
            $twoLeggedAuthPublic->setScopes(AutoDeskRepository::getScopePublic());
            $twoLeggedAuthPublic->fetchToken();
            $_SESSION['AccessTokenPublic'] = $twoLeggedAuthPublic->getAccessToken();
            $_SESSION['ExpiresInPublic']   = $twoLeggedAuthPublic->getExpiresIn();
            $_SESSION['ExpiresTime']       = time() + $_SESSION['ExpiresInPublic'];
        }
        return array(
            'access_token' => $_SESSION['AccessTokenPublic'],
            'expires_in'   => $_SESSION['ExpiresInPublic'],
        );
    }

    public function getTokenInternal(){
        $twoLeggedAuthInternal = new TwoLeggedAuth();
        $twoLeggedAuthInternal->setScopes(AutoDeskRepository::getScopeInternal());
        if(!isset($_SESSION['AccessTokenInternal']) || $_SESSION['ExpiresTime']< time() ){
            $twoLeggedAuthInternal->fetchToken();
            $_SESSION['AccessTokenInternal'] = $twoLeggedAuthInternal->getAccessToken();
            $_SESSION['ExpiresInInternal']   = $twoLeggedAuthInternal->getExpiresIn();
            $_SESSION['ExpiresTime']         = time() + $_SESSION['ExpiresInInternal'];
        }
        $twoLeggedAuthInternal->setAccessToken($_SESSION['AccessTokenInternal']);
        return $twoLeggedAuthInternal;  
    }
	
	public function getBuckets()
	{
		$accessToken   = $this->getTokenInternal();
		$apiInstance   = new BucketsApi($accessToken);
		$result        = $apiInstance->getBuckets();
		$resultArray   = json_decode($result, true);
		$buckets       = $resultArray['items'];
		$bucketsLength = count($buckets);
		$bucketlist    = array();
		$s1            = "";
		 for($i=0; $i< $bucketsLength; $i++){
			 $cbkey    = $buckets[$i]['bucketKey'];
			 $s1       = $s1 . $buckets[$i]['bucketKey'] . " ! ";
			 $exploded = explode('_', $cbkey);
			 //$cbtext = ForgeConfig::$prepend_bucketkey&&strpos($cbkey, strtolower(ForgeConfig::getForgeID())) === 0? end($exploded):$cbkey;
			 $bucketInfo = array('id'=>$cbkey,
								 'text'     => $cbkey,
								 'type'     => 'bucket',
								 'children' => true
			 );
			 array_push($bucketlist, $bucketInfo);
		 }
		 return $s1;
	}
	
	public function uploadFile(Request $request){
		global $twoLeggedAuth;
		$accessToken    = $this->getTokenInternal();
		$apiInstance    = new ObjectsApi($accessToken);
		$body           = $_POST;
		$file           = $_FILES;
		$fileToUpload   = $file['file'];
		$filePath       = $fileToUpload['tmp_name'];
		$content_length = filesize($filePath);
		$handle         = fopen($filePath, "rb");
		$file_content   = fread($handle, $content_length);
		fclose($handle);
		$bucket_key  = $request->input('bucketName');
		$newFileName = $request->input('fileName');
		try {
			$result = $apiInstance->uploadObject($bucket_key,$newFileName, $content_length, $file_content);
			$this->translateFile($request);
			return $newFileName;
		} catch (Exception $e) {
			Log::error($e->getMessage());
			return false;
		}
    }
	
	public function getModelFilelist(Request $request)
	{
		$accessToken   = $this->getTokenInternal();
		$apiInstance   = new ObjectsApi($accessToken);
		$bucket_key    = $request->input('bucketname');
		$result        = $apiInstance->getObjects($bucket_key);
		$resultArray   = json_decode($result, true);
		$objects       = $resultArray['items'];
		$objectsLength = count($objects);
		$objectlist    = array();
		$objid         = "";
		for($i=0; $i< $objectsLength; $i++){
			if ($i==0) $objid = base64_encode($objects[$i]['objectId']);
			$objectInfo    = array('id'=>base64_encode($objects[$i]['objectId']),
								'text'     => $objects[$i]['objectKey'],
								'type'     => 'object',
								'children' => false
			);
			array_push($objectlist, $objectInfo);
		}
		return $objectlist;	
	}
	
	public function viewModel($bucketname, $fname)
	{
		
		$accessToken = $this->getTokenInternal();
		$apiInstance = new ObjectsApi($accessToken);
		$bucket_key  = $bucketname;
		$fname       = $fname;
		$result      = $apiInstance->getObjects($bucket_key);
		$resultArray = json_decode($result, true);
		$objects     = $resultArray['items'];

		$objectsLength = count($objects);
		$objectlist    = array();
		for($i=0; $i< $objectsLength; $i++){
			if ($fname==$objects[$i]['objectKey'])
			{$objid = base64_encode($objects[$i]['objectId']); }
			
		}
	
		$urn = $objid;
		$accessToken1 = $this->getTokenPublic()["access_token"];
		return [$urn, $accessToken1];
	}
	
	public function checkBucketExists($bucketname)
	{
		$accessToken = $this->getTokenInternal();
		$apiInstance = new BucketsApi($accessToken);
		try 
		{
			 $result        = $apiInstance->getBuckets();
			 $resultArray   = json_decode($result, true);
			 $buckets       = $resultArray['items'];
			 $bucketsLength = count($buckets);
			 for($i=0; $i< $bucketsLength; $i++){
				 if ($buckets[$i]['bucketKey']==$bucketname)
				 {
					 return true;
				 }
			 }
		}
		catch (Exception $e) {
			Log::error($e->getMessage());
			return false;
		}
		return false;
	}
	
	public function createBucket($bucketName)
	{
		$accessToken = $this->getTokenInternal();
		$bucketKey   = $bucketName;
		if ($this->checkBucketExists($bucketKey))
		{	Log::error("Bucket already exists {$bucketKey}");
			return false;
		}
		$accessToken = $this->getTokenInternal();
		$apiInstance = new BucketsApi($accessToken);
		$policeKey   = config('autodesk.public_key');
		$apiInstance = new BucketsApi($accessToken);
		$post_bucket = new PostBucketsPayload();
        $post_bucket->setBucketKey($bucketKey);
        $post_bucket->setPolicyKey($policeKey);
        // $post_bucket->setAllow('full');
        try {
            $result = $apiInstance->createBucket($post_bucket);
            return true;
        } catch (Exception $e) {
			Log::error($e->getMessage());
			return false;
        }
		
	}
	
	public function deleteBucket(Request $request)
	{
		$bucketKey = $request->input('bucketname');
		$accessToken = $this->getTokenInternal();
		$apiInstance = new BucketsApi($accessToken);
        try {
            $apiInstance->deleteBucket($bucketKey);
            return true;
        } catch (Exception $e) {
			return false;
        }
	}
	
	public function translateFile(Request $request){
        
        $accessToken = $this->getTokenInternal();
		$apiInstance = new ObjectsApi($accessToken);
		$bucket_key  = $request->input('bucketName');
		// $file         = $_FILES;
		$fname        = $request->input('fileName');
		$result       = $apiInstance->getObjects($bucket_key);
		$resultArray  = json_decode($result, true);
		$objects      = $resultArray['items'];
		$objectsLength = count($objects);
		 for($i=0; $i< $objectsLength; $i++){
			if ($fname==$objects[$i]['objectKey']){
				$objid = base64_encode($objects[$i]['objectId']); 
			}
		}
        $objectId = $objid;
        $apiInstance = new DerivativesApi($accessToken);
        $job         = new JobPayload();
        $jobInput = new JobPayloadInput();
        $jobInput->setUrn($objectId);
        $jobOutputItem = new JobPayloadItem();
        $jobOutputItem->setType('svf');
        $jobOutputItem->setViews(array('2d','3d'));
        $jobOutput = new JobPayloadOutput();
        $jobOutput->setFormats(array($jobOutputItem));
        $job->setInput($jobInput);
        $job->setOutput($jobOutput);
        $x_ads_force = false;
        try {
            $result = $apiInstance->translate($job, $x_ads_force);
            return $result;
        } catch (Exception $e) {
			Log::error($e->getMessage());
            return false;
        }
    }
	
	public function view()
	{
		$d1 = $this->getTokenPublic();
		return $d1;//view('forge',$d1);
	}
}