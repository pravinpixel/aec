<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Interfaces\ServiceRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Service;
use App\Models\OutputType;
use App\Http\Requests\ServiceUpdateRequest;
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
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceCreateRequest $request) 
    {
        $service = $request->only([
            "service_name","is_active","output_type_id"
        ]);

        return response()->json(
            [
                'data' => $this->serviceRepository->create($service),
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
            'data' => $this->serviceRepository->find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceUpdateRequest $request,$id) 
    {
        
        $service = $request->only([
            "service_name","is_active","output_type_id"
        ]);

        return response()->json([
            'data' => $this->serviceRepository->update($service, $id),
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
        $service = $id;
        $this->serviceRepository->delete($service);
        return response()->json(['status' => true, 'msg' => trans('module.deleted'),'data'=>$service], Response::HTTP_OK);
    }
    public function status(Request $request)
    {
        $service = $request->route('id');
        $this->serviceRepository->updateStatus($service);
        return response(['status' => true, 'msg' => trans('module.status_updated'),  'data' => $service], Response::HTTP_OK);
    }
    

    public function get(Request $request)
    {
        return response()->json($this->serviceRepository->get($request));
    }
    public function outputData()
    {
        $data = OutputType::select('id','output_type_name')->where('is_active','=','1')->get();
        
        // return $data;
        if( !empty( $data ) ) {
            return response(['status' => true, 'data' => $data], Response::HTTP_OK);
        } 
        return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
    }
}
