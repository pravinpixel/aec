<?php

namespace App\Http\Controllers\Customer\Master;

use App\Http\Controllers\Controller;
use App\Interfaces\CustomerLayerRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CustomerLayerController extends Controller
{
    protected $customerLayerRepo;

    public function __construct(CustomerLayerRepositoryInterface $customerLayerRepo)
    {
        $this->customerLayerRepo = $customerLayerRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->customerLayerRepo->all());
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customerLayer = $request->only([
            "layer_id",
            "is_active"
        ]);

        return response()->json(
            [
                'data' => $this->customerLayerRepo->create($customerLayer),
                'status' => true, 'msg' => trans('global.inserted')
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
        $data = $this->customerLayerRepo->find($id);
        if( !empty( $data ) ) {
            return response(['status' => true, 'data' => $data], Response::HTTP_OK);
        } 
        return response(['status' => false, 'msg' => trans('global.item_not_found')], Response::HTTP_NOT_FOUND);
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
        $customerLayer = $request->only([
            "layer_id",
            "is_active"
        ]);

        return response()->json([
            'data' => $this->customerLayerRepo->update($customerLayer, $id),
            'status' => true, 'msg' => trans('global.updated'),
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
        $this->customerLayerRepo->delete($id);
        return response()->json(['status' => true, 'msg' => trans('global.deleted')], Response::HTTP_OK);
    }

    public function get(Request $request)
    {
        return response()->json($this->customerLayerRepo->get($request));
    }
}
