<?php

namespace App\Http\Controllers\Admin\Project;

use App\Http\Controllers\Controller;
use App\Interfaces\TicketCommentRepositoryInterface;
use App\Interfaces\CustomerEnquiryRepositoryInterface;
use App\Interfaces\TicketcommentsReplayinterface;
use App\Models\Admin\Employees;
use App\Models\Customer;
use App\Models\Project;
use App\Models\projectComment;
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

        return  response(['status' => true, 'data' => 'Success', 'msg' => trans('project.comments_updated')], Response::HTTP_OK);
    }

    public function storeTicketCase(Request $request){
       

        $role_by        =   isset(Admin()->job_role) ? Admin()->job_role : 0;
        $seen_by        =   isset( Admin()->id) ? Admin()->id : Customer()->id;
        $result         =   $this->TicketCommentRepo->store($request, $seen_by, $role_by,$seen_by);

        //dd($result->variation_order);
        //$customer       =   $this->customerEnquiry->getEnquiryByID($result->project_ticket_id);
        //if($result->created_by == 'Admin') {
            //$this->customerEnquiry->updateAdminWizardStatus($customer,'response_status',1);
       // } else {
            //$this->customerEnquiry->updateAdminWizardStatus($customer,'response_status',2);
       // }
       

        //$title          =   'New Message From AEC - '.Admin()->id;
        $body           =   $request->comments;

        return  response(['status' => true,'titketid'=>$result->id,  'data' => 'Success', 'variation' => $result->variation_order ,'msg' => trans('project.comments_updated')], Response::HTTP_OK);
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
            //dd($name);

           
            if($file->extension() == 'jpg' || $file->extension() == 'JPG' ||$file->extension() == 'png'|| $file->extension() == 'PNG'){
                $showimage = $name;
            }else if($file->extension() == 'pdf' || $file->extension() == 'PDF')
            {
                $showimage='pdf.png' ;
            }else {
                $showimage='doc.png';
            }
          
            $file->move(public_path('files'), $name); 
            $files[] =  asset('public/files/').'/'.$name;
            
               $showimagedata[] =  array('img'=>asset('public/files/').'/'.$name,
                                  'type'=>'img',
                                'showimage'=> asset('public/files/').'/'.$showimage);  
           }
        }

        //dd($files);

        $arr = array('name' => $files,
                     'showimag'=> $showimagedata);
        echo json_encode($arr);
    }

    public function replay_comments(Request $request){
        
        try {
          
        list($seenBy, $role_by,$created_by,$created_by_user)  =  $this->getUser();
      //dd($created_by_user);
        $data = array('comments' =>$request->comments,
                      'project_ticket_id' => $request->project_ticket_id,
                      'project_id'      => isset($request->project_id) ? $request->project_id :'',
                      'created_by'      => $created_by,
                      'seen_user'       => $created_by_user,
                      'send_by'         => $seenBy,
                      'role_id'         => $role_by,
                      'status'          => 0);
                      //dd($data);

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
            $created_by_user = 'Admin';
        } else {
            $seenBy =  Admin()->id;
            $role_by = userRole()->id;
            $created_by = Admin()->id;
            $created_by_user = 'Customer';
        }
        
        return [$seenBy,$role_by,$created_by,$created_by_user];
    }
    public function admin_comment(Request $req){
        $project = projectComment::where([
            "project_id"       => $req->project_id,
            "commentable_id"   => Admin()->id,
            "commentable_type" => "App\Models\Admin\Employees"
        ])->get();
        
        if(count($project) != 0) {
            projectComment::find($project[0]->id)->update([
                "body"  => $req->data,
            ]);
        } else {
            projectComment::create([
                "project_id"       => $req->project_id,
                "body"             => $req->data,
                "commentable_id"   => Admin()->id,
                "commentable_type" => "App\Models\Admin\Employees"
            ]);
        }

        return response()->json([
            'msg'            => 'new data entry',
            'data'           => $req->input('data'),
            'role'           => $project    
        ]);
    }
    public function customer_comment(Request $req){
        $project = projectComment::where([
            "project_id"       => $req->project_id,
            "commentable_id"   => customer()->id,
            "commentable_type" => "App\Models\Customer"
        ])->get();
        
        if(count($project) != 0) {
            projectComment::find($project[0]->id)->update([
                "body"  => $req->data,
            ]);
        } else {
            projectComment::create([
                "project_id"       => $req->project_id,
                "body"             => $req->data,
                "commentable_id"   => customer()->id,
                "commentable_type" => "App\Models\Customer"
            ]);
        }

        return response()->json([
            'msg'            => 'new data entry',
            'data'           => $req->input('data'),
            'role'           => $project    
        ]);
    }
    public function get_admin_comment(Request $req){
        if($req->input('role')=='customer'){
            $chat=projectComment::where('project_id',(int)$req->input('project_id'))
            ->where('commentable_type','App\Models\Admin\Employees')
            ->with('project')
            ->get();
            return response()->json([
                'res'=>'ok',
                'data'=>$chat
            ]);
        }
        else{
            $chat=projectComment::where('project_id',(int)$req->input('project_id'))
            ->where('commentable_type','App\Models\Customer')
            ->with('project')
            ->get();
            return response()->json([
                'res'=>'ok',
                'data'=>$chat
            ]);
        }
    }
   
}
