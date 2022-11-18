<?php

namespace App\Http\Controllers\Admin\Documentary;

use App\Http\Controllers\Controller;
use App\Repositories\DocumentaryRepository; 
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Config;
use App\Models\Documentary\Documentary;
use Barryvdh\DomPDF\Facade as PDF;
use Dompdf\Dompdf;
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
            $data   = Documentary::latest();
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
                    // return ' 
                    //      <a href="'.route('admin.contract.download',$data->id).'" class="btn btn-sm btn-outline-warning rounded-pill"><i class="mdi mdi-download"></i></a>
                    //     <a href="'.route('admin.contract.view',$data->id).'" class="btn btn-sm btn-outline-success rounded-pill"><i class="mdi mdi-eye"></i></a>
                    //     <a href="'.route('admin.documentaryEdit',$data->id).'" class="btn btn-sm btn-outline-primary rounded-pill"><i class="mdi mdi-pencil"></i></a>
                    //     <a href="'.route('admin.documentaryEdit',$data->id).'" class="btn btn-sm btn-outline-primary rounded-pill"><i class="fa fa-clone"></i></a>
                    //     <button onclick="destroy('.$data->id.')" class="btn btn-sm btn-outline-danger rounded-pill"><i class="mdi mdi-trash-can"></i></button>
                    // ';
                    return '
                            <div class="d-flex">
                              <a href="'.route('admin.contract.download',$data->id).'" class="btn btn-sm btn-outline-warning rounded-pill"><i class="mdi mdi-download" title="Download"></i></a>
                               <a href="'.route('admin.contract.view',$data->id).'" class="btn btn-sm btn-outline-success rounded-pill"><i class="mdi mdi-eye" title="View"></i></a>
                               <a href="'.route('admin.documentaryEdit',$data->id).'" class="btn btn-sm btn-outline-primary rounded-pill"><i class="mdi mdi-pencil" title="Edit"></i></a>
                               <a onclick="myfun('.$data->id.')"  class="btn btn-sm btn-outline-info rounded-pill" data-bs-toggle="modal" data-bs-target="#duplicate-document"><i class="fa fa-copy" title="Duplicate"></i></a>
                               <button onclick="destroy('.$data->id.')" class="btn btn-sm btn-outline-danger rounded-pill"><i class="mdi mdi-trash-can" title="Delete"></i></button>
                            </div> 
                          </div>';
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
        return view('admin.pages.documentary.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'documentary_title'=>'unique:Documentary,documentary_title'
            ]);
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
        $docu=Documentary::find($id);
        if($docu->documentary_title==$request->documentary_title){
            $data = $request->only([
                "documentary_title","documentary_content","is_active"
            ]);
            $this->documentaryRepository->update($data, $id);
            Flash::success(trans('module.cupdated'));
            return redirect(route('admin-documentary-view'));
        }
        else{
            $request->validate([
                'documentary_title' =>'unique:Documentary,documentary_title'
            ]);
        }
        
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
        return view('admin.pages.documentary.edit',compact('contract'));
    }
    public function documentaryClone(Request $req)
    {
        $contract  = Documentary::findOrFail($req->id);
        $str=$contract->documentary_title;
        $word_pos=strpos($str,'Duplicate');
        if($word_pos !=''){
            $contract_new=$contract->replicate();
            $contract_new->save();
        }
        else{
            $contract_new=$contract->replicate();
            $contract_new->documentary_title=$contract_new->documentary_title.' - Duplicate';
            $contract_new->save();
        }
        return response()->json([
            'data'=>$req->input('id')
        ]);
    }
    public function getDocumentaryName(Request $req){
        $contract  = Documentary::findOrFail($req->id);
        $str=$contract->documentary_title;
        return response()->json([
            'name'=>$str
        ]);
    }
    public function documentaryUpdate(Request $req){
        $contract  = Documentary::findOrFail($req->id);
        $req->validate([
            'name'=>'unique:Documentary,documentary_title'
        ]);
            $contract_new=$contract->replicate();
            $contract_new->documentary_title=$req->name;
            $contract_new->save();
        return response()->json([
            'msg'=>'success'
        ]);
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
    public function view($id)
    {
        $contract  = Documentary::findOrFail($id);
        return view('admin.pages.documentary.view',compact('contract'));
    }
    public function download($id)
    {
        $contract = Documentary::findOrFail($id);
        $dompdf   = new Dompdf();
        $dompdf->loadHtml($contract->documentary_content);
        $dompdf->setPaper('A4'); 
        $dompdf->render(); 
        $dompdf->stream();
    }
}