<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Interfaces\BuildingComponentRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\ComponentCreateRequest;
use App\Http\Requests\ComponentUpdateRequest;
class BuildingComponentController extends Controller
{
    protected $buildingComponent;

    public function __construct(BuildingComponentRepositoryInterface $buildingComponent)
    {
        $this->buildingComponent = $buildingComponent;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->buildingComponent->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComponentCreateRequest $request): JsonResponse 
    {
        $projectType = $request->only([
            "building_component_name","building_component_icon","order_id","is_active"
        ]);

        return response()->json(
            [
                'data' => $this->buildingComponent->create($projectType),
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
            'data' => $this->buildingComponent->find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,ComponentUpdateRequest $request): JsonResponse 
    {
        $projectType = $request->only([
            "building_component_name","building_component_icon","order_id","is_active"
        ]);

        return response()->json([
            'data' => $this->buildingComponent->update($projectType, $id),
            'status' => true, 'msg' => trans('module.updated'),
             
        ]);
    }
    public function status(Request $request)
    {
        $projectType = $request->route('id');
        $this->buildingComponent->updateStatus($projectType);
        return response(['status' => true, 'msg' => trans('module.status_updated'),  'data' => $projectType], Response::HTTP_OK);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id): JsonResponse 
    {
        $projectType = $id;
        $this->buildingComponent->delete($projectType);
        return response()->json(['status' => true, 'msg' => trans('module.deleted'),'data'=>$projectType], Response::HTTP_OK);
    }

    public function get(Request $request)
    {
        return response()->json($this->buildingComponent->get($request));
    }
}
