<?php

namespace App\Http\Controllers\Autodesk;

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

class AutodeskForgeController extends Controller
{
    private $twoLeggedAuthInternal = null;
    private $twoLeggedAuthPublic   = null;
	
    public function __construct(){
        set_time_limit(0);
        Configuration::getDefaultConfiguration()
			->setClientId('JVcKHNFTUTVmpLenJWwU3RMsmtDaqmq2')
			->setClientSecret("ZJQ2aCG5xRrwZMXx");
            // ->setClientId("AA9tRkeDQP9TmvPPtUG540plagL9XKCH")
            // ->setClientSecret("zyUTW5b1ITHYYSfc");
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
            $twoLeggedAuthPublic->setScopes(AutodeskForgeController::getScopePublic());
            $twoLeggedAuthPublic->fetchToken();
            $_SESSION['AccessTokenPublic'] = $twoLeggedAuthPublic->getAccessToken();
            $_SESSION['ExpiresInPublic']   = $twoLeggedAuthPublic->getExpiresIn();
            $_SESSION['ExpiresTime']       = time() + $_SESSION['ExpiresInPublic'];
        }
        return array(
            'access_token'  => $_SESSION['AccessTokenPublic'],
            'expires_in'    => $_SESSION['ExpiresInPublic'],
        );
    }

    public function getTokenInternal(){
        $twoLeggedAuthInternal = new TwoLeggedAuth();
        $twoLeggedAuthInternal->setScopes(AutodeskForgeController::getScopeInternal());

        if(!isset($_SESSION['AccessTokenInternal']) || $_SESSION['ExpiresTime']< time() ){
            $twoLeggedAuthInternal->fetchToken();
            $_SESSION['AccessTokenInternal'] =  $twoLeggedAuthInternal->getAccessToken();
            $_SESSION['ExpiresInInternal']   =    $twoLeggedAuthInternal->getExpiresIn();
            $_SESSION['ExpiresTime']         = time() + $_SESSION['ExpiresInInternal'];
        }

        $twoLeggedAuthInternal->setAccessToken($_SESSION['AccessTokenInternal']);
        return $twoLeggedAuthInternal;  
		
    }
	
	public function getBuckets()
	{
		$accessToken = $this->getTokenInternal();
		
		$apiInstance = new BucketsApi($accessToken);
		 $result = $apiInstance->getBuckets();
		 $resultArray = json_decode($result, true);
		 $buckets = $resultArray['items'];
		 $bucketsLength = count($buckets);
		 $bucketlist = array();
		 $s1 = "";
		 for($i=0; $i< $bucketsLength; $i++){
			 $cbkey = $buckets[$i]['bucketKey'];
			 $s1 = $s1 . $buckets[$i]['bucketKey'] . " ! ";
			 $exploded = explode('_', $cbkey);
			 //$cbtext = ForgeConfig::$prepend_bucketkey&&strpos($cbkey, strtolower(ForgeConfig::getForgeID())) === 0? end($exploded):$cbkey;
			 $bucketInfo = array('id'=>$cbkey,
								 'text'=> $cbkey,
								 'type'=>'bucket',
								 'children'=>true
			 );
			 array_push($bucketlist, $bucketInfo);
		 }
		 return $s1;//json_encode($bucketlist);
	}
	
	public function uploadfile(Request $request){
		  global $twoLeggedAuth;
		 $accessToken = $this->getTokenInternal();
		
		$apiInstance = new ObjectsApi($accessToken);
		
		 $body = $_POST;
          $file = $_FILES;
		  
		  
          $fileToUpload    = $file['file'];
          $filePath = $fileToUpload['tmp_name'];
          $content_length = filesize($filePath);
          $file_content = file_get_contents($filePath);
		  
		  
		 $bucket_key = $request->input('bucketname');
		 $enquirycode = $request->input('enquirycode');
		 
		 $newFileName =  $enquirycode . "_" .  $fileToUpload['name'];
		 
		  try {

			 $result = $apiInstance->uploadObject($bucket_key,$newFileName, $content_length, $file_content);
			  return $newFileName;
		  } catch (Exception $e) {
			  return "Failed. File not uploaded";
			  //echo 'Exception when calling ObjectsApi->uploadObject: ', $e->getMessage(), PHP_EOL;
		  }
    }
	
	public function getmodelfilelist(Request $request)
	{
		$accessToken = $this->getTokenInternal();
		
		$apiInstance = new ObjectsApi($accessToken);
		
		 $bucket_key = $request->input('bucketname');
		 $result = $apiInstance->getObjects($bucket_key);
		 $resultArray = json_decode($result, true);
		 $objects = $resultArray['items'];

		 $objectsLength = count($objects);
		 $objectlist = array();
		 $objid = "";
		 for($i=0; $i< $objectsLength; $i++){
			 if ($i==0) $objid = base64_encode($objects[$i]['objectId']);
			 $objectInfo = array('id'=>base64_encode($objects[$i]['objectId']),
								 'text'=>$objects[$i]['objectKey'],
								 'type'=>'object',
								 'children'=>false
			 );
			 array_push($objectlist, $objectInfo);
		 }
		 
		 return $objectlist;
		 
		 /*$urn=$objid;
		 
		 $accessToken1 = $this->getTokenPublic()["access_token"];

		 //return view('forge',compact('accessToken1','urn'));
		 return array(
            'access_token'  => $accessToken1,
            'urn'    => $urn,
        );*/
				 
		
	}
	
	public function viewmodel(Request $request)
	{
		$accessToken = $this->getTokenInternal();
		
		$apiInstance = new ObjectsApi($accessToken);
		 $bucket_key = $request->input('bucketname');
		  $fname = $request->input('fname');
		 
		 $result = $apiInstance->getObjects($bucket_key);
		 $resultArray = json_decode($result, true);
		 $objects = $resultArray['items'];
		// dd( $objects);
		 $objectsLength = count($objects);
		 $objectlist = array();
		
		 for($i=0; $i< $objectsLength; $i++){
			 if ($fname==$objects[$i]['objectKey'])
			 {$objid = base64_encode($objects[$i]['objectId']); }
				
		 }
		 
		 
		 $urn=$objid;
		 
		 $accessToken1 = $this->getTokenPublic()["access_token"];
		 return view('forge',compact('accessToken1','urn'));
		
	}
	
	public function checkBucketExists($bucketname)
	{
		$accessToken = $this->getTokenInternal();
		
		$apiInstance = new BucketsApi($accessToken);
	
		try 
		{
			 $result = $apiInstance->getBuckets();
			 $resultArray = json_decode($result, true);
			 $buckets = $resultArray['items'];
			 $bucketsLength = count($buckets);
			 
			 for($i=0; $i< $bucketsLength; $i++){
				 if ($buckets[$i]['bucketKey']==$bucketname)
				 {
					 return true;
				 }
				
				 
			 }
		 
		}
		catch (Exception $e) {
			
		}
		
		return false;
		
	}
	
	public function createBucket(Request $request)
	{
		$accessToken = $this->getTokenInternal();
		$bucketKey = $request->input('bucketname');
		
		if ($this->checkBucketExists($bucketKey))
		{
			return "Bucket exists";
		}
		
		$accessToken = $this->getTokenInternal();
		$apiInstance = new BucketsApi($accessToken);
		
		$policeKey = "transient";
		
        $apiInstance = new BucketsApi($accessToken);
        $post_bucket = new PostBucketsPayload();
        $post_bucket->setBucketKey($bucketKey);
        $post_bucket->setPolicyKey($policeKey);
		
        try {
            $result = $apiInstance->createBucket($post_bucket);
            return "1";
			//$result;
        } catch (Exception $e) {
			return "0";
           // return 'Exception when calling BucketsApi->createBucket: ' .$e->getMessage();
        }
		
	}
	
	public function deletebucket(Request $request)
	{
		$bucketKey = $request->input('bucketname');
		
		$accessToken = $this->getTokenInternal();
		$apiInstance = new BucketsApi($accessToken);
		
        try {
            $apiInstance->deleteBucket($bucketKey);
            return "1";
			//$result;
        } catch (Exception $e) {
			return "0";
           // return 'Exception when calling BucketsApi->createBucket: ' .$e->getMessage();
        }
		
	}
	
	 public function translateFile(Request $request){
        
        $accessToken = $this->getTokenInternal();
		
		$apiInstance = new ObjectsApi($accessToken);
		 $bucket_key = $request->input('bucketname');
		  $fname = $request->input('filename');
		 
		 $result = $apiInstance->getObjects($bucket_key);
		 $resultArray = json_decode($result, true);
		 $objects = $resultArray['items'];

		 $objectsLength = count($objects);
		 $objectlist = array();
		
		 for($i=0; $i< $objectsLength; $i++){
			 if ($fname==$objects[$i]['objectKey'])
			 {$objid = base64_encode($objects[$i]['objectId']); }
				
		 }
		 
        $objectId = $objid;

        $apiInstance = new DerivativesApi($accessToken);
        $job         = new JobPayload(); 

        $jobInput    = new JobPayloadInput();
        $jobInput->setUrn($objectId);

        $jobOutputItem = new JobPayloadItem();
        $jobOutputItem->setType('svf');
        $jobOutputItem->setViews(array('2d','3d'));
        
        $jobOutput   = new JobPayloadOutput();
        $jobOutput->setFormats(array($jobOutputItem));

        $job->setInput($jobInput);
        $job->setOutput($jobOutput);

        $x_ads_force = false; 
        try {
            $result = $apiInstance->translate($job, $x_ads_force);
            return $result;
        } catch (Exception $e) {
            return "error";
        }
    }
	
	public function view()
	{
		$d1 = $this->getTokenPublic();
		return $d1;//view('forge',$d1);
	}

	public function test(Request $request)
	{
		return view('test');
	}
}
