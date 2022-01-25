<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Interfaces\ServiceRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Service;

use App\Http\Requests\ServiceCreateRequest;
class ServiceController extends Controller
{

    public  $serviceRepository;

    public function __construct(ServiceRepositoryInterface $serviceRepository) 
    {
        $this->serviceRepository = $serviceRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->serviceRepository->all());
        // $data = Service::orderBy('id', 'DESC')->get();
        // // dd($data);
        // if( !empty( $data ) ) {
        //     return response(['status' => true, 'data' => $data], Response::HTTP_OK);
        // } 
        // return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceCreateRequest $request) 
    {
        // dd($request->all());
        $module = new Service;
        $insert = $request->only($module->getFillable());
     
        // $insert['order_id'] =  Module::get()->count() + 1;
        $res = Service::create($insert);
        if($res) {
            return response(['status' => true, 'data' => $res ,'msg' => trans('module.inserted')], Response::HTTP_OK);
        }
        return response(['status' => false ,'msg' => trans('module.something')], Response::HTTP_INTERNAL_SERVER_ERROR );
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
    public function update(ServiceCreateRequest $request,$id) 
    {
        $module = Service::find($id);
        if( empty( $module ) ) {
            return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
        } 
        $res = $module->update($request->only($module->getFillable()));
        if( $res ) {
            return response(['status' => true, 'msg' => trans('module.updated'), 'data' => $module], Response::HTTP_OK);
        }
        return response(['status' => false, 'msg' => trans('module.something')], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
    public function edit($id) 
    {
        $data = Service::find($id);
        if( !empty( $data ) ) {
            return response(['status' => true, 'data' => $data], Response::HTTP_OK);
        } 
        return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) 
    {
        $module = Service::find($id);
        if (empty($module)) {
            return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
        }
        $module->is_active = 2;
        $module->save();
        $module->delete();
        return response(['status' => true, 'msg' => trans('module.deleted')], Response::HTTP_OK);
    }
    public function service_status($id)
    {
        $module = Service::find($id);

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
    

    public function get(Request $request)
    {
        return response()->json($this->serviceRepository->get($request));
    }
}
