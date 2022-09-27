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
        return $this->model::create([
            "template_name"         => $data['template_name'],
            "building_component_id" => $data['building_component_id'],
            "template"              => json_encode($data['data']),
            "customer_id"           => Customer()->id,
        ]);
    }
    
    public function show($id)
    {
        return $this->model->find($id);
    }

    public function update($id, $request)
    {
        $template = $this->model->find($id);
        $template->template = json_encode($request->input('template'));
        if($template->save()) {
            return response(['status' => true, 'msg'=> __('global.updated')]);
        }
        return response(['status' => false, 'msg'=> __('global.something')]);
    
    }

    public function destroy($id)
    {
        $template = $this->model->find($id);
        return $template->delete();
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