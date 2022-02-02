<?php

namespace App\Repositories;

use App\Interfaces\DocumentaryRepositoryInterface;
use App\Models\Documentary\Documentary;
use App\Models\Enquiry;
use App\Models\Customer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Schema;
class DocumentaryRepository implements DocumentaryRepositoryInterface{
    protected $model;
    protected $enquiryModel;
    protected $customerModel;

    public function __construct(Documentary $documentary,Enquiry $enquiry,Customer $customer)
    {
        $this->model = $documentary;
        $this->enquiryModel = $enquiry;
        $this->customerModel = $customer;
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
    public function getEnquirie($request)
    {
        $data = Schema::getColumnListing('enquiries'); 
        return $data;
        // return $this->enquiryModel->where('is_active',1)->get();
    }
    public function getCustomers($request)
    {
        $data = Schema::getColumnListing('customers'); 
        return $data;
        // return $this->customerModel->where('is_active',1)->get();
    }
    
}