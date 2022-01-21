<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Interfaces\ProjectTypeRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\ProjectTypeCreateRequest;
class ProjectTypeController extends Controller
{
    protected $projectTypeRepository;

    public function __construct(ProjectTypeRepositoryInterface $projectTypeRepository)
    {
        $this->projectTypeRepository = $projectTypeRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->projectTypeRepository->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectTypeCreateRequest $request): JsonResponse 
    {
        $projectType = $request->only([
            "project_type_name","is_active"
        ]);

        return response()->json(
            [
                'data' => $this->projectTypeRepository->create($projectType),
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
            'data' => $this->projectTypeRepository->find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,ProjectTypeCreateRequest $request): JsonResponse 
    {
        
        $projectType = $request->only([
            "project_type_name","is_active"
        ]);

        return response()->json([
            'data' => $this->projectTypeRepository->update($projectType, $id),
            'status' => true, 'msg' => trans('module.updated'),
             
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request)
    {
        # code...
        $projectType = $request->route('id');
        $this->projectTypeRepository->updateStatus($projectType);
        // return response()->json(null, Response::HTTP_NO_CONTENT);
        return response(['status' => true, 'msg' => trans('module.status_updated'),  'data' => $projectType], Response::HTTP_OK);
    }
    public function destroy($id) 
    {
        // dd($request->id);
        $projectType = $id;
        $this->projectTypeRepository->delete($projectType);
        return response()->json(['status' => true, 'msg' => trans('module.deleted'),'data'=>$projectType], Response::HTTP_OK);
    }

}
