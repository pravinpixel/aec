<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Interfaces\LayerRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Layer;
use App\Http\Requests\LayerCreateRequest;
use App\Http\Requests\LayerUpdateRequest;

class LayerController extends Controller
{
    protected $layerRepository;

    public function __construct(LayerRepositoryInterface $layerRepository)
    {
        $this->layerRepository = $layerRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->layerRepository->all());
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LayerCreateRequest $request)
    {
        $projectType = $request->only([
            "layer_name","is_active","building_component_id",
        ]);

        return response()->json(
            [
                'data' => $this->layerRepository->create($projectType),
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
        $data = $this->layerRepository->find($id);
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
            'data' => $this->layerRepository->find($id)
        ]);
    }

    public function update(LayerUpdateRequest $request,$id)
    {
        $layer = $request->only([
            "layer_name","is_active","building_component_id",
        ]);

        return response()->json([
            'data' => $this->layerRepository->update($layer, $id),
            'status' => true, 'msg' => trans('module.updated'),
             
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    
    public function destroy($id) 
    {
        $projectType = $id;
        $this->layerRepository->delete($projectType);
        return response()->json(['status' => true, 'msg' => trans('module.deleted'),'data'=>$projectType], Response::HTTP_OK);
    }
    public function status(Request $request)
    {
        $projectType = $request->route('id');
        $this->layerRepository->updateStatus($projectType);
        return response(['status' => true, 'msg' => trans('module.status_updated'),  'data' => $projectType], Response::HTTP_OK);
    }
    public function get(Request $request)
    {
        return response()->json($this->layerRepository->get($request));
    }

    public function getByBuildingComponentId(Request $request)
    {
        return response()->json($this->layerRepository->getByBuildingComponentId($request->building_component_id));
    }

    public function storeLayerFromCustomer(Request $request)
    {
        $requestData = $request->only([
            "layer_name","building_component_id"
        ]);
        return response()->json(
            [
                'data' => $this->layerRepository->updateOrCreate($requestData),
                'status' => true, 'msg' => trans('module.inserted')
            ],
            Response::HTTP_CREATED
        );
    }
}
