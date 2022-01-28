<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Interfaces\BuildingTypeRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\TypeCreateRequest;
use App\Http\Requests\TypeUpdateRequest;
class BuildingTypeController extends Controller
{
    protected $buildingTypeRepository;

    public function __construct(BuildingTypeRepositoryInterface $buildingTypeRepository)
    {
        $this->buildingTypeRepository = $buildingTypeRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->buildingTypeRepository->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeCreateRequest $request): JsonResponse 
    {
        $projectType = $request->only([
            "building_type_name","is_active"
        ]);

        return response()->json(
            [
                'data' => $this->buildingTypeRepository->create($projectType),
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
            'data' => $this->buildingTypeRepository->find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,TypeUpdateRequest $request): JsonResponse 
    {
        $projectType = $request->only([
            "building_type_name","is_active"
        ]);

        return response()->json([
            'data' => $this->buildingTypeRepository->update($projectType, $id),
            'status' => true, 'msg' => trans('module.updated'),
             
        ]);
    }
    public function status(Request $request)
    {
        $projectType = $request->route('id');
        $this->buildingTypeRepository->updateStatus($projectType);
        return response(['status' => true, 'msg' => trans('module.status_updated'),  'data' => $projectType], Response::HTTP_OK);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): JsonResponse 
    {
        $projectType = $id;
        $this->buildingTypeRepository->delete($projectType);
        return response()->json(['status' => true, 'msg' => trans('module.deleted'),'data'=>$projectType], Response::HTTP_OK);
    }

    public function get(Request $request)
    {
        return response()->json($this->buildingTypeRepository->get($request));
    }

}
