<?php

namespace App\Repositories;


use App\Interfaces\MailTemplateRepositoryInterface;
use App\Models\Admin\MailTemplate;
use App\Models\Enquiry;
use App\Models\Customer;
use App\Models\User;
use App\Models\EnquiryCostEstimate;
use App\Models\Role;
use Auth;
use App\Models\Documentary\Documentary;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Html;

class MailTemplateRepository implements MailTemplateRepositoryInterface{
    
    protected $model;
    protected $documentary;

    public function __construct(MailTemplate $mailTemplate,Documentary $documentary)
    {
        $this->model = $mailTemplate;
        $this->documentary = $documentary;
        
    }
    public function all()
    {
        return $this->model->all();
    }
    public function create(array $data)
    {
    
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->model->where('id', $id)
            ->update($data);
    }
    public function delete($id)
    {
        $documentary = $this->model->find($id);
         $documentary->is_active=2;
         $documentary->save();
         return $documentary->delete();
    }

    public function status($id)
    {
        // return $this->model->find($id);
        // $module->is_active = !$module->is_active;
        if (null ==  $documentary = $this->model->find($id)) {
            throw new ModelNotFoundException("Status Not Updated");
        }
        $documentary->is_active =  !$documentary->is_active;
        $documentary->save();
        return  $documentary;
        
    }
    public function updateStatus($id)
    {

        if (null ==  $documentary = $this->model->find($id)) {
            throw new ModelNotFoundException("Status Not Updated");
        }
        $documentary->is_active =  !$documentary->is_active;
        $documentary->save();
        return  $documentary;
        
    }

    public function find($id)
    {
        if (null == $documentary = $this->model->find($id)) {
            throw new ModelNotFoundException("Building Component not found");
        }
        return $documentary;
    }

    public function get($request)
    {
        return $this->model->where('is_active',1)->get();
    }
    
    public function getDocumentaryData($request)
    {
        return $this->documentary->where('is_active',1)->get();
    }
    public function getDocumentaryOneData($request)
    {
        //  if(Auth::user()->id) {
        //     print_r(Auth::user()->id);die();
        // }
            $enquiry  =  Enquiry::where('id',$request->enquireId)->select('id','enquiry_date','enquiry_number',
            'contact_person','customer_id','service_id as serviceId','organization_number','building_type_id','delivery_type_id',
            'project_name', 'project_date', 'place', 'site_address as customer_address','country','zipcode','state','no_of_building','project_delivery_date','project_info','service',
            'ifc_model_upload','building_component','additional_info')->first()->toArray();
            $enquiry['offer_no'] = $enquiry['enquiry_number'];
            $enquiry['revision_no'] = "R1";
            
            $document =  Documentary::where('id',$request->documentId)->first();

            $customer =  Customer::where('id',$enquiry['customer_id'])
                    ->select('id','customer_enquiry_date as  customer_enquiry_date',
                    'first_name as customer_first_name',
                    'last_name as customer_last_name',
                    'full_name as customer_full_name',
                    'organization_no as customer_organization_no',
                    'city as customer_city',
                    'state as customer_state',
                    'country as customer_country',
                    'email',
                    'mobile_no',
                    'company_name',
                    'contact_person'
                )->first()->toArray();
            $enquiryCost = EnquiryCostEstimate::where('enquiry_id',$request->enquireId)->first();
            // print_r($enquiryCost['total_cost']);die();
           
            $loginUserData = Admin();
            $role = Role::where('id',$loginUserData['job_role'])->select('name')->first()->toArray();
            // print_r($role['name']);die();

            $countRow =  MailTemplate::where('enquiry_id',$request->enquireId)->where('documentary_id',$request->documentId)->count();

            $logo = Config::get('documentary.logo.key');
           
            $enquiryNum =  str_replace('/','_',$enquiry['enquiry_number']);
            $fileName   =  $enquiryNum.'_'.$document['documentary_title'].'_'.'R'.$countRow;
            
            $datas = array_merge($enquiry,$customer);  
            $datas['document_title']=$document['documentary_title'];
            $datas['role'] = $role['name'];
            $datas['admin_user'] =  $loginUserData['user_name'];
            $datas['project_cost'] = $enquiryCost['total_cost'];
            $datas['revision_no'] = "R0";
            $lo ='<img width="150px" src="'.asset($logo).'" alt="">';
            $logo_url = ['Logo'=>$lo];
            $datas = array_merge($datas,$logo_url);   
            $documentData =[];
            $changeData =[];
            $changeData = $datas;
            $documentData = $document['documentary_content'];
            $keyData       = array_map(function($item){
                return '{'.$item.'}';
            },array_keys($changeData));
            $valueData    = array_values($changeData);
            $new_string = str_replace($keyData, $valueData,strval($documentData));
            $today_date = date("d-m-Y");
            $new_string=  str_replace('today_date',$today_date,strval($new_string));
            $search = array('{','}');
            $newDocumentData = str_replace($search,"",$new_string);
            $document['documentary_content'] = $newDocumentData;
            $data = array(
                'enquiry'=>$enquiry,'document'=>$document,'customer'=>$customer,'fileName'=>$fileName
            );

        return ($data);
    }
    

    public function isProposalExists($enquiry_id, $documentary_id)
    {
        $data = $this->model->where(['enquiry_id' => $enquiry_id, 'documentary_id' => $documentary_id])->first();
        if(!empty($data)){
            return true;
        }
        return false;
    }
    
}