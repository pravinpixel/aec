<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CostEstimationDetail;
use App\Models\CostEstimationCalculation;
use App\Models\MasterCalculation;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\Facades\DataTables;
use App\Models\BuildingComponent;
use App\Models\Type;
use App\Http\Requests\ComponentCreateRequest;
use App\Http\Requests\ComponentUpdateRequest;

use App\Http\Requests\TypeCreateRequest;
use App\Http\Requests\TypeUpdateRequest;

use function PHPSTORM_META\type;

class CostEstimationController extends Controller
{


    public function cost_estimation_single_view()
    {
       $data = CostEstimationDetail::select('cost_estimation_detail.*')->where('status','=','1')->orderBy('id', 'asc')->get()->toArray();
      $data['component'] = BuildingComponent::where('is_active','=','1')->get();
      $data['type'] = Type::where('is_active','=','1')->get()->toArray();
   
       return view('admin.pages.admin-cost-estimation-single-view',compact('data'));
        // return view('admin.pages.abc',compact('data'));

    }
    public function masterCalculation(Request $request)
    {
       
        // return $request->type_id;
        if($request->component_id && $request->type_id)
        {
           
            $total_price = 0;
            $total_sum = 0;
            $data = MasterCalculation::where('component_id',$request->component_id)->where('type_id',$request->type_id)->where('status','=',1)->first();
            if(!empty($data))
            {
                $data= $data->toArray();
                
           $detail_price_sum = (int)$data['detail_price'] ;
           $statistic_price_sum = (int)$data['statistic_price'];
           $cad_cam_price_sum = (int)$data['cad_cam_price'];
           $logistic_price_sum = (int)$data['logistic_price'];

           
         $detail_sum_sum =  (int)$data['detail_sum'];
         $statistic_sum_sum  = (int)$data['statistic_sum'];
         $cad_cam_sum_sum =  (int)$data['cad_cam_sum'] ;
         $logistic_sum_sum =  (int)$data['logistic_sum'] ;

            $data['detail_price_sum'] =  $detail_price_sum;
            $data['statistic_price_sum'] =  $statistic_price_sum;
            $data['cad_cam_price_sum'] =  $cad_cam_price_sum;
            $data['logistic_price_sum'] =  $logistic_price_sum;

            } else {
                            

          $detail_price_sum = 0;
           $statistic_price_sum = 0;
           $cad_cam_price_sum = 0;
           $logistic_price_sum = 0;

           
            $detail_sum_sum =  0 ;
            $statistic_sum_sum  = 0;
            $cad_cam_sum_sum =  0  ;
            $logistic_sum_sum = 0 ;

            $data['detail_price_sum'] =  0;
            $data['statistic_price_sum'] =  0;
            $data['cad_cam_price_sum'] =  0;
            $data['logistic_price_sum'] =  0;
        
            } 
            $total_sum1 = $detail_price_sum + $statistic_price_sum + $cad_cam_price_sum + $logistic_price_sum;
            $total_price =   $detail_price_sum +  $statistic_price_sum + $cad_cam_price_sum +  $logistic_price_sum;
            $total_sum =  $detail_sum_sum +  $statistic_sum_sum +  $cad_cam_sum_sum +  $logistic_sum_sum ;

            $data['total_sum1'] =   $total_price;
            $data['total_price'] =   $total_price;
            $data['total_sum'] =   $total_sum;
            return response(['status' => true, 'data' => $data ,'msg' => trans('Employee Created')], Response::HTTP_OK);
        }
    }
    public function getEstimate(Request $request)
    {
      
        if ($request->ajax()) {
            $model = CostEstimationDetail::where('status','=','1');

            return DataTables::eloquent($model)
          
                ->addColumn('action', function($model){
                    $actionBtn = '<a class="edit edit_data btn btn-primary btn-sm" data-cost-estimate-id="'.$model->id.'" ><i class="fa fa-edit"></i></a> <a class="delete delete_data btn btn-outline-danger btn-sm" data-cost-estimate-id="'.$model->id.'" ><i class="fa fa-trash"></i></a>';
                     
                    return $actionBtn;
                })
                ->toJson();
            
        }
    }
    public function costEstimationSingleForm(Request $request)
    {
        // print_r($request->all());die();
        if($request->key)
        {
           
            $data =CostEstimationDetail::where('id',$request->key)->first();
            
            if($data)
            {

                $data->contact = $request['contact'];
                $data->date = $request['enquiry_date'];
                $data->complexity_val = $request['complexity_val'];
                $data->complexity_total = $request['complexity_total'];
                $data->status = 1;
                $data->save();

                if( count($request->addmore ) > 0){
                    foreach($request->addmore as  $row ) {
                       

                        
                    $calcData = [
                        'Component' => $row['component'],
                        'type' => $row['type'],
                        'sqm' => $row['sqm'],
                        'complexity' => $row['complexity'],
                        'detail_price' => $row['detail_price'],
                        'detail_sum' => $row['detail_sum'],
                        'statistic_price' => $row['statistic_price'],
                        'statistic_sum' => $row['statistic_sum'],
                        'cad_cam_price' => $row['cad_cam_price'],
                        'cad_cam_sum' => $row['cad_cam_sum'],
                        'logistic_price' => $row['logistic_price'],
                        'logistic_sum' => $row['logistic_sum'],
                        'total_price' => $row['total_price'],
                        'total_sum' => $row['total_sum'],
                        'status' => 1,
                    ];
                    if(empty($row['test'])) {
                        $res = $data->CostEstimationCalculations()->create($calcData);

                    } else {
                        $res = $data->CostEstimationCalculations()->updateOrCreate([
                            'id' =>  $row['test']
                        ],$calcData);
                    }
                
                
                    }
                }
            }
            // return redirect()->route('cost-estimation-single-view');
            return response(['status' => true, 'msg' => trans('module.updated')], Response::HTTP_OK);

        }
        else
        {
            $coustEstimate =new CostEstimationDetail;
                $coustEstimate->contact = $request['contact'];
                $coustEstimate->date = $request['enquiry_date'];
                $coustEstimate->complexity_val = $request['complexity_val'];
                $coustEstimate->complexity_total = $request['complexity_total'];
                
                $coustEstimate->status = 1;
                $coustEstimate->save();
            if( count($request->addmore ) > 0){
                        foreach($request->addmore as  $row ) {
                            
                          
                        $calcData = [
                            'Component' => $row['component'],
                            'type' => $row['type'],
                            'sqm' => $row['sqm'],
                            'complexity' => $row['complexity'],
                            'detail_price' => $row['detail_price'],
                            'detail_sum' => $row['detail_sum'],
                            'statistic_price' => $row['statistic_price'],
                            'statistic_sum' => $row['statistic_sum'],
                            'cad_cam_price' => $row['cad_cam_price'],
                            'cad_cam_sum' => $row['cad_cam_sum'],
                            'logistic_price' => $row['logistic_price'],
                            'logistic_sum' => $row['logistic_sum'],
                            'total_price' => $row['total_price'],
                            'total_sum' => $row['total_sum'],
                            'status' => 1,
                            
                        ];
                        $res = $coustEstimate->CostEstimationCalculations()->create($calcData);
                        
                      
                    
                }
                }
                return response(['status' => true, 'msg' => trans('module.inserted')], Response::HTTP_OK);
                // return redirect()->route('cost-estimation-single-view');
        }
        
       return back();
    }

