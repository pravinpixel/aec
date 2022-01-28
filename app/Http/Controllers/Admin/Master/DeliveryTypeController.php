<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Interfaces\DeliveryTypeRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\DeliveryType;
use App\Http\Requests\DeliveryTypeCreateRequest;
use App\Http\Requests\DeliveryTypeUpdateRequest;

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
    public function store(DeliveryTypeCreateRequest $request) 
    {
        $projectType = $request->only([
            "delivery_type_name","is_active"
        ]);

        return response()->json(
            [
                'data' => $this->deliveryTypeRepository->create($projectType),
                'status' => true, 'msg' => trans('module.inserted')
            ],
            Response::HTTP_CREATED
        );
     
    }

    public function edit($id) 
    {
        $data = $this->deliveryTypeRepository->find($id);
        if( !empty( $data ) ) {
            return response(['status' => true, 'data' => $data], Response::HTTP_OK);
        } 
        return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
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
            'data' => $this->deliveryTypeRepository->find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DeliveryTypeUpdateRequest $request,$id) 
    { 
        $projectType = $request->only([
            "delivery_type_name","is_active"
    ]);

    return response()->json([
        'data' => $this->deliveryTypeRepository->update($projectType, $id),
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
        $this->deliveryTypeRepository->delete($projectType);
        return response()->json(['status' => true, 'msg' => trans('module.deleted'),'data'=>$projectType], Response::HTTP_OK);
    }
    
    public function status(Request $request)
    {
        $deliveryType = $request->route('id');
        $this->deliveryTypeRepository->updateStatus($deliveryType);
        return response(['status' => true, 'msg' => trans('module.status_updated'),  'data' => $deliveryType], Response::HTTP_OK);
    }

    public function get(Request $request)
    {
        return response()->json($this->deliveryTypeRepository->get($request));
    }
}
