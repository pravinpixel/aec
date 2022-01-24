<?php

namespace App\Http\Controllers\Admin\Enquiry;

use App\Http\Controllers\Controller;
use App\Models\CostEstimationDetail;
use App\Models\CostEstimationCalculation;
use App\Models\MasterCalculation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\Facades\DataTables;
use App\Models\BuildingComponent;
use App\Models\Type;

class  CostEstimateController extends Controller
{
    public function CostEstimateData()    {
        $data = CostEstimationDetail::select('cost_estimation_detail.*')->where('status','=','1')->orderBy('id', 'asc')->get()->toArray();
        $data['component']  = BuildingComponent::where('is_active','=','1')->get();
        $data['type']       = Type::where('is_active','=','1')->get()->toArray();
        return $data;
    }
    public function CostEstimateMasterValue(Request $request) {
       return MasterCalculation::where('component_id',$request->component_id)
                                        ->where('type_id',$request->type_id)
                                        ->first(); 
    }
}
