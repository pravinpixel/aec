<?php

namespace App\Http\Controllers\Admin\Enquiry;

use App\Http\Controllers\Controller;
use App\Interfaces\ProjectRepositoryInterface;
use App\Repositories\CustomerEnquiryRepository;
use App\Services\GlobalService;
use Illuminate\Http\Request;

class CustomerResponseController extends Controller
{
    protected $projectRepo;
    protected $enquiryRepo;

    public function __construct(
        ProjectRepositoryInterface $projectRepo,
        CustomerEnquiryRepository $enquiryRepo
    ){
        $this->projectRepo = $projectRepo;
        $this->enquiryRepo = $enquiryRepo;
    }

    public function moveToProject(Request $request)
    {
        $enquiry_id = $request->input('enquiry_id');
        $assigned_to = $request->input('assigned_to');
        $enquiry = $this->enquiryRepo->getEnquiryByID($enquiry_id);
        if($enquiry->project()->exists()){
            return response(['status' => false, 'msg' => __('global.already_moved_to_project')]);
        }
        $project_assign = [
            'assign_by'  => Admin()->id,
            'assign_to'  => $assigned_to ?? Admin()->id
        ];
        $res = $this->projectRepo->assingProjectToUser($enquiry_id, $project_assign);
        if($res == true){
            $enquiry_data = $this->getDataFromEnquiey($enquiry);
            $additional_data = [
                'reference_number' => GlobalService::getProjectNumber()
            ];
            $result = $this->projectRepo->create($enquiry_id, array_merge($enquiry_data, $additional_data));
            $this->enquiryRepo->updateEnquiry($enquiry_id, ['project_id' => $result->id]);
            if($result) {
                GlobalService::updateConfig('PRO');
                return response(['status' => true, 'msg' => __('global.move_to_project_successfully'), 'data' => []]);
            }
            return response(['status' => false, 'msg' => __('global.something')]);
        }
    }

    public function getDataFromEnquiey($enquiry)
    {
        return  [
            'customer_id'      => $enquiry->customer_id,
            'project_type_id'  => $enquiry->project_type_id,
            'project_type_id'  => $enquiry->project_type_id,
            'building_type_id' => $enquiry->building_type_id,
            'delivery_type_id' => $enquiry->delivery_type_id,
            'project_name'     => $enquiry->project_name,
            'no_of_building'   => $enquiry->no_of_building,
            'site_address'     => $enquiry->site_address,
            'state'            => $enquiry->state,
            'email'            => $enquiry->email,
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
