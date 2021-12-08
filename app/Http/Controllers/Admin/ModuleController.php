<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModuleCreateRequest;
use App\Http\Requests\ModuleUpdateRequest;
use App\Models\Menu;
use App\Models\Module;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laracasts\Flash\Flash;
use Yajra\DataTables\Facades\DataTables;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data = Module::orderBy('id','desc')->get();
       return response(['status' => true, 'data' => $data], Response::HTTP_OK);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModuleCreateRequest $request)
    {
        $module = new Module;
        $insert = $request->only($module->getFillable());
        // $insert['order_id'] =  Module::get()->count() + 1;
        $res = Module::create($insert);
        if($res) {
            return response(['status' => true, 'data' => $res ,'msg' => trans('global.inserted')], Response::HTTP_OK);
        }
        return response(['status' => false ,'msg' => trans('global.something')], Response::HTTP_INTERNAL_SERVER_ERROR );
    }

    /**
     * Show the form for showing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Module::find($id);
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
    public function update($id, ModuleUpdateRequest $request)
    {
        $module = Module::find($id);
    
        if( empty( $module ) ) {
            return response(['status' => false, 'msg' => trans('global.item_not_found')], Response::HTTP_NOT_FOUND);
        } 
        $res = $module->update($request->only($module->getFillable()));
        if( $res ) {
            return response(['status' => true, 'data' => $module], Response::HTTP_OK);
        }
        return response(['status' => false, 'msg' => trans('global.something')], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $module = Module::find($id);
        if (empty($module)) {
            return response(['status' => false, 'msg' => trans('global.not_found')], Response::HTTP_NOT_FOUND);
        }
        $module->delete();
        return response(['status' => true, 'msg' => trans('global.deleted')], Response::HTTP_OK);
    }

    public function getDropDownModule(Request $request) 
    {
        $module_name = $request->input('module_name');
        return Module::where('module_name', 'like', '%' .$module_name. '%')
                        ->where('is_active', 1)
                        ->limit(25)
                        ->pluck('id','module_name');
    }

}
