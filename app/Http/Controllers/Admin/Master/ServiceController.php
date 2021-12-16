<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Interfaces\ServiceRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class ServiceController extends Controller
{

    public  $serviceRepository;

    public function __construct(ServiceRepositoryInterface $service) 
    {
        $this->serviceRepository = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse 
    {
        return response()->json([
            'data' => $this->serviceRepository->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse 
    {
        $service = $request->only([
           
        ]);

        return response()->json(
            [
                'data' => $this->serviceRepository->create($service)
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
        $serviceId = $request->route('id');

        return response()->json([
            'data' => $this->serviceRepository->find($serviceId)
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
        $serviceId = $request->route('id');
        $service = $request->only([
           
        ]);

        return response()->json([
            'data' => $this->serviceRepository->update($service, $serviceId)
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
        $serviceId = $request->route('id');
        $this->serviceRepository->delete($serviceId);
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    
}
