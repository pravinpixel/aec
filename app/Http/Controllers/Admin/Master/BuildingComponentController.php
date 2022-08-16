<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Interfaces\BuildingComponentRepositoryInterface;
use Illuminate\Http\JsonResponse;
use App\Models\BuildingComponent;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\ComponentCreateRequest;
use App\Http\Requests\ComponentUpdateRequest;
use Illuminate\Validation\Rule;
class BuildingComponentController extends Controller
{
    protected $buildingComponent;

    public function __construct(BuildingComponentRepositoryInterface $buildingComponent)
    {
        $this->buildingComponent = $buildingComponent;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->buildingComponent->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComponentCreateRequest $request): JsonResponse
    {
        $projectType = $request->only([
            "building_component_name", "cost_estimate_status", "building_component_icon", "order_id", "is_active",  "top_position", "bottom_position", "label"
        ]);


        $module = new BuildingComponent();

        $module->building_component_name = $request->building_component_name;
        $module->order_id = $request->order_id;
        $module->top_position = $request->top_position;
        $module->bottom_position = $request->bottom_position;
        $module->is_active = $request->is_active;
        $module->cost_estimate_status = $request->cost_estimate_status;
        $module->label = $request->label;
        if ($request->hasFile('file')) {
            $path = 'uploads/building-component-icon/';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            // dd("!11");
            $image = $request->file('file')->getClientOriginalName();
            // $request->file('file')->move(public_path('image'),$image);

            $request->file('file')->move(public_path('uploads/building-component-icon/'), $image);
            $module->building_component_icon = $image;
        }
        $res = $module->save();

        return response()->json(
            [
                // 'data' => $this->buildingComponent->create($projectType),
                'res' => $res,
                'status' => true, 'msg' => trans('module.inserted')
            ],
            Response::HTTP_CREATED
        );
    }
    public function buildingComponentUpdate(Request $request)
    {
        $this->validate($request, [
            'building_component_name' => [
                Rule::unique('building_components')->ignore($request->id)->where(function ($query) {
                    return $query->where('is_active', 1);
                }),
            ],

        ]);
        // dd($request->all());
        $projectType = $request->only([
            "building_component_name", "cost_estimate_status", "building_component_icon", "order_id", "is_active", "top_position", "bottom_position", "label"
        ]);
        $module = BuildingComponent::where('id', $request->id)->first();
        $module->building_component_name = $request->building_component_name;
        $module->order_id = $request->order_id;
        $module->top_position = $request->top_position;
        $module->bottom_position = $request->bottom_position;
        $module->is_active = $request->is_active;
        $module->cost_estimate_status = $request->cost_estimate_status;
        $module->label = $request->label;
        if ($request->hasFile('file')) {
            $path = 'uploads/building-component-icon/';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $image = $request->file('file')->getClientOriginalName();
            $request->file('file')->move(public_path('uploads/building-component-icon/'), $image);
            $module->building_component_icon = $image;
        }
        $res = $module->update();
        return response()->json([
            'res' => $res,
            // 'data' => $this->buildingComponent->update($projectType, $id),
            'status' => true, 'msg' => trans('module.updated'),

        ]);
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
            'data' => $this->buildingComponent->find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, ComponentUpdateRequest $request): JsonResponse
    {
        $projectType = $request->only([
            "building_component_name", "cost_estimate_status", "building_component_icon", "order_id", "is_active", "top_position", "bottom_position", "label"
        ]);
        $module = BuildingComponent::where('id', $id)->first();

        $module->building_component_name = $request->building_component_name;
        $module->order_id = $request->order_id;
        $module->top_position = $request->top_position;
        $module->bottom_position = $request->bottom_position;
        $module->is_active = $request->is_active;
        $module->cost_estimate_status = $request->cost_estimate_status;
        $module->label = $request->label;
        if ($request->hasFile('file')) {
            dd("11");
            $path = 'uploads/building-component-icon/';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $image = $request->file('file')->getClientOriginalName();
            // $request->file('file')->move(public_path('image'),$image);
            $request->file('file')->move(public_path('uploads/building-component-icon/'), $image);
            $module->building_component_icon = $image;
        }
        $res = $module->update();
        return response()->json([
            'res' => $res,
            // 'data' => $this->buildingComponent->update($projectType, $id),
            'status' => true, 'msg' => trans('module.updated'),

        ]);
    }
    public function status(Request $request)
    {
        $projectType = $request->route('id');
        $this->buildingComponent->updateStatus($projectType);
        return response(['status' => true, 'msg' => trans('module.status_updated'),  'data' => $projectType], Response::HTTP_OK);
    }

    public function updateCostEstimateStatus(Request $request)
    {
        $projectType = $request->route('id');
        $this->buildingComponent->updateCostEstimateStatus($projectType);
        return response(['status' => true, 'msg' => trans('module.status_updated'),  'data' => $projectType], Response::HTTP_OK);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): JsonResponse
    {
        $projectType = $id;
        $this->buildingComponent->delete($projectType);
        return response()->json(['status' => true, 'msg' => trans('module.deleted'), 'data' => $projectType], Response::HTTP_OK);
    }

    public function get(Request $request)
    {
        return response()->json($this->buildingComponent->get($request));
    }

    public function getForCostEstimate(Request $request)
    {
        return response()->json($this->buildingComponent->getForCostEstimate($request));
    }
}
