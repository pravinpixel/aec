<?php

namespace App\Http\Controllers\Admin\Project;

use App\Http\Controllers\Controller;
use App\Interfaces\TicketCommentRepositoryInterface;
use App\Interfaces\CustomerEnquiryRepositoryInterface;
use App\Interfaces\TicketcommentsReplayinterface;
use App\Models\TicketComments;
use App\Models\TicketcommentsReplay;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TicketCommentsController extends Controller
{

    protected $ticketCommentRepo;
    protected $customerEnquiry;
    protected $ticketcommentsreplay;

    public function __construct(
        TicketCommentRepositoryInterface $ticketCommentRepo,
        CustomerEnquiryRepositoryInterface $customerEnquiry,
        TicketcommentsReplayinterface $ticketcommentsreplay
    ){
    $this->TicketCommentRepo = $ticketCommentRepo;
    $this->customerEnquiry  =   $customerEnquiry;
    $this->ticketcommentsreplay  =   $ticketcommentsreplay;
 
}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role_by        =   1;
        $seen_by        =   1; 
        $result         =   $this->TicketCommentRepo->store($request, $request->created_by, $role_by,$seen_by);

        //dd($result);
        //$customer       =   $this->customerEnquiry->getEnquiryByID($result->project_ticket_id);
        //if($result->created_by == 'Admin') {
            //$this->customerEnquiry->updateAdminWizardStatus($customer,'response_status',1);
       // } else {
            //$this->customerEnquiry->updateAdminWizardStatus($customer,'response_status',2);
       // }
       

        $title          =   'New Message From AEC - '.$request->created_by;
        $body           =   $request->comments;

        return  response(['status' => true, 'data' => 'Success', 'msg' => trans('project.comments_inserted')], Response::HTTP_OK);
    }

    public function storeTicketCase(Request $request){


        $role_by        =   Admin()->job_role;
        $seen_by        =   Admin()->id;
        $result         =   $this->TicketCommentRepo->store($request, Admin()->id, $role_by,$seen_by);

        //dd($result->variation_order);
        //$customer       =   $this->customerEnquiry->getEnquiryByID($result->project_ticket_id);
        //if($result->created_by == 'Admin') {
            //$this->customerEnquiry->updateAdminWizardStatus($customer,'response_status',1);
       // } else {
            //$this->customerEnquiry->updateAdminWizardStatus($customer,'response_status',2);
       // }
       

        $title          =   'New Message From AEC - '.Admin()->id;
        $body           =   $request->comments;

        return  response(['status' => true,'titketid'=>$result->id,  'data' => 'Success', 'variation' => $result->variation_order ,'msg' => trans('project.comments_inserted')], Response::HTTP_OK);
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    public function sendprojectticket($id,$type){
       
        return $this->TicketCommentRepo->findprojectticketcomment($id, $type);

        
    }

    public function add_image(Request $request){
      

        $files = [];
        if($request->hasfile('files'))
        {
           foreach($request->file('files') as $file)
           {
               $name = time().rand(1,100).'.'.$file->extension();
               $file->move(public_path('files'), $name);  
               $files[] =  asset('public/files/').'/'.$name;  
           }
        }

        //dd($files);

        $arr = array('name' => $files);
        echo json_encode($arr);
    }

    public function replay_comments(Request $request){
        
        try {
          
        list($seenBy, $role_by,$created_by)  =  $this->getUser();
      
        $data = array('comments' =>$request->comments,
                      'project_ticket_id' => $request->project_ticket_id,
                      'project_id'      => isset($request->project_id) ? $request->project_id :'',
                      'created_by'      => $created_by,
                      'send_by'         => $created_by,
                      'role_id'         => $role_by,
                      'status'          => 1);

        $res = $this->ticketcommentsreplay->create($data); 
        return response(['status' => true, 'data' => $res ,'msg' => 'Replied Successfully'], Response::HTTP_CREATED); 
        }
        catch (\Exception $e) {
            dd($e);
           
            Log::info($e->getMessage());
            DB::rollBack();
            Flash::error(__('global.something'));
            return response(['status' => false, 'data' => '' ,'msg' => trans('global.something')], Response::HTTP_OK);
        }

                      
      //dd($request->input());
    }
    public function replay_comments_update(Request $request){
        list($seenBy,$role_by, $created_by) = $this->getUser();
        $data   = ['project_status' => $request->project_status, 'priority' =>$request->priority, 'updated_by' => $created_by];
        $id     = $request->project_ticket_id;
      
      
         $this->TicketCommentRepo->update($data,$id);
         return response(['status' => true, 'msg' => 'Issue details updated'], Response::HTTP_CREATED); 
    }


    public function getUser()
    {
       
        
        if(!empty(Customer()->id)){
            $seenBy = Customer()->id ;
            $role_by = '0';
            $created_by = Customer()->id;
        } else {
            $seenBy =  Admin()->id;
            $role_by = userRole()->id;
            $created_by = Admin()->id;
        }
        return [$seenBy,$role_by,$created_by];
    }

   
}
