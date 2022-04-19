<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskListCreateRequest;
use App\Http\Requests\TaskListUpdateRequest;
use App\Interfaces\TaskListRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaskListController extends Controller
{
    
    public  $taskListRepo;

    public function __construct(TaskListRepositoryInterface $taskListRepo) 
    {
        $this->taskListRepo = $taskListRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->taskListRepo->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskListCreateRequest $request)
    {
        $taskList = $request->only([
            "task_list_name","is_active"
        ]);

        return response()->json(
            [
                'data' => $this->taskListRepo->create($taskList),
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
        $data = $this->taskListRepo->find($id);
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
            'data' => $this->taskListRepo->find($id)
        ]);
    }

    public function update(TaskListUpdateRequest $request,$id)
    {
        $layer = $request->only([
            "task_list_name","is_active"
        ]);

        return response()->json([
            'data' => $this->taskListRepo->update($layer, $id),
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
        $taskList = $id;
        $this->taskListRepo->delete($taskList);
        return response()->json(['status' => true, 'msg' => trans('module.deleted'),'data'=>$taskList], Response::HTTP_OK);
    }

    public function get(Request $request)
    {
        return response()->json($this->taskListRepo->get($request));
    } 
} 