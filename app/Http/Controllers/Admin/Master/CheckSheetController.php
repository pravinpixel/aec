<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCheckSheetRequest;
use App\Http\Requests\UpdateCheckSheetRequest;
use App\Repositories\CheckSheetRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class CheckSheetController extends Controller
{
    public  $checkSheetRepo;

    public function __construct(CheckSheetRepository $checkSheetRepo)
    {


        $this->checkSheetRepo = $checkSheetRepo;
    }

    public function index()
    {
        return response()->json($this->checkSheetRepo->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCheckSheetRequest $request)
    {

        // dd($request->all());
        $checkSheet = $request->only([
            "name", "is_active"
        ]);

        return response()->json(
            [
                'data' => $this->checkSheetRepo->create($checkSheet),
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
        dd("edit");
        $data = $this->checkSheetRepo->find($id);
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
            'data' => $this->checkSheetRepo->find($id)
        ]);
    }

    public function update(UpdateCheckSheetRequest $request, $id)
    {
        $checkSheet = $request->only([
            "name", "hours", "is_active"
        ]);

        return response()->json([
            'data' => $this->checkSheetRepo->update($checkSheet, $id),
            'status' => true, 'msg' => trans('module.updated'),

        ]);
    }

    public function status(Request $request)
    {

        $checkSheet = $request->route('id');
        $this->checkSheetRepo->updateStatus($checkSheet);
        return response(['status' => true, 'msg' => trans('module.status_updated'),  'data' => $checkSheet], Response::HTTP_OK);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $checkSheet = $this->checkSheetRepo->find($id);
        $checkSheet->delete();
        return response()->json(['status' => true, 'msg' => trans('module.deleted')], Response::HTTP_OK);
    }
}
