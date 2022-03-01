<?php

namespace App\Http\Controllers\Autodesk;

use App\Http\Controllers\Controller;
use App\Interfaces\AutoDeskRepositoryInterface;
use App\Models\DocumentTypeEnquiry;
use App\Models\Enquiry;
use App\Services\GlobalService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laracasts\Flash\Flash;

class AutodeskForgeController extends Controller
{
    private $twoLeggedAuthInternal = null;
    private $twoLeggedAuthPublic   = null;
	protected $autoDesk;
	protected $uploadFileType = [];
    public function __construct(AutoDeskRepositoryInterface $autoDesk){
		$this->autoDesk = $autoDesk;
		$this->getFileType();
    } 

	public function getFileType()
	{
		$this->uploadFileType = config('global.autodesk_upload_file_type');
	}
	
	public function uploadfile($fileName, $enquiry, Request $request)
	{
		$extension  =   $request->file('file')->getClientOriginalExtension();
		if(!in_array($extension, $this->uploadFileType)){
			return false;
		}
		$fileName = GlobalService::getBucketFilename($fileName).'.'.$extension;
		$buketFormaedtName = GlobalService::bucketStructureFormat($enquiry->customer_enquiry_number);
		$bucketName = $this->checkBucketExists($buketFormaedtName);
		$additionalData = ['enquiry' => $enquiry,
							'bucketName' => $bucketName,
							'fileName'   => $fileName];
		$request->merge($additionalData);
		$fileName = $this->autoDesk->uploadFile($request);
		if($fileName != false){
			Log::info("file upload successfully {$fileName}");
		}
		return false;
    }
	
	public function getModelFilelist(Request $request)
	{
		$this->autoDesk->getModelFilelist($request);
	}
	
	public function viewModel($id)
	{
		try{
			$documentTypeEnquiry = DocumentTypeEnquiry::find($id);
			$enquiry             = Enquiry::find($documentTypeEnquiry->enquiry_id);
			$fname               = GlobalService::getBucketFilename($documentTypeEnquiry->file_name);
			$bucketName          = GlobalService::bucketStructureFormat($enquiry->customer_enquiry_number);
			$fname               = $fname.'.'.$documentTypeEnquiry->file_type ?? '';
			$result 			 = $this->autoDesk->viewModel($bucketName, $fname);
			if(count($result)  == 3){
				list($status,  $progress, $type) =	$result;
				Flash::error(__("Translation process {$status} {$progress}"));
				return redirect()->back();
			}
			list($urn, $accessToken1) = $result;
			return view('forge',compact('accessToken1','urn'));
		} catch(Exception $ex){
			Log::error($ex->getMessage());
			Flash::error(__('global.something'));
			return redirect()->back();
		}
	}
	
	public function checkBucketExists($bucketName)
	{
		$status = $this->autoDesk->checkBucketExists($bucketName);
		if($status == true){
			Log::info('bucket name already exists - process from upload file');
			return $bucketName;
		}
		return $this->createBucket($bucketName);
	}
	
	public function createBucket($bucketName)
	{
		$status = $this->autoDesk->createBucket($bucketName);
		if($status == true) {
			return $bucketName; 
			Log::info("New bucket created");
		}
		Log::info("Issue in bucket creation");
		return false;
	}

	public function getCustomerBucketName()
	{
		
	}
}
