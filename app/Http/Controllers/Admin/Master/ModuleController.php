<?php

namespace App\Http\Controllers\Admin\Master;

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
use App\Interfaces\ModuleRepositoryInterface;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $moduleRepository;

    public function __construct(ModuleRepositoryInterface $moduleRepository)
    {
        $this->moduleRepository = $moduleRepository;
    }
    // public function moduleFile()
    // {
    //     return view('admin.setting-tabs.Module.module');
    // }
    

    public function index(Request $request)
    {
        return response()->json($this->moduleRepository->all());
    //    $module_name = $request->input('module_name');
    //    $data = Module::orderBy('id','desc')
    //         ->when($module_name , function($q) use($module_name) {
    //             $q->where('module_name','like', "%{$module_name}%");
    //         })
    //         ->get();
    //    return response(['status' => true, 'data' => $data], Response::HTTP_OK);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModuleCreateRequest $request)
    {
        $module = $request->only([
            "module_name","icon","is_active","order_id"
        ]);

        return response()->json(
            [
                'data' => $this->moduleRepository->create($module),
                'status' => true, 'msg' => trans('module.inserted')
            ],
            Response::HTTP_CREATED
        );
        // $module = new Module;
        // $insert = $request->only($module->getFillable());
        // $res = Module::create($insert);
        // if($res) {
        //     return response(['status' => true, 'data' => $res ,'msg' => trans('module.inserted')], Response::HTTP_OK);
        // }
        // return response(['status' => false ,'msg' => trans('module.something')], Response::HTTP_INTERNAL_SERVER_ERROR );
    }

    /**
     * Show the form for showing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json([
            'data' => $this->moduleRepository->find($id)
        ]);
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
        $module = $request->only([
            "module_name","icon","is_active","order_id"
        ]);

        return response()->json([
            'data' => $this->moduleRepository->update($module, $id),
            'status' => true, 'msg' => trans('module.updated'),
             
        ]);       

    }

    public function status(Request $request)
    {
        $module = $request->route('id');
        $this->moduleRepository->updateStatus($module);
        return response(['status' => true, 'msg' => trans('module.status_updated'),  'data' => $module], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $module = $id;
        $this->moduleRepository->delete($module);
        return response()->json(['status' => true, 'msg' => trans('module.deleted'),'data'=>$module], Response::HTTP_OK);
        // $module = Module::find($id);
        // if (empty($module)) {
        //     return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
        // }
        // $module->delete();
        // return response(['status' => true, 'msg' => trans('module.deleted')], Response::HTTP_OK);
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
