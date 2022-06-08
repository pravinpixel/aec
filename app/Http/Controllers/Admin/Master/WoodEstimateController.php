<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateWoodEstimationRequest;
use App\Repositories\WoodEstimationRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WoodEstimateController extends Controller
{
    public  $woodEstimateRepo;

    public function __construct(WoodEstimationRepository $woodEstimateRepo) 
    {
        $this->woodEstimateRepo = $woodEstimateRepo;
    }

    public function index()
    {
        return response()->json($this->woodEstimateRepo->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateWoodEstimationRequest $request)
    {
        
        $woodEstimation = $request->only([
            "name","is_active"
        ]);

        return response()->json(
            [
                'data' => $this->woodEstimateRepo->create($woodEstimation),
                'status' => true, 'msg' => trans('module.inserted')
            ],
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) 
    {
        $data = $this->woodEstimateRepo->find($id);
        if( !empty( $data ) ) {
            return response(['status' => true, 'data' => $data], Response::HTTP_OK);
        } 
        return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): JsonResponse 
    {

        return response()->json([
            'data' => $this->woodEstimateRepo->find($id)
        ]);
    }

    public function update(CreateWoodEstimationRequest $request,$id)
    {
        $woodEstimation = $request->only([
            "name","is_active"
        ]);

        return response()->json([
            'data' => $this->woodEstimateRepo->update($woodEstimation, $id),
            'status' => true, 'msg' => trans('module.updated'),
             
        ]);
    }

    public function status(Request $request)
    {
        $woodEstimation = $request->route('id');
        $this->woodEstimateRepo->updateStatus($woodEstimation);
        return response(['status' => true, 'msg' => trans('module.status_updated'),  'data' => $woodEstimation], Response::HTTP_OK);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id) 
    {
        $woodEstimation = $this->woodEstimateRepo->find($id);
        $woodEstimation->delete();
        return response()->json(['status' => true, 'msg' => trans('module.deleted')], Response::HTTP_OK);
    }

    public function getWoodEstimateJSON(Request $request)
    {
        $estimations = $this->woodEstimateRepo->all();
        $CostEstimate = [ 
            'type'      => 'Building Type 1',
            'totalArea' => 0,
            'totalPris' => 0,
            'totalSum'  => 0,
            "Components" => [ 
                [
                    'building_component_id'=> '',
                    'type_id'=> '',
                    'DesignScope'=> 0,
                    "Component"     => "",
                    "Type"          => "", 
                    "Sqm"           => "",
                    "Complexity"    => "", 
                    'Dynamics'=> [],
                    "TotalCost" => [
                        "PriceM2"   => 0, 
                        "Sum"       => 0, 
                    ],
                    "Rib"=> [
                        "Sum" => ""
                    ]
                ]
            ],
            "ComponentsTotals" => [
                "Sqm"           => '',
                "complexity"    => '', 
                'Dynamics'=> [],
                "TotalCost" =>[
                    "PriceM2"   => 0, 
                    "Sum"       => 0, 
                ],
                "Rib"=> [
                    "Sum" => ""
                ],
                "grandTotal"    => '', 
            ],
        ];
        foreach($estimations as $estimation) {
            $CostEstimate['Components'][0]['Dynamics'][]      = ["name"=> $estimation->name, 'PriceM2' => '', 'Sum' => ''];
            $CostEstimate['ComponentsTotals']['Dynamics'][]      = ["name"=> $estimation->name, 'PriceM2' => '', 'Sum' => ''];
        }
        $CostEstimate['Components'][0]["TotalCost"]  = ['PriceM2' => '', 'Sum' => ''];
        $CostEstimate['Components'][0]["Rib"]        = ["Sum" => ""];
        return response(['json'=> $CostEstimate]);
    }
}
