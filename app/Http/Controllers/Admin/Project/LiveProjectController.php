<?php

namespace App\Http\Controllers\Admin\Project;

use App\Helper\Bim360\Bim360CompaniesApi;
use App\Helper\Bim360\Bim360Company;
use App\Helper\Bim360\Bim360ProjectsApi;
use App\Helper\Bim360\Bim360UsersApi;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Sharepoint\SharepointController;
use App\Interfaces\CustomerEnquiryRepositoryInterface;
use App\Interfaces\CustomerRepositoryInterface;
use App\Jobs\SharepointFileCreation;
use App\Jobs\SharePointFolderCreation;
use App\Jobs\SharepointFolderDelete;
use App\Models\CheckList;
use App\Models\Customer;
use App\Models\DeliveryType;
use App\Models\InvoicePlan;
use App\Models\Project;
use App\Models\ProjectGranttTask;
use App\Models\ProjectType;
use App\Repositories\CustomerRepository;
use App\Repositories\DocumentTypeEnquiryRepository;
use App\Interfaces\ProjectTicketRepositoryInterface;
use App\Repositories\ProjectRepository;
use App\Repositories\ProjectTicketRepository;
use App\Services\GlobalService;
use Carbon\Carbon;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Laracasts\Flash\Flash;
use Yajra\DataTables\Facades\DataTables;
use RicorocksDigitalAgency\Soap\Facades\Soap;

class LiveProjectController extends Controller
{
    protected $projectRepo;
    protected $ProjectTicket;
    

    public function __construct(
       ProjectRepository $projectRepo,
       ProjectTicketRepository $ProjectTicket
      
    ){
        $this->projectRepo        = $projectRepo;
        $this->ProjectTicket = $ProjectTicket;
        
    }

    public function index()
    {
        return view('admin.projects.live-project.list-project');
    }

  


    public function projecttasklist()
    {
        return view('admin.projects.wizard.to-do-listing');
    }

   

   

 

    

    

  

    


  

  
   


 

   
    

    

  

  

  

    public function testDemo($project)
    {
     
        // $teamSetups = $this->projectRepo->getProjectTeamSetup($project->id);
        // $employees = [];
        // foreach($teamSetups as $teamSetup) {
        //     if(!empty($teamSetup->team)) {
        //         $employees[] = $teamSetup->team;
        //     }
        // }
        // $employees_id = Arr::flatten($employees);
        // $employees = Employee::find($employees_id);
        // $project_id = $project->bim_id;
        // foreach($employees as $employee) {
        //     $data = [
        //         'email'=> $employee->email,
        //         "services"=> [
        //             "document_management"=> [
        //               "access_level"=> "user"
        //             ]
        //         ],
        //         "industry_roles" => []
        //     ];
           
        //     $userApi = new  Bim360UsersApi();
        //     if(isset($employee->bim_id) && !empty($employee->bim_id)) {
        //         $userJson = $userApi->getUser($employee->bim_id);
        //         $userObj =  json_decode($userJson);
        //         $input = json_encode([$data]);
        //         Log::info("x-user-id {$input}");
        //         Log::info("x-user-id {$userObj->uid}");
        //         $projectApi = new  Bim360ProjectsApi();
        //         $result = $projectApi->importUser($project_id, $input, $userObj->uid);
        //         dd( $result);
        //         Log::info("result  {$result}");
        //     }
        // }
        // Session('tets', 100);
            // $folderPath = '/DataBase Test/PRO-2022-002/Custom Input';
            // $project = $this->projectRepo->getProjectById($project_id);
            // $reference_number = str_replace('/','-',$project->reference_number);
            // $documents = $this->documentTypeEnquiryRepo
            //                     ->getDocumentByEnquiryId(6);
            // foreach($documents as $document) {
            //     $filePath = asset('public/uploads/'.$document->file_name);
            //     $job = (new SharepointFileCreation($folderPath,$filePath, $document->client_file_name))->delay(config('global.job_delay'));
            //     $this->dispatch($job);
            // }
    }
    
}
