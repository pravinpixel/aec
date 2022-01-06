<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Interfaces\BuildingComponentRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
    public function store(Request $request): JsonResponse 
    {
        $buildingComponent = $request->only([
           
        ]);

        return response()->json(
            [
                'data' => $this->buildingComponent->create($buildingComponent)
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
        $buildingComponentId = $request->route('id');

        return response()->json([
            'data' => $this->buildingComponent->find($buildingComponentId)
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
        $buildingComponentId = $request->route('id');
        $buildingComponent = $request->only([
           
        ]);

        return response()->json([
            'data' => $this->buildingComponent->update($buildingComponent, $buildingComponentId)
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
        $buildingComponentId = $request->route('id');
        $this->buildingComponent->delete($buildingComponentId);
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
