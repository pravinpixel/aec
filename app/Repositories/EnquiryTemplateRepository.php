<?php

namespace App\Repositories;

use App\Interfaces\EnquiryTemplateRepositoryInterface;
use App\Models\CustomerEnquiryTemplate;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class EnquiryTemplateRepository implements EnquiryTemplateRepositoryInterface {
    protected $model;

    public function __construct(CustomerEnquiryTemplate $customerEnquiryTemplate)
    {
        $this->model = $customerEnquiryTemplate;
    }

    public function store($data)
    {
        $template = new $this->model();
        $template->template_name = $data['template_name'];
        $template->building_component_id = $data['building_component_id'];
        $template->template = json_encode($data['data']);
        $template->customer_id = Customer()->id;
        $template->save();
    }
    
    public function show($id)
    {
        return $this->model->find($id);
    }

    public function isTemplateExists($request){
        return $this->model->where([
            'template_name'         => $request->template_name,
            'building_component_id' => $request->building_component_id,
            'customer_id'           => Customer()->id
        ])->first();
    }

    public function getTemplateByBuildingComponentId($id)
    {
        return $this->model->where([
            'building_component_id' => $id,
            'customer_id' => Customer()->id
        ])->get();
    }

}