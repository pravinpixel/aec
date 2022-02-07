<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Interfaces\EnquiryTemplateRepositoryInterface;
use Illuminate\Http\Request;

class EnquiryTemplateController extends Controller
{
    protected $templateRepo;
    public function __construct(EnquiryTemplateRepositoryInterface $templateRepo)
    {
        $this->templateRepo = $templateRepo;
    }

    public function store(Request $request)
    {
        $result = $this->templateRepo->isTemplateExists($request);
        if(!empty($result)){
            return response(['status' => false, 'msg'=> __('enquiry.template_exists')]);
        }
        $template = $request->only(['template_name','building_component_id','data']);
        $this->templateRepo->store( $template);
        return response(['status' => true, 'msg'=> __('enquiry.template_added')]);
    }

    public function getTemplateByBuildingComponentId(Request $request)
    {
        $id = $request->input('building_component_id');
        return $this->templateRepo->getTemplateByBuildingComponentId($id);
    }

    public function show($id)
    {
        $result = $this->templateRepo->show($id);
        return $result->template ?? [];
    }

}
