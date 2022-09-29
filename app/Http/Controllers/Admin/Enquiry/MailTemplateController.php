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
use App\Models\Customer;
use App\Models\EnquiryCostEstimate;
use App\Models\Role;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Log;

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
        // if($this->mailTemplateRepository->isProposalExists($request->enquireId, $request->documentId)){
        //     return response()->json(['status' => false, 'msg' => trans('proposal.proposal_already_generated')]);
        // }

        $enquiry     = Enquiry::with(['costEstimate','customer','project'])->find($request->enquireId);
        $documentary = Documentary::find($request->documentId);
 
       
        // ============== VARIABLES =========
            $enquiry_date           = $enquiry->enquiry_date;
            $project_name           = isset($enquiry->project->project_name) == false ? "" : $enquiry->project->project_name;
            $project_street_name    = isset($enquiry->project->site_address) == false ? "" : $enquiry->project->site_address;
            $project_city           = isset($enquiry->project->city) == false ? "" : $enquiry->project->city;
            $project_state          = isset($enquiry->project->state) == false ? "" : $enquiry->project->state;
            $project_country        = isset($enquiry->project->country) == false ? "" : $enquiry->project->country;
            $project_zipcode        = isset($enquiry->project->zipcode) == false ? "" : $enquiry->project->zipcode;
            $no_of_building         = isset($enquiry->project->no_of_building) == false ? "" : $enquiry->project->no_of_building;
            $project_date           = $enquiry->project_date;
            $project_delivery_date  = isset($enquiry->project->delivery_date) == false ? "" : $enquiry->project->delivery_date;
            $project_in_charge_name = isset($enquiry->project->contact_person) == false ? "" : $enquiry->project->contact_person;
            $project_mobile_no      = isset($enquiry->project->project_mobile_no) == false ? "" : $enquiry->project->project_mobile_no;

            $company_name             = $enquiry->company_name;
            $customer_organization_no = $enquiry->customer->organization_no;
            $customer_street_name     = $enquiry->site_address;
            $customer_city            = $enquiry->city ;
            $customer_state           = $enquiry->state ;
            $customer_country         = $enquiry->country ;
            $customer_zipcode         = $enquiry->zipcode ;
            $contact_person           = $enquiry->customer->contact_person ;
            $customer_email           = $enquiry->customer->email ;
            $customer_mobile_no       = $enquiry->customer->mobile_no ;

            $admin_name               = Admin()->user_name;
            $admin_role               = Role::find(Admin()->job_role)->name;
            $admin_email              = Admin()->email;
            $admin_mobile_no          = Admin()->mobile_number;
            $logo_image_with_url      = '<img width="150px" src="'.config('global.logo').'" alt="AEC PREFAB LOGO" />';
            $signature                = '<img width="150px" src="'.config('global.signature').'" alt="signature" />';
            $company_website          = url('');
            $today_date               = date("d-m-Y");

            $calculated_total_price = $enquiry->costEstimate->total_cost;
            $building_comp_1_name   = "";
            $building_comp_2_name   = "";
            $building_comp_3_name   = "";
            $building_comp_4_name   = "";
            $building_comp_1_area   = "";
            $building_comp_2_area   = "";
            $building_comp_3_area   = "";
            $building_comp_4_area   = "";

            $offer_number = "";
            $rev_number   = "";

        // ============== VARIABLES =========
        $email_contents = $documentary->documentary_content;
        eval("\$email_contents = \"$email_contents\";");
  
        // $data    = $this->mailTemplateRepository->getDocumentaryOneData($request);
        $enquiry_proposal = MailTemplate::create([
            "enquiry_id"          => $request->enquireId,
            "documentary_id"      => $request->documentId,
            "documentary_content" => $email_contents,
            "documentary_date"    => date('Y-m-d'),
            "template_name"       => $documentary->documentary_title
        ]);
      
        if($enquiry_proposal)   {
            $enquiry = Enquiry::find($request->enquireId);
            return response()->json(['status' => true, 'msg' => trans('module.inserted')], Response::HTTP_OK);
        }
        return response()->json(['status' => true, 'msg' => trans('module.somting'),'data'=>$enquiry_proposal], Response::HTTP_OK);
    }
    public function download_proposal(Request $request)
    {
        switch ($request->documentary_status) {
            case 'approved': 
                $text_status = 'APPROVED'; 
                break;
            case 'denied': 
                $text_status = 'DENIED'; 
                break;
            case 'change_request': 
                $text_status = 'CHANGE_REQUESTED';
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
