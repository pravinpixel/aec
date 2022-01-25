<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Interfaces\LayerRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Layer;
use App\Http\Requests\LayerCreateRequest;
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
        $layer = $request->only([
            "building_component_id","layer_id","layer_type_name","is_active"
        ]);

        return response()->json(
            [
                'data' => $this->layerRepository->create($layer),
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
    public function update(LayerCreateRequest $request,$id)
    {
        $layer = $request->only([
            "building_component_id","layer_id","layer_type_name","is_active"
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
    public function layer_status($id)
    {
        $module = $this->layerRepository->find($id);

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
    
    public function destroy($id) 
    {
        $this->layerRepository->delete($id);
        return response()->json(['status' => true, 'msg' => trans('module.deleted')], Response::HTTP_OK);
    }

    public function get(Request $request)
    {
        return response()->json($this->layerRepository->get($request));
    }
}
