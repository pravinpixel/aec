<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Interfaces\CustomerEnquiryRepositoryInterface;
use App\Interfaces\ServiceRepositoryInterface;
use App\Models\Config;
use App\Services\GlobalService;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
 
    protected $customerEnquiryRepo;
    protected $serviceRepo;

    public function __construct(
        CustomerEnquiryRepositoryInterface $customerEnquiryRepository, 
        ServiceRepositoryInterface $serviceRepo
    ){
        $this->customerEnquiryRepo = $customerEnquiryRepository;
        $this->serviceRepo = $serviceRepo;
    }

    public function index() 
    {
        return view('customers.pages.my-enquiries');
    }

    public function create() 
    {
        $customer = $this->customerEnquiryRepo->getCustomerEnquiry(Customer()->id);
        return view('customers.pages.create-enquiries',compact('customer'));
    }

    public function show() 
    {
        return view('customers.pages.enquiry-single-view');
    }

    public function store(Request $request)
    {
        $type = $request->input('type');
        $data = $request->input('data');
        $customer = $this->customerEnquiryRepo->getCustomerEnquiry(Customer()->id);
        $customerEnquiryNumber =  $customer->reference_enquiry_no;
        if($type == 'project_info') {
            $enquiry = ['enquiry_date' => now()];
            $array_merge = array_merge($data, $enquiry);
            return $this->customerEnquiryRepo->createCustomerEnquiryProjectInfo($customerEnquiryNumber, $customer, $array_merge);
        } else if($type == 'services') {
            $services = $this->serviceRepo->find($data)->pluck('id');
            $enquiry = $this->customerEnquiryRepo->getEnquiryByEnquiryNo($customerEnquiryNumber);
            return $this->customerEnquiryRepo->createCustomerEnquiryServices($enquiry,$services);
        }
    }

    public function getEnquiry($id)
    {
        $enquiry = $this->customerEnquiryRepo->getEnquiry($id);
        $result['project_info'] = $this->formatProjectInfo($enquiry);
        $result['services'] =  $enquiry->services()->pluck('id');
        return $result;
    }


    public function formatProjectInfo($enquiry) 
    {
        return [
            'secondary_mobile_no'  => $enquiry->secondary_mobile_no,
            'project_name'         => $enquiry->project_name,
            'zipcode'              => $enquiry->zipcode,
            'state'                => $enquiry->state,
            'building_type_id'     => $enquiry->building_type_id,
            'project_type_id'      => $enquiry->project_type_id,
            'project_date'         => $enquiry->project_date,
            'site_address'         => $enquiry->site_address,
            'place'                => $enquiry->place,
            'country'              => $enquiry->country,
            'no_of_building'       => $enquiry->no_of_building,
            'delivery_type_id'     => $enquiry->delivery_type_id,
            'project_delivery_date'=> $enquiry->project_delivery_date
        ];
    }

    public function edit($id)
    {
        $customer = $this->customerEnquiryRepo->getCustomerEnquiry(Customer()->id);
        return view('customers.pages.edit-enquiries',compact('customer','id'));
    }


    public function update($id, Request $request)
    {
        $type = $request->input('type');
        $data = $request->input('data');
        $customer = $this->customerEnquiryRepo->getCustomerEnquiry(Customer()->id);
        $enquiry = $this->customerEnquiryRepo->getEnquiry($id);
        if($type == 'project_info') {
            return $this->customerEnquiryRepo->updateEnquriry($enquiry, $customer, $data);
        } else if($type == 'services') {
            $services = $this->serviceRepo->find($data)->pluck('id');
            // $enquiry = $this->customerEnquiryRepo->getEnquiryByEnquiryNo($customerEnquiryNumber);
            // return $this->customerEnquiryRepo->createCustomerEnquiryServices($enquiry,$services);
        }
    }
}
