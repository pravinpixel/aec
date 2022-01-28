<?php

namespace App\Http\Controllers\Admin\Contract;

use App\Http\Controllers\Controller;
use App\Repositories\OutputTypeRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\OutputTypeCreateRequest;
use App\Http\Requests\OutputTypeUpdateRequest;
class DocumentaryController extends Controller
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
    public function ContractView()
    {
        return view('admin.pages.documentary.index');
    }
    public function index()
    {
        return response()->json($this->outputTypeRepository->all());
    
    }

    public function create()
    {
       
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OutputTypeCreateRequest $request)
    {
        $outputType = $request->only([
            "output_type_name","order_id","is_active"
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



    public function show($id): JsonResponse 
    {

        return response()->json([
            'data' => $this->outputTypeRepository->find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OutputTypeUpdateRequest $request,$id)
    {
        $layer = $request->only([
            "output_type_name","order_id","is_active"
        ]);

        return response()->json([
            'data' => $this->outputTypeRepository->update($layer, $id),
            'status' => true, 'msg' => trans('module.updated'),
             
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function layer_status($id)
    // {
    //     $module = $this->outputTypeRepository->find($id);

    //     if( empty( $module ) ) {
    //         return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
    //     } 
    //     $module->is_active = !$module->is_active;
    //     $res = $module->save();

    //     if( $res ) {
    //         return response(['status' => true, 'msg' => trans('module.status_updated'),  'data' => $module], Response::HTTP_OK);
    //     }
    //     return response(['status' => false, 'msg' => trans('module.something')], Response::HTTP_INTERNAL_SERVER_ERROR);
    // }
    public function status(Request $request)
    {
        $output = $request->route('id');
        $this->outputTypeRepository->updateStatus($output);
        return response(['status' => true, 'msg' => trans('module.status_updated'),  'data' => $output], Response::HTTP_OK);
    }
    
    public function destroy($id) 
    {
        $output = $id;
        $this->outputTypeRepository->delete($output);
        return response()->json(['status' => true, 'msg' => trans('module.deleted'),'data'=>$output], Response::HTTP_OK);
    }

    public function get(Request $request)
    {
        return response()->json($this->outputTypeRepository->get($request));
    }
}