    public function getMasterCalculation()
    {
        // print_r("s");die();
        $data['component'] = BuildingComponent::where('is_active','=','1')->get();
        $data['type'] = Type::where('is_active','=','1')->get();
        $arr=[];
	// print_r($data['type']);die();
        foreach($data['component'] as $key=>$comp)
        {
            // print_r($comp->id);die();
            $arr_type=[];
            foreach($data['type'] as $key1=>$type )
            {
                // $arr[$comp->id][$type];
                $arr_type[$type->id] = MasterCalculation::where('component_id',$comp['id'])->where('type_id',$type['id'])->where('status','=','1')->first() ?? 0;
                // array_push($arr['comp_id']['type_id'][],$val);
            }
            $arr[$comp->id]=$arr_type;
            // print_r($arr);die;
        }
        // dd($arr);
      return view('admin.pages.calculationView', compact('data','arr'));
      
    }
    public function costEstimationDelete(Request $id)
    {
      
        $data = CostEstimationDetail::find($id->id);
        if (empty($data)) {
            return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
        }
        $data->status = 0;
        $data->save();
        $data->delete();
        return response(['status' => true, 'msg' => trans('module.deleted')], Response::HTTP_OK);

    }
   public function colDelete(Request $request)
   {
    //    return $request->all();
       $data = MasterCalculation::find($request->delete_id);
        if (empty($data)) {
            return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
        }
        $data->detail_price = 0;
        $data->detail_sum = 0;
        $data->statistic_price = 0;
        $data->statistic_sum = 0;
        $data->cad_cam_price =0 ;
        $data->cad_cam_sum =0 ;
        $data->logistic_price =0 ;
        $data->logistic_sum = 0;
        
        $data->status = 2;
        $data->update();
        // $data->delete();
        return response(['status' => true, 'msg' => trans('module.deleted')], Response::HTTP_OK);
   }
    public function costMasterVal(Request $request)
    {
        if($request->value)
        {
           $model = MasterCalculation::where('component_id',$request->component_id)->where('type_id',$request->type_id)->first();
        if($model)
        {
            $model->{$request->field_name} = $request->value;
            $model->status = 1;
            $model->update();
           
        }else{
            $model = new MasterCalculation();
            $model->component_id = $request->component_id;
            $model->type_id = $request->type_id;
            $model->{$request->field_name} = $request->value;
            $model->status = 1;
            $model->save();
        }
        return "true";
        }
       
    }
    public function costEstimationEdit(Request $id)
    {
        
        $arr['detail'] = CostEstimationDetail::where('id',$id->id)->first()->toArray();
        $arr['calculation'] = CostEstimationCalculation::where('estimation_detail_id',$id->id)->where('status','=',1)->get()->toArray();
       

        // $arr['detail']
        $detail_price = 0;
        $detail_sum = 0;

        $statistic_price = 0;
        $statistic_sum = 0;

        $cad_cam_price = 0;
        $cad_cam_sum = 0;

        $logistic_price = 0;
        $logistic_sum = 0;

        $total_price = 0;
        $total_sum = 0;

        $sqm_total = 0;
        $complexity_sum = 0;
        
        foreach($arr['calculation'] as $key=>$val)
        {
            $detail_price += (int)$val['detail_price'];
            $detail_sum += (int)$val['detail_sum'];

            $statistic_price += (int)$val['statistic_price'];
            $statistic_sum += (int)$val['statistic_sum'];

            $cad_cam_price += (int)$val['cad_cam_price'];
            $cad_cam_sum += (int)$val['cad_cam_sum'];
            
            $logistic_price += (int)$val['logistic_price'];
            $logistic_sum += (int)$val['logistic_sum'];

            $total_price += (int)$val['total_price'];
            $total_sum += (int)$val['total_sum'];

            $sqm_total += (int)$val['sqm'];
            $complexity_sum += (int)$val['complexity'];
           
            
        }
        $arr['total_cost'] = $detail_price + $detail_sum + $statistic_price + $statistic_sum + $cad_cam_price + $cad_cam_sum + $logistic_price + $logistic_sum + $total_price + $total_sum;
        $arr['detail_price'] = $detail_price;
        $arr['detail_add'] = $detail_sum;

        $arr['statistic_price'] = $statistic_price;
        $arr['statistic_sum'] = $statistic_sum;

        $arr['cad_cam_price'] = $cad_cam_price;
        $arr['cad_cam_sum'] = $cad_cam_sum;

        $arr['logistic_price'] = $logistic_price;
        $arr['logistic_sum'] = $logistic_sum;

        $arr['total_price'] = $total_price;
        $arr['total_sum'] = $total_sum;

        $arr['sqm_total'] = $sqm_total;
        $arr['complexity_sum'] = $complexity_sum;

     
        // $total_price/
        // return 
        return response()->json(['data' => $arr]);

    }
    public function getComponent(Type $var = null)
    {
        $data = BuildingComponent::all();
        
        if( !empty( $data ) ) {
            return response(['status' => true, 'data' => $data], Response::HTTP_OK);
        } 
        return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
    }
    
