<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Interfaces\DeliveryTypeRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DeliveryTypeController extends Controller
{
    protected $deliveryTypeRepository;

    public function __construct(DeliveryTypeRepositoryInterface $deliveryTypeRepository)
    {
        $this->deliveryTypeRepository = $deliveryTypeRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->deliveryTypeRepository->all());
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
                'data' => $this->deliveryTypeRepository->create($buildingType)
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
        $deliveryType = $request->route('id');

        return response()->json([
            'data' => $this->deliveryTypeRepository->find($deliveryType)
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
        $deliveryTypeId = $request->route('id');
        $buildingType = $request->only([
           
        ]);

        return response()->json([
            'data' => $this->deliveryTypeRepository->update($buildingType, $deliveryTypeId)
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
        $deliveryType = $request->route('id');
        $this->deliveryTypeRepository->delete($deliveryType);
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

}
