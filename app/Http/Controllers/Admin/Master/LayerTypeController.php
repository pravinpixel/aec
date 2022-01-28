<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Interfaces\LayerTypeRepositoryInterface;
use App\Repositories\LayerTypeRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\BuildingComponent;
use App\Http\Requests\LayerTypeCreateRequest;
use App\Http\Requests\LayerTypeUpdateRequest;

use App\Models\LayerType;
use App\Models\Layer;

class LayerTypeController extends Controller
{
    protected $layerType;

    public function __construct(LayerTypeRepositoryInterface $layerType)
    {
        $this->layerType = $layerType;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->layerType->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LayerTypeCreateRequest $request)
    {
        $service = $request->only([
            "building_component_id","layer_id","layer_type_name","is_active"
        ]);

        return response()->json(
            [
                'data' => $this->layerType->create($service),
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
    public function show($id): JsonResponse 
    {
        return response()->json([
            'data' => $this->layerType->find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LayerTypeUpdateRequest $request,$id) 
    {
        $service = $request->only([
            "building_component_id","layer_id","layer_type_name","is_active"
        ]);

        return response()->json([
            'data' => $this->layerType->update($service, $id),
            'status' => true, 'msg' => trans('module.updated'),
             
        ]);
    }
    public function edit($id) 
    {
        $data = LayerType::find($id);
        if( !empty( $data ) ) {
            return response(['status' => true, 'data' => $data], Response::HTTP_OK);
        } 
        return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function componentData()
    {
        # code...
        $data = BuildingComponent::select('id','building_component_name')->where('is_active','=','1')->get();
        
        // return $data;
        if( !empty( $data ) ) {
            return response(['status' => true, 'data' => $data], Response::HTTP_OK);
        } 
        return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
    }
    public function layerData()
    {
        # code...
        $data = Layer::select('id','layer_name')->where('is_active','=','1')->get();
        
        // return $data;
        if( !empty( $data ) ) {
            return response(['status' => true, 'data' => $data], Response::HTTP_OK);
        } 
        return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
    }
    
    public function destroy($id) 
    {
        $service = $id;
        $this->layerType->delete($service);
        return response()->json(['status' => true, 'msg' => trans('module.deleted'),'data'=>$service], Response::HTTP_OK);
    }

    public function getLayerTypeByComponentId(Request $request)
    {
        $building_component_id = $request->input('building_component_id');
        $layer_id = $request->input('layer_id');
        $result = $this->layerType->getLayerTypeByComponentId($building_component_id, $layer_id);
        return response()->json($result);
    }
    public function status(Request $request)
    {
        // return 1;
        $layerType = $request->route('id');
        $this->layerType->updateStatus($layerType);
        return response(['status' => true, 'msg' => trans('module.status_updated'),  'data' => $layerType], Response::HTTP_OK);
    }
    

    public function get(Request $request)
    {
        return response()->json($this->layerType->get($request));
    }
}
