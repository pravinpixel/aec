<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CostEstimateTemplate as ModelsCostEstimateTemplate;
use Illuminate\Http\Request;

class CostEstimateTemplate extends Controller
{

    public function index()
    {
        $templates = ModelsCostEstimateTemplate::get();
        return response(['status' => true, 'data'=> $templates]);
    }

    public function getWoodTemplate()
    {
        $templates = ModelsCostEstimateTemplate::where('type', 'wood')->get();
        return response(['status' => true, 'data'=> $templates]);
    }

    public function getPrecastTemplate()
    {
        $templates = ModelsCostEstimateTemplate::where('type', 'precast')->get();
        return response(['status' => true, 'data'=> $templates]);
    }

    public function store(Request $request)
    {
        $data = [
            'json' => json_encode($request->input('data.template')),
         
        ];
        $template = ModelsCostEstimateTemplate::updateOrCreate([
            'name' => $request->input('data.name'),
            'type' => $request->input('data.type')
        ],$data);
        if($template) {
            return response(['status' => true, 'msg'=> __('global.template_added'), 'data'=> $template]);
        }
        return response(['status' => true, 'msg'=> __('global.something')]);
    }

    public function find($id)
    {
        $template = ModelsCostEstimateTemplate::findOrFail($id);
        return response(['status' => true, 'data'=> $template]);
    }

    public function update($id,Request $request)
    {
        $template = ModelsCostEstimateTemplate::findOrFail($id);
        $template->json = json_encode($request->input('template'));
        if($template->save()) {
            return response(['status' => true, 'msg'=> __('global.updated')]);
        }
        return response(['status' => false, 'msg'=> __('global.something')]);
    }

    public function destroy($id)
    {
        $template = ModelsCostEstimateTemplate::findOrFail($id);
        if($template->delete()) {
            return response(['status' => true,'msg' => __('global.deleted')]);
        }
        return response(['status' => false,'msg' => __('global.something')]);
    }

}
