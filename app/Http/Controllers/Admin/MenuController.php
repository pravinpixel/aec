<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuCreateRequest;
use App\Http\Requests\MenuUpdateRequest;
use App\Models\Menu;
use App\Models\MenuModule;
use App\Services\GlobalService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laracasts\Flash\Flash;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Menu::orderBy('id','desc')->get();
        return response(['status' => true, 'data' => $data], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuCreateRequest $request)
    {
        $menu = new Menu;
        $insert = $request->only($menu->getFillable());
        // $insert['order_id'] =  Menu::get()->count() + 1;
        $res = $menu->create($insert);
        if($res) {
            return response(['status' => true, 'data' => $res ,'msg' => trans('global.inserted')], Response::HTTP_OK);
        }
        return response(['status' => false ,'msg' => trans('global.something')], Response::HTTP_INTERNAL_SERVER_ERROR );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Menu::find($id);
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
    public function update(MenuUpdateRequest $request, $id)
    {
        $menu = Menu::find($id);
        if( empty( $menu ) ) {
            return response(['status' => false, 'msg' => trans('global.item_not_found')], Response::HTTP_NOT_FOUND);
        } 
        $res = $menu->update($request->only($menu->getFillable()));
        if( $res ) {
            return response(['status' => true, 'data' => $menu], Response::HTTP_OK);
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
        $menu = Menu::find($id);
        if (empty($menu)) {
            return response(['status' => false, 'msg' => trans('global.not_found')], Response::HTTP_NOT_FOUND);
        }
        $menu->delete();
        return response(['status' => true, 'msg' => trans('global.deleted')], Response::HTTP_OK);
    }

    public function getDropDownModule(Request $request) 
    {
        $menu_name = $request->input('menu_name');
        return Menu::where('menu_name', 'like', '%' .$menu_name. '%')
                        ->where('is_active', 1)
                        ->limit(25)
                        ->pluck('id','menu_name');
    }
    
}
