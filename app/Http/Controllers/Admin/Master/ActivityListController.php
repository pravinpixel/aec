<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateActivityListRequest;
use App\Http\Requests\UpdateActivityListRequest;
use App\Repositories\ActivityListRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ActivityListController extends Controller
{
    public  $activityListRepo;

    public function __construct(ActivityListRepository $activityListRepo)
    {


        $this->activityListRepo = $activityListRepo;
    }

    public function index()
    {
        return response()->json($this->activityListRepo->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateActivityListRequest $request)
    {

        // dd($request->all());
        $activityList = $request->only([
            "name", "is_active"
        ]);

        return response()->json(
            [
                'data' => $this->activityListRepo->create($activityList),
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
        $data = $this->activityListRepo->find($id);
        if (!empty($data)) {
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
            'data' => $this->activityListRepo->find($id)
        ]);
    }

    public function update(UpdateActivityListRequest $request, $id)
    {
        $activityList = $request->only([
            "name", "hours", "is_active"
        ]);

        return response()->json([
            'data' => $this->activityListRepo->update($activityList, $id),
            'status' => true, 'msg' => trans('module.updated'),

        ]);
    }

    public function status(Request $request)
    {

        $activityList = $request->route('id');
        $this->activityListRepo->updateStatus($activityList);
        return response(['status' => true, 'msg' => trans('module.status_updated'),  'data' => $activityList], Response::HTTP_OK);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $activityList = $this->activityListRepo->find($id);
        $activityList->delete();
        return response()->json(['status' => true, 'msg' => trans('module.deleted')], Response::HTTP_OK);
    }
}
