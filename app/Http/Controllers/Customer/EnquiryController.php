<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Interfaces\CustomerEnquiryRepositoryInterface;
use App\Interfaces\ServiceRepositoryInterface;
use App\Models\Config;
use App\Services\GlobalService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

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
        Session::forget('enquiry_number');
        $customer['enquiry_date'] = now();
        $customer['enquiry_number'] = GlobalService::enquiryNumber();
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
        $customer = $this->customerEnquiryRepo->getCustomer(Customer()->id);
        if (Session::has('enquiry_number')){
            $enquiry_number = Session::get('enquiry_number');
            Log::info("Session already exists {$enquiry_number}");
        } else {
            Session::put('enquiry_number', GlobalService::enquiryNumber());
            GlobalService::updateConfig('ENQ');
            $enquiry_number = Session::get('enquiry_number');
            Log::info("New session created {$enquiry_number}");
        }
        if($type == 'project_info') {
            $array_merge = array_merge($data, ['enquiry_date' => Carbon::now()]);
            return $this->customerEnquiryRepo->createCustomerEnquiryProjectInfo($enquiry_number, $customer, $array_merge);
        } else if($type == 'services') {
            $services = $this->serviceRepo->find($data)->pluck('id');
            $enquiry = $this->customerEnquiryRepo->getEnquiryByEnquiryNo($enquiry_number);
            return $this->customerEnquiryRepo->createCustomerEnquiryServices($enquiry,$services);
        }
    }

    
    public function storeFiles(Request $req) {
        
        dd($req->all());
        
        $input      =   $request->all();
        $filenames  =   array();
        
        // if($file   =   $request->file('filenames')){
        //     foreach($file as $file){
                $name               =   $file->getClientOriginalName();
                $file               ->  move('image',$name);
                $filenames          =   $name; 
                $data               =   new File();
                $data['filenames']  =   'images'.'/'.$name;
                $data               ->  save();
        //     }
        // } 
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
            'company_name'         => $enquiry->company_name,
            'contact_person'       => $enquiry->contact_person,
            'mobile_no'            => $enquiry->mobile_no,
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
        $enquiry = $this->customerEnquiryRepo->getEnquiry($id);
        return view('customers.pages.edit-enquiries',compact('enquiry','id'));
    }


    public function update($id, Request $request)
    {
        $type = $request->input('type');
        $data = $request->input('data');
        $customer = $this->customerEnquiryRepo->getCustomer(Customer()->id);
        $enquiry = $this->customerEnquiryRepo->getEnquiry($id);
        if($type == 'project_info') {
            return $this->customerEnquiryRepo->updateEnquiry($id, $data);
        } else if($type == 'services') {
            $services = $this->serviceRepo->find($data)->pluck('id');
            return $this->customerEnquiryRepo->createCustomerEnquiryServices($enquiry,$services);
        }
    }
}
