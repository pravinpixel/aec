<?php

namespace App\Http\Controllers\Admin\Enquiry;

use App\Http\Controllers\Controller;
use App\Repositories\MailTemplateRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Config;

use App\Models\Enquiry;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Documentary\Documentary;
use App\Models\Admin\MailTemplate;
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

    public function get(Request $request)
    {
        return response()->json($this->mailTemplateRepository->get($request));
    }
    public function getDocumentaryData(Request $request)
    {
        return response()->json($this->mailTemplateRepository->getDocumentaryData($request));
    }
    public function getDocumentaryOneData(Request $request)
    {
        $data =  $this->mailTemplateRepository->getDocumentaryOneData($request);
        // return $data;
        
        $content =$data['document']['documentary_content'];
        $title = $data['document']['documentary_title'];
        $logo = Config::get('documentary.logo.key');
        $pdf = PDF::loadView('admin.enquiry.enquiryPDF.enquiryPdf',compact('content','logo','title'));
        $path = public_path('uploads/'); 
        $fileName =   $data['fileName'].'.'. 'pdf' ;
        $pdf->save($path . '/' . $fileName);
        $pdf = public_path('uploads/'.$fileName);
        // return $pdf;
        $mailData = new MailTemplate();
        $mailData->enquirie_id = $data['enquiry']['id'];
        $mailData->documentary_id = $data['document']['id'];
        $mailData->documentary_content = $data['document']['documentary_content'];
        $mailData->documentary_date = date('Y-m-d');
        $mailData->pdf_file_name = $fileName;
        $mailData->reference_no = "";
        $res =  $mailData->save();
        if($res)
        {
            return response()->json(['status' => true, 'msg' => trans('module.inserted'),'data'=>$fileName], Response::HTTP_OK);
        }
        return response()->json(['status' => true, 'msg' => trans('module.somting'),'data'=>$res], Response::HTTP_OK);
       
    }
    public function pdfGenrate(Request $request)
    {
        // return 1;
        $document = Documentary::where('id',44)->first();
           $data = $document['documentary_content'];
        //    return $data;
            $pdf = PDF::loadView('enquiryPdf',compact('data'));

            $path = public_path('uploads/'); 
    
            $fileName =  'document'.time().'.'. 'pdf' ; 
    
            $pdf->save($path . '/' . $fileName); 
            $pdf = public_path('uploads/'.$fileName); 
            return $fileName;
        //    $rr =  stream($pdf);
        // return response()->stream($pdf); 
        // return $pdf->download('invoice.pdf');
         
            // return response()->stream($pdf);
    }
    

}
