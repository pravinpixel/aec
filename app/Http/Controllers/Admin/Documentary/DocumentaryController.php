<?php

namespace App\Http\Controllers\Admin\Documentary;

use App\Http\Controllers\Controller;
use App\Repositories\DocumentaryRepository; 
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Config;
use App\Http\Requests\DocumentaryCreateRequest;
use App\Http\Requests\DocumentaryUpdateRequest;
use App\Models\Documentary\Documentary;
use Laracasts\Flash\Flash;
use Yajra\DataTables\Facades\DataTables;

class DocumentaryController extends Controller
{
    protected $documentaryRepository;

    public function __construct(DocumentaryRepository $Documentary)
    {
        $this->documentaryRepository = $Documentary;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ContractView(Request $request)
    {
        if($request->ajax()) {
            $data   = Documentary::all();
            return DataTables::of($data)
                ->addIndexColumn()  
                ->addColumn('status', function($data){  
                    $isChecked = $data->is_active == 1 ? 'checked' : '';
                    return ' 
                        <input type="checkbox" id="statusCheckBox'.$data->id.'Input" value="'.$data->is_active.'" '.$isChecked.' data-switch="info" onchange="changeStatus(this,'.$data->id.')"/>
                        <label for="statusCheckBox'.$data->id.'Input" data-on-label="On" data-off-label="Off"></label>
                    ';
                }) 
                ->addColumn('action', function($data){ 
                    return ' 
                        <a href="" class="btn btn-sm btn-warning rounded-pill"><i class="mdi mdi-download"></i></a>
                        <a href="" class="btn btn-sm btn-success rounded-pill"><i class="mdi mdi-eye"></i></a>
                        <a href="'.route('admin.documentaryEdit',$data->id).'" class="btn btn-sm btn-primary rounded-pill"><i class="mdi mdi-pencil"></i></a>
                        <button onclick="destroy('.$data->id.')" class="btn btn-sm btn-danger rounded-pill"><i class="mdi mdi-trash-can"></i></button>
                    ';
                })
                ->rawColumns(['action','status'])
            ->make(true);
        }
        return view('admin.pages.documentary.index');
    }
    public function index()
    {
        
        return response()->json($this->documentaryRepository->all());
    
    }

    public function create()
    {
        $enquiries = Config::get('documentary.enquiries');
        $customers = Config::get('documentary.customers');
        $user_data = Config::get('documentary.userData');
        return view('admin.pages.documentary.create',compact([
            'enquiries',
            'customers',
            'user_data',
        ]));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!userHasAccess('contract_add')) {
            Flash::error(__('global.access_denied'));
            return redirect(route('admin-dashboard'));
        }
        $outputType = $request->only([
           "documentary_title","documentary_content","is_active"
        ]);
        $this->documentaryRepository->create($outputType);
        Flash::success(trans('module.inserted'));
        return redirect(route('admin-documentary-view')); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) 
    {
        if(!userHasAccess('contract_edit')) {
            Flash::error(__('global.access_denied'));
            return redirect(route('admin-dashboard'));
        }
        $data = $this->documentaryRepository->find($id);
        if( !empty( $data ) ) {
            return response(['status' => true, 'data' => $data], Response::HTTP_OK);
        } 
        return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
    }



    public function show($id)
    {
        return response()->json([
            'data' => $this->documentaryRepository->find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data = $request->only([
            "documentary_title","documentary_content","is_active"
        ]);
        $this->documentaryRepository->update($data, $id);
        Flash::success(trans('module.updated'));
        return redirect(route('admin-documentary-view'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
    public function status(Request $request)
    {
        $output = $request->route('id');
        $this->documentaryRepository->updateStatus($output);
        return response(['status' => true, 'msg' => trans('module.status_updated'),  'data' => $output], Response::HTTP_OK);
    }
    
    public function destroy($id) 
    { 
        if(!userHasAccess('contract_delete')) {
            Flash::error(__('global.access_denied'));
            return redirect(route('admin-dashboard'));
        }
        $output = $id;
        $this->documentaryRepository->delete($output);
        return response()->json(['status' => true, 'msg' => trans('module.deleted'),'data'=>$output], Response::HTTP_OK);
    }

    public function documentaryEdit($id)
    {
        $contract  = Documentary::findOrFail($id);
        $enquiries = Config::get('documentary.enquiries');
        $customers = Config::get('documentary.customers');
        $user_data = Config::get('documentary.userData');

        return view('admin.pages.documentary.edit',compact([
            'contract',
            'enquiries',
            'customers',
            'user_data',
        ]));
    }

    public function get(Request $request)
    {
        return response()->json($this->documentaryRepository->get($request));
    }
    public function getEnquirie(Request $request)
    {
        $data = Config::get('documentary.enquiries');
        return response()->json(['data'=>$data]);
        // return response()->json($this->documentaryRepository->getEnquirie($request));
    }
    public function getCustomer(Request $request)
    {
        $data = Config::get('documentary.customers');
        return response()->json(['data'=>$data]);
        // return response()->json($this->documentaryRepository->getCustomers($request));
    }
    public function getUserData(Request $request)
    {
        $data = Config::get('documentary.userData');
        return response()->json(['data'=>$data]);
    }
}
