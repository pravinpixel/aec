<?php

namespace App\Http\Controllers\Admin\Enquiry;

use App\Http\Controllers\Controller;
use App\Interfaces\ProjectRepositoryInterface;
use App\Jobs\SharepointFileCreation;
use App\Jobs\SharePointFolderCreation;
use App\Repositories\CustomerEnquiryRepository;
use App\Repositories\DocumentTypeEnquiryRepository;
use App\Services\GlobalService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CustomerResponseController extends Controller
{
    protected $projectRepo;
    protected $enquiryRepo;
    protected $documentTypeEnquiryRepo;

    public function __construct(
        ProjectRepositoryInterface $projectRepo,
        CustomerEnquiryRepository $enquiryRepo,
        DocumentTypeEnquiryRepository $documentRepo
    ){
        $this->projectRepo  = $projectRepo;
        $this->enquiryRepo  = $enquiryRepo;
        $this->documentTypeEnquiryRepo = $documentRepo;
    }

    public function moveToProject(Request $request)
    {
        $enquiry_id = $request->input('enquiry_id');
        $assigned_to = $request->input('assigned_to');
        $is_admin_approved = $request->input('is_admin_approved', false);
        $enquiry = $this->enquiryRepo->getEnquiryByID($enquiry_id);
        if($enquiry->project()->exists()){
            return response(['status' => false, 'msg' => __('global.already_moved_to_project')]);
        }
        $project_assign = [
            'assign_by'  => Admin()->id,
            'assign_to'  => $assigned_to ?? Admin()->id
        ];
        $res = $this->projectRepo->assignProjectToUser($enquiry_id, $project_assign);
        if($res == true){
            if($is_admin_approved) {
                $this->enquiryRepo->manualApproveFromAdmin($enquiry_id);
            }
            $enquiry_data = $this->getDataFromEnquiry($enquiry);
            $additional_data = [
                'reference_number' => GlobalService::getProjectNumber(),
                'is_new_project' => 1
            ];
            $result = $this->projectRepo->create($enquiry_id, array_merge($enquiry_data, $additional_data));
            $this->enquiryRepo->updateEnquiry($enquiry_id, ['project_id' => $result->id, 'project_assign_to' => $assigned_to ?? Admin()->id]);
            $costEstimate = $this->enquiryRepo->getCostEstimateByEnquiryId($enquiry_id);
            $this->projectRepo->storeInvoicePlan($result->id, ['project_cost' => $costEstimate->total_cost], false);
            if($res) {
                GlobalService::updateConfig('PRO');
                return response(['status' => true, 'msg' => __('global.move_to_project_successfully'), 'data' => []]);
            }
            return response(['status' => false, 'msg' => __('global.something')]);
        }
    }

    public function assignToProject(Request $request)
    {
        $enquiry_id = $request->input('enquiry_id');
        $assigned_to = $request->input('assigned_to');
        $enquiry = $this->enquiryRepo->getEnquiryByID($enquiry_id);
        $enquiry->project_assign_to = $assigned_to ?? null;
        if($enquiry->save()) {
            return response(['status' => true, 'msg' => __('global.assign_project_successfully'), 'data' => []]);
        }
        return response(['status' => false, 'msg' => __('global.something')]);
    }

    public function createSharepointFolder($project)
    { 
        try {
            $result = $this->projectRepo->createSharepointFolder($project->id);
            if($result != false) {
                $reference_number = str_replace('/','-',$project->reference_number);
                foreach($result  as $path) {
                    $data = ['path' =>  GlobalService::getSharepointPath($reference_number, trim($path,'/'))];
                    $job = (new SharePointFolderCreation($data))->delay(config('global.job_delay'));
                    $this->dispatch($job);
                }
                return true;
            }
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            return false;
        }
    }

    public function createFile($enquiry_id, $project)
    {
        try {
            Log::info('create file job start');
            $reference_number = str_replace('/','-',$project->reference_number);
            $folderPath = GlobalService::getSharepointPath($reference_number,'Custom Input');
            $ifcDocuments = $this->documentTypeEnquiryRepo->getDocumentByEnquiryId($enquiry_id);
            $buildingDocuments = $this->documentTypeEnquiryRepo->geBuildingDocumentByEnquiryId($enquiry_id);
            if(!empty($ifcDocuments)) {
                foreach($ifcDocuments as $ifcDocument) {
                    $filePath = asset('public/uploads/'.$ifcDocument->file_name);
                    $job = (new SharepointFileCreation($folderPath ,$filePath, $ifcDocument->client_file_name))->delay(config('global.job_delay'));
                    $this->dispatch($job);
                }
            }
            if(!empty($buildingDocuments )) {
                foreach($buildingDocuments as $buildingDocument) {
                    $filePath = asset('public/uploads/'.$buildingDocument->file_path);
                    $job = (new SharepointFileCreation($folderPath ,$filePath, $buildingDocument->file_name))->delay(config('global.job_delay'));
                    $this->dispatch($job);
                }
            }
            
            Log::info('create file job end');
            return true;
        }  catch (Exception $ex) {
            Log::error($ex->getMessage());
            return false;
        }
    }

    public function getDataFromEnquiry($enquiry)
    {
        return  [
            'customer_id'      => $enquiry->customer_id,
            'project_type_id'  => $enquiry->project_type_id,
            'project_type_id'  => $enquiry->project_type_id,
            'building_type_id' => $enquiry->building_type_id,
            'delivery_type_id' => $enquiry->delivery_type_id,
            'project_name'     => $enquiry->project_name,
            'email'            => $enquiry->customer->email,
            'no_of_building'   => $enquiry->no_of_building,
            'site_address'     => $enquiry->site_address,
            'city'             => $enquiry->place,
            'state'            => $enquiry->state,
            'zipcode'          => $enquiry->zipcode,
            'country'          => $enquiry->country,
            'mobile_number'    => $enquiry->mobile_no,
            'contact_person'   => $enquiry->contact_person,
            'company_name'     => $enquiry->customer->company_name,
            'start_date'       => $enquiry->project_date,
            'delivery_date'    => $enquiry->project_delivery_date,
            'status'           => 'In-Progress'
        ];
    }

}
