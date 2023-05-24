<?php

namespace App\Http\Controllers\Admin\Project;
use App\Http\Controllers\Controller;
use App\Interfaces\CustomerEnquiryRepositoryInterface;
use App\Interfaces\ProjectChatRepositoryInterface;
use App\Repositories\ProjectRepository;
use App\Repositories\ProjectTicketRepository;
use Illuminate\Http\Request;
class LiveProjectController extends Controller
{
    protected $projectRepo;
    protected $ProjectTicket;
    protected $customerEnquiry;
    protected $projectChatRepo;
    public function __construct(
       ProjectRepository $projectRepo,
       ProjectTicketRepository $ProjectTicket,
       ProjectChatRepositoryInterface $projectChatRepo,
       CustomerEnquiryRepositoryInterface $customerEnquiry
      
    ){
        $this->projectRepo        = $projectRepo;
        $this->ProjectTicket = $ProjectTicket;
        $this->customerEnquiry  =   $customerEnquiry;
        $this->projectChatRepo = $projectChatRepo;
        
    }
    public function index()
    {
        return view('admin.projects.live-project.list-project');
    }
    public function projecttasklist()
    {
        return view('admin.projects.wizard.to-do-listing');
    }
    public function show(Request $request, $id, $type)
    {
        return $this->projectChatRepo->show($request,  $id, $type);
    }
    public function getCommentsCountByType($id)
    {
        return $this->projectChatRepo->getCommentsCountByType($id)->pluck('comments_count','type');
    }
    public function getActiveCommentsCountByType($id)
    {
        return $this->projectChatRepo->getActiveCommentsCountByType($id)->pluck('comments_count','type');
    }  
}
