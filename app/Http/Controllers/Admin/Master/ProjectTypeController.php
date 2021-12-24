<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Interfaces\ProjectTypeRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
    public function store(Request $request): JsonResponse 
    {
        $projectType = $request->only([
           
        ]);

        return response()->json(
            [
                'data' => $this->projectTypeRepository->create($projectType)
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
    public function show(Request $request): JsonResponse 
    {
        $projectType = $request->route('id');

        return response()->json([
            'data' => $this->projectTypeRepository->find($projectType)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request): JsonResponse 
    {
        $projectTypeId = $request->route('id');
        $projectType = $request->only([
           
        ]);

        return response()->json([
            'data' => $this->projectTypeRepository->update($projectType, $projectTypeId)
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request): JsonResponse 
    {
        $projectType = $request->route('id');
        $this->projectTypeRepository->delete($projectType);
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

}
