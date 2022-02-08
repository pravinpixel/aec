<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\MailTemplateRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Config;
use App\Http\Requests\MailTemplateCreateRequest;
use App\Http\Requests\MailTemplateUpdateRequest;
class MailTemplateController extends Controller
{
    protected $mailTemplateRepository;

    public function __construct(MailTemplateRepository $MailTemplate)
    {
        $this->mailTemplateRepository = $MailTemplate;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ContractView()
    {
        return view('admin.pages.documentary.index');
    }
    public function index()
    {
      
        return response()->json($this->mailTemplateRepository->all());
    
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
    public function store(MailTemplateCreateRequest $request)
    {
        // return $request->all();
        $outputType = $request->only([
           "documentary_title","documentary_type","documentary_content","is_active"
        ]);

        return response()->json(
            [
                'data' => $this->mailTemplateRepository->create($outputType),
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
        // return "333";
        $data = $this->mailTemplateRepository->find($id);
        if( !empty( $data ) ) {
            return response(['status' => true, 'data' => $data], Response::HTTP_OK);
        } 
        return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
    }



    public function show($id)
    {
        
        return response()->json([
            'data' => $this->mailTemplateRepository->find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MailTemplateUpdateRequest $request,$id)
    {
        $layer = $request->only([
            "documentary_title","documentary_type","documentary_content","is_active"
        ]);

        return response()->json([
            'data' => $this->mailTemplateRepository->update($layer, $id),
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
        $output = $request->route('id');
        $this->mailTemplateRepository->updateStatus($output);
        return response(['status' => true, 'msg' => trans('module.status_updated'),  'data' => $output], Response::HTTP_OK);
    }
    
    public function destroy($id) 
    {
        $output = $id;
        $this->mailTemplateRepository->delete($output);
        return response()->json(['status' => true, 'msg' => trans('module.deleted'),'data'=>$output], Response::HTTP_OK);
    }

    public function documentaryEdit($id)
    {
        $id = $id;
        return view('admin.pages.documentary.edit',compact('id'));
    }

    public function get(Request $request)
    {
        return response()->json($this->mailTemplateRepository->get($request));
    }
    public function getEnquirie(Request $request)
    {
        $data = Config::get('documentary.enquiries');
        return response()->json(['data'=>$data]);
        
    }
    public function getCustomer(Request $request)
    {
        $data = Config::get('documentary.customers');
        return response()->json(['data'=>$data]);
        
    }
    public function getUserData(Request $request)
    {
        $data = Config::get('documentary.userData');
        return response()->json(['data'=>$data]);
    }
}
