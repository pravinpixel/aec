<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Interfaces\LayerRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LayerController extends Controller
{
    protected $layerType;

    public function __construct(LayerRepositoryInterface $layerType)
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
    public function store(Request $request): JsonResponse 
    {
        $layerType = $request->only([
           
        ]);

        return response()->json(
            [
                'data' => $this->layerType->create($layerType)
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
        $layerTypeId = $request->route('id');

        return response()->json([
            'data' => $this->layerType->find($layerTypeId)
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
        $layerTypeId = $request->route('id');
        $layerType = $request->only([
           
        ]);

        return response()->json([
            'data' => $this->layerType->update($layerType, $layerTypeId)
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
        $layerTypeId = $request->route('id');
        $this->layerType->delete($layerTypeId);
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
