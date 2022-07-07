<?php

namespace App\Http\Controllers\Admin\Project;

use App\Http\Controllers\Controller;
use App\Interfaces\TicketCommentRepositoryInterface;
use App\Interfaces\CustomerEnquiryRepositoryInterface;
use App\Models\TicketComments;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TicketCommentsController extends Controller
{

    protected $ticketCommentRepo;
    protected $customerEnquiry;

    public function __construct(
        TicketCommentRepositoryInterface $ticketCommentRepo,
        CustomerEnquiryRepositoryInterface $customerEnquiry
    ){
    $this->TicketCommentRepo = $ticketCommentRepo;
    $this->customerEnquiry  =   $customerEnquiry;
 
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

   
}
