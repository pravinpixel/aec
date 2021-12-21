<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CostEstimationDetail;
use App\Models\CostEstimationCalculation;
use Illuminate\Http\Request;
use DataTables;
use Response;
class CostEstimationController extends Controller
{


    public function cost_estimation_single_view(Type $var = null)
    {
       $data = CostEstimationDetail::select('cost_estimation_detail.*')->where('status','=','1')->orderBy('id', 'asc')->get()->toArray();
        // print_r($data);die();
        return view('admin.pages.admin-cost-estimation-single-view',compact('data'));
        
    }
    public function getEstimate(Request $request)
    {
      
        if ($request->ajax()) {
            $model = CostEstimationDetail::where('status','=','1');

            return DataTables::eloquent($model)
            // $data = CostEstimationDetail::latest()->get();
            // return CostEstimationDetail::of($data)
            //     ->addIndexColumn()
            // href="'.route('admin.costEstimationEdit',$model->id).'"
                ->addColumn('action', function($model){
                    $actionBtn = '<a class="edit edit_data btn btn-primary btn-sm" data-cost-estimate-id="'.$model->id.'" >Edit</a> <a class="delete delete_data btn btn-primary btn-sm" data-cost-estimate-id="'.$model->id.'" >Delete</a>';
                    
                    // $actionBtn = $model->id;
                    return $actionBtn;
                })
                ->toJson();
            //     ->rawColumns(['action'])
            //     ->make(true);
        }
    }
    public function costEstimationSingleForm(Request $request)
    {
        // print_r("if");die();
        // return $request->key;
        if($request->key)
        {
            // print_r("if");die();
            // return count($request->addmore);
            $data =CostEstimationDetail::where('id',$request->key)->first();
            
            if($data)
            {
                $data->contact = $request['contact'];
                $data->date = $request['enquiry_date'];
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
                        'total_sum' => $row['total_sum']
                        
                    ];
                    if(empty($row['test'])) {
                        $res = $data->CostEstimationCalculations()->create($calcData);

                    } else {
                        $res = $data->CostEstimationCalculations()->updateOrCreate([
                            'id' =>  $row['test']
                        ],$calcData);
                    }

                
            
                    // $coustEstimate->CostEstimationCalculations()->create($request->calculation);
                    }
                }
            }
            return redirect()->route('cost-estimation-single-view');

        }
        else
        {
            // return "else";
            // print_r("else");die();
            $coustEstimate =new CostEstimationDetail;
                $coustEstimate->contact = $request['contact'];
                $coustEstimate->date = $request['enquiry_date'];
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
                            'total_sum' => $row['total_sum']
                            
                        ];
                        $res = $coustEstimate->CostEstimationCalculations()->create($calcData);
                
                        // $coustEstimate->CostEstimationCalculations()->create($request->calculation);
                    }
                }
                
                // return back();
                return redirect()->route('cost-estimation-single-view');
        }
        
       return back();
    }
    public function costEstimationDelete(Request $id)
    {
        // return $id->id;
        $data = CostEstimationDetail::find($id->id);
        $data->status = 0;
        $data->save();
        $data->delete();

    }

    public function costEstimationEdit(Request $id)
    {
        // return  $id->id;
        $arr['detail'] = CostEstimationDetail::where('id',$id->id)->first()->toArray();
        $arr['calculation'] = CostEstimationCalculation::where('estimation_detail_id',$id->id)->get()->toArray();
        // print_r($id);die();
        // $data = CostEstimationDetail::select('cost_estimation_detail.*','cost_estimation_calculation.*')
        // ->leftJoin('cost_estimation_calculation', 'cost_estimation_detail.id', '=', 'cost_estimation_calculation.estimation_detail_id')
        // ->get()->toArray();

        // $data = CostEstimationDetail::select('cost_estimation_detail.*')->get()->toArray();
        // print_r($data);die();
        // return view('admin.pages.admin-cost-estimation-single-view',compact('data'));


        // $detail_sum = CostEstimationDetail::select('cost_estimation_calculation.detail_sum','cost_estimation_calculation.statistic_sum','cost_estimation_calculation.cad_cam_sum','cost_estimation_calculation.logistic_sum','cost_estimation_calculation.total_sum')
        // ->leftJoin('cost_estimation_calculation', '', '=', 'cost_estimation_calculation.estimation_detail_id')
        // ->get()->toArray();
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
       
        // return Response::json($arr);
        return response()->json(['data' => $arr]);

    }
}
