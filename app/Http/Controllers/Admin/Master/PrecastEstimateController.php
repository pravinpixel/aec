<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePrecastEstimationRequest;
use App\Http\Requests\UpdatePrecastEstimationRequest;
use App\Repositories\PrecastEstimationRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PrecastEstimateController extends Controller
{
    public  $precastEstimateRepo;

    public function __construct(PrecastEstimationRepository $precastEstimateRepo) 
    {
        $this->precastEstimateRepo = $precastEstimateRepo;
    }

    public function index()
    {
        return response()->json($this->precastEstimateRepo->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePrecastEstimationRequest $request)
    {
        
        $precastEstimation = $request->only([
            "name","hours","is_active"
        ]);

        return response()->json(
            [
                'data' => $this->precastEstimateRepo->create($precastEstimation),
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
    public function edit($id) 
    {
        $data = $this->precastEstimateRepo->find($id);
        if( !empty( $data ) ) {
            return response(['status' => true, 'data' => $data], Response::HTTP_OK);
        } 
        return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): JsonResponse 
    {

        return response()->json([
            'data' => $this->precastEstimateRepo->find($id)
        ]);
    }

    public function update(UpdatePrecastEstimationRequest $request,$id)
    {
        $precastEstimation = $request->only([
            "name","hours","is_active"
        ]);

        return response()->json([
            'data' => $this->precastEstimateRepo->update($precastEstimation, $id),
            'status' => true, 'msg' => trans('module.updated'),
             
        ]);
    }

    public function status(Request $request)
    {
        $precastEstimation = $request->route('id');
        $this->precastEstimateRepo->updateStatus($precastEstimation);
        return response(['status' => true, 'msg' => trans('module.status_updated'),  'data' => $precastEstimation], Response::HTTP_OK);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id) 
    {
        $precastEstimation = $this->precastEstimateRepo->find($id);
        $precastEstimation->delete();
        return response()->json(['status' => true, 'msg' => trans('module.deleted')], Response::HTTP_OK);
    }

    public function getPrecastEstimateJSON(Request $request)
    {
      
    }
}
