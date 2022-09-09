<?php

namespace App\Http\Controllers\Admin\Enquiry;

use App\Http\Controllers\Controller;
use App\Repositories\MailTemplateRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Config;
use App\Interfaces\CustomerEnquiryRepositoryInterface;
use App\Models\Enquiry;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Documentary\Documentary;
use App\Models\Admin\MailTemplate;
use App\Http\Requests\MailTemplateCreateRequest;
use App\Http\Requests\MailTemplateUpdateRequest;
use Dompdf\Dompdf;

class MailTemplateController extends Controller
{
    protected $mailTemplateRepository;

    public function __construct(MailTemplateRepository $MailTemplate, CustomerEnquiryRepositoryInterface $customerEnquiryRepository)
    {
        $this->mailTemplateRepository = $MailTemplate;
        $this->customerEnquiryRepo     = $customerEnquiryRepository;
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
        $data       =   $this->mailTemplateRepository->getDocumentaryOneData($request);
        $exists     =   $this->mailTemplateRepository->isProposalExists($request->enquireId, $request->documentId);

        if( $exists ){
            return response()->json(['status' => false, 'msg' => trans('proposal.proposal_already_generated')]);
        }

        $content    =   $data['document']['documentary_content'];
        $title      =   $data['document']['documentary_title'];   
       
        // $pdf        =   PDF::loadView('admin.enquiry.enquiryPDF.enquiryPdf',compact('content','title'));

        // $filePath   =   'uploads/enquiryPDF/'.$data['enquiry']['id'].'/';
        // $path       =   public_path($filePath); 

        // if(!file_exists($path)) {
        //     mkdir($path, 0777, true);
        // }
        // $name_replace   =   str_replace(' ', '_', $data['fileName']);
        // $fileName       =   $name_replace.'.'. 'pdf' ;
        // $pdf_path       =   $filePath.$fileName;
        // $pdf->save($path . '/' . $fileName);
        // $pdf            =   public_path($pdf_path); 
        // $pdf_store_name     =   'public/'.$filePath.$fileName;
        
        $enquiry_proposal = MailTemplate::create([
            "enquiry_id"          => $data['enquiry']['id'],
            "documentary_id"      => $data['document']['id'],
            "documentary_content" => $data['document']['documentary_content'],
            "documentary_date"    => date('Y-m-d'),
            "template_name"       => $title
        ]);
      
        if($enquiry_proposal)   {
            $enquiry = Enquiry::find($data['enquiry']['id']);
            return response()->json(['status' => true, 'msg' => trans('module.inserted')], Response::HTTP_OK);
        }
        return response()->json(['status' => true, 'msg' => trans('module.somting'),'data'=>$enquiry_proposal], Response::HTTP_OK);
    }
    public function download_proposal(Request $request)
    {
        switch ($request->documentary_status) {
            case 'approve': 
                $text_status = 'APPROVED'; 
                break;
            case 'deny': 
                $text_status = 'DENIED'; 
                break;
            case 'change_request': 
                $text_status = 'OBSOLETE'; 
                break;
            default:
                $text_status = 'WAITING FOR RESPONSE';
                break;
        }
        $content          = $request->documentary_content;
        $status           = $text_status;
        $binned_html      = view('admin.enquiry.enquiryPDF.enquiryPdf',compact('content','status'));
        $enquiry_proposal = new Dompdf();
        $enquiry_proposal->loadHtml($binned_html);
        $enquiry_proposal->render();
        $enquiry_proposal->stream();
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
