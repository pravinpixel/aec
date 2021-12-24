<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Interfaces\BuildingTypeRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BuildingTypeController extends Controller
{
    protected $buildingType;

    public function __construct(BuildingTypeRepositoryInterface $buildingTypeRepository)
    {
        $this->buildingType = $buildingTypeRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->buildingType->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse 
    {
        $buildingType = $request->only([
           
        ]);

        return response()->json(
            [
                'data' => $this->buildingType->create($buildingType)
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
    public function show(Request $request): JsonResponse 
    {
        $buildingTypeId = $request->route('id');

        return response()->json([
            'data' => $this->buildingType->find($buildingTypeId)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request): JsonResponse 
    {
        $buildingTypeId = $request->route('id');
        $buildingType = $request->only([
           
        ]);

        return response()->json([
            'data' => $this->buildingType->update($buildingType, $buildingTypeId)
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request): JsonResponse 
    {
        $buildingTypeId = $request->route('id');
        $this->buildingType->delete($buildingTypeId);
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

}
