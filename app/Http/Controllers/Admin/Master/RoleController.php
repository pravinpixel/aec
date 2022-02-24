<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Interfaces\RoleRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use App\Http\Requests\RoleCreateRequest;
use App\Http\Requests\RoleUpdateRequest;
class RoleController extends Controller
{
    protected $roleRepository;

    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->roleRepository->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleCreateRequest $request): JsonResponse 
    {
        $role = $request->only([
            "name","status",
        ]);
        $slug = Str::slug($request->name, "_");
        $roleData = array_merge($role,['slug'=>$slug]);

        return response()->json(
            [
                'data' => $this->roleRepository->create($roleData),
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
            'data' => $this->roleRepository->find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,RoleUpdateRequest $request): JsonResponse 
    {
        
        $role = $request->only([
            "name","status",
        ]);
        $slug = Str::slug($request->name, "_");
        $roleData = array_merge($role,['slug'=>$slug]);
       
        return response()->json([
            'data' => $this->roleRepository->update($roleData, $id),
            'status' => true, 'msg' => trans('module.updated'),
             
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request)
    {
        # code...
        $role = $request->route('id');  
        $this->roleRepository->updateStatus($role);
        // return response()->json(null, Response::HTTP_NO_CONTENT);
        return response(['status' => true, 'msg' => trans('module.status_updated'),  'data' => $role], Response::HTTP_OK);
    }
    public function destroy($id) 
    {
        // dd($request->id);
        $role = $id;
        $this->roleRepository->delete($role);
        return response()->json(['status' => true, 'msg' => trans('module.deleted'),'data'=>$role], Response::HTTP_OK);
    }

}
