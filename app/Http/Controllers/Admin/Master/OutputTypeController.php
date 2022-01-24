<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Repositories\OutputTypeRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OutputTypeController extends Controller
{
    protected $outputTypeRepository;

    public function __construct(OutputTypeRepository $outputType)
    {
        $this->outputTypeRepository = $outputType;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->outputTypeRepository->all());
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $outputType = $request->only([
            "output_type_name",
            "order_id",
            "is_active"
        ]);

        return response()->json(
            [
                'data' => $this->outputTypeRepository->create($outputType),
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
        $data = $this->outputTypeRepository->find($id);
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
    public function update(Request $request,$id)
    {
        $outputType = $request->only([
            "output_type_name",
            "order_id",
            "is_active"
        ]);

        return response()->json([
            'data' => $this->outputTypeRepository->update($outputType, $id),
            'status' => true, 'msg' => trans('module.updated'),
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function layer_status($id)
    {
        $module = $this->outputTypeRepository->find($id);

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
    
    public function destroy($id) 
    {
        $this->outputTypeRepository->delete($id);
        return response()->json(['status' => true, 'msg' => trans('module.deleted')], Response::HTTP_OK);
    }
}