    public function componentStatus($id)
    {
        $module = BuildingComponent::find($id);

        if( empty( $module ) ) {
            return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
        } 
        $module->is_active = !$module->is_active;
        $res = $module->save();

        if( $res ) {
            return response(['status' => true, 'msg' => trans('module.status_updated'),  'data' => $module], Response::HTTP_OK);
        }
        return response(['status' => false, 'msg' => trans('module.something')], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
    public function typeStatus($id)
    {
        $module = Type::find($id);

        if( empty( $module ) ) {
            return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
        } 
        $module->is_active = !$module->is_active;
        $res = $module->save();

        if( $res ) {
            return response(['status' => true, 'msg' => trans('module.status_updated'),  'data' => $module], Response::HTTP_OK);
        }
        return response(['status' => false, 'msg' => trans('module.something')], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
    
    public function deleteComponent($id)
    {
        
         $module = BuildingComponent::find($id);
        if (empty($module)) {
            return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
        }
        $module->is_active = 2;
        $module->save();
        $module->delete();
        return response(['status' => true, 'msg' => trans('module.deleted')], Response::HTTP_OK);
    }
  
    
    public function deleteRowData(Request $id)
    {
        // return $id->id."ds";
        $module = CostEstimationCalculation::find($id->id);
        if (empty($module)) {
            return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
        }
        $module->status = 2;
        $module->save();
        $module->delete();
        return response(['status' => true, 'msg' => trans('module.deleted')], Response::HTTP_OK);
    }
    
    public function addComponent(ComponentCreateRequest $request)
    {
      
        $module = new BuildingComponent;
        $insert = $request->only($module->getFillable());
     
      
        $res = BuildingComponent::create($insert);
        if($res) {
            return response(['status' => true, 'data' => $res ,'msg' => trans('module.inserted')], Response::HTTP_OK);
        }
        return response(['status' => false ,'msg' => trans('module.something')], Response::HTTP_INTERNAL_SERVER_ERROR );
    }
  
    
    public function editComponent($id)
    {
        $data = BuildingComponent::find($id);
        if( !empty( $data ) ) {
            return response(['status' => true, 'data' => $data], Response::HTTP_OK);
        } 
        return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
    }
 
    
    public function updateComponent( ComponentUpdateRequest $request,$id)
    {
        // return $id;
        
        $module = BuildingComponent::find($id);
        if( empty( $module ) ) {
            return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
        } 
        $res = $module->update($request->only($module->getFillable()));
        if( $res ) {
            return response(['status' => true, 'msg' => trans('module.updated'), 'data' => $module], Response::HTTP_OK);
        }
        return response(['status' => false, 'msg' => trans('module.something')], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
   
    
    
}
