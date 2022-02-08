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
use Dompdf\Dompdf;
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
        # code...
        // return response()->json($this->mailTemplateRepository->getDocumentaryOneData($request));
    //     $pdf = PDF::loadView('admin.enquiry.enquiryPDF.enquiryPdf');
      
    //     $headers=  [      
    //     "Content-type"        => "pdf",
    //     "Pragma"              => "no-cache",
    //     "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
    //     "Expires"             => "0",
    //     "Content-Disposition" => "attachment",
    //      "filename"          => "asas.pdf",
    // ];
    // return response()->stream($pdf->download('invoice.pdf'), 200, $headers);
    //     $pdf = PDF::loadView('admin.enquiry.enquiryPDF.enquiryPdf');
        // return $pdf->stream('invoice.pdf');
        // return response()->download('demo.pdf'); 
        // return $pdf->download('users.pdf');
       

        // $pdf = PDF::make('admin.enquiry.enquiryPDF.enquiryPdf');
        // $pdf->loadHTML($this->convert_customer_data_to_html());
        // return $pdf->stream();


        // $filename = "newpdffile";
        // $dompdf = new Dompdf();
        // $dompdf->loadHtml('admin.enquiry.enquiryPDF.enquiryPdf');
        // $dompdf->render();
        // $dompdf->stream($filename,array("Attachment"=>0));
    $data =  $this->mailTemplateRepository->getDocumentaryOneData($request);
      


    $mailData = new MailTemplate();
    $mailData->enquirie_id = $data['enquiry']['id'];
    $mailData->documentary_id = $data['document']['id'];
    $mailData->documentary_content = $data['document']['documentary_content'];
    $mailData->documentary_date = date('Y-m-d');
    $mailData->pdf_file_name = "";
    // $mailData->version = date("d.m.Y");
    $mailData->reference_no = "";
    // $mailData->is_mail_sent = date("d.m.Y");
    // $mailData->is_active = date("d.m.Y");
    // $mailData->status = date("d.m.Y");
    $res =  $mailData->save();
    if($res)
    {
        return response()->json(['status' => true, 'msg' => trans('module.inserted'),'data'=>$res], Response::HTTP_OK);
    }
    return response()->json(['status' => true, 'msg' => trans('module.somting'),'data'=>$res], Response::HTTP_OK);
       
    }
    function convert_customer_data_to_html()
    {
     $output = '
     <h3 align="center">Customer Data</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="20%">Name</th>
    <th style="border: 1px solid; padding:12px;" width="30%">Address</th>
    <th style="border: 1px solid; padding:12px;" width="15%">City</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Postal Code</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Country</th>
   </tr>
     ';  
    
     $output .= '</table>';
     return $output;
    }



    

}
