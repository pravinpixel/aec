<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Interfaces\DeliveryTypeRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\DeliveryType;
use App\Http\Requests\DeliveryTypeCreateRequest;
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
        $deliveryType = $request->only([
            "delivery_type_name","is_active"
        ]);

        return response()->json(
            [
                'data' => $this->deliveryTypeRepository->create($deliveryType),
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
    public function update(DeliveryTypeCreateRequest $request,$id) 
    {
        $deliveryType = $request->only([
            "delivery_type_name","is_active"
        ]);

        return response()->json([
            'data' => $this->deliveryTypeRepository->update($deliveryType, $id),
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
        $this->deliveryTypeRepository->delete($id);
        return response(['status' => true, 'msg' => trans('module.deleted')], Response::HTTP_OK);
    }
    
    public function deliveryLayer_status($id)
    {
        $module = $this->deliveryTypeRepository->find($id);

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

}
