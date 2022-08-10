<?php

namespace App\Repositories;

use App\Interfaces\ConnectionPlatformInterface;
use App\Interfaces\ProjectRepositoryInterface;
use App\Interfaces\CustomerEnquiryRepositoryInterface;
use App\Models\Admin\Employees;
use App\Models\ConnectionPlatform;
use App\Models\DeliveryType;
use App\Models\InvoicePlan;
use App\Models\Project;
use App\Models\ProjectAssignToUser;
use App\Models\ProjectGranttLink;
use App\Models\ProjectGranttTask;
use App\Models\ProjectTeamSetup;
use App\Models\ProjectType;
use App\Models\SharepointFolder;
use App\Models\TeamSetupTemplate;
use App\Services\GlobalService;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class ProjectRepository implements ProjectRepositoryInterface, ConnectionPlatformInterface {
    protected $model;
    protected $projectAssignModel;
    protected $projectTeamSetup;
    protected $invoicePlan;
    protected $teamSetupTemplate;
    protected $sharepointFolder;
    protected $fileDir;
    protected $customerEnquiryRepo;

    public function __construct(
        Project $project, 
        ProjectAssignToUser $projectAssignModel, 
        ProjectTeamSetup $projectTeamSetup, 
        InvoicePlan $invoicePlan,
        TeamSetupTemplate $teamSetupTemplate,
        SharepointFolder $sharepointFolder,
        ConnectionPlatform $connectionPlatform,
        CustomerEnquiryRepositoryInterface $customerEnquiryRepository
    ){
        $this->model                = $project;
        $this->projectAssignModel   = $projectAssignModel;
        $this->projectTeamSetup     = $projectTeamSetup;
        $this->invoicePlan          = $invoicePlan;
        $this->teamSetupTemplate    = $teamSetupTemplate;
        $this->sharepointFolder     = $sharepointFolder;
        $this->connectionPlatform   = $connectionPlatform;
        $this->customerEnquiryRepo     = $customerEnquiryRepository;
    }

    public function create($enquiry_id, $data)
    { 
        $result = $this->model->updateOrCreate(['enquiry_id'=> $enquiry_id], $data);
        return $result;
    }

    public function assignProjectToUser($enquiry_id, $data)
    {
       return $this->projectAssignModel
                    ->updateOrCreate(['enquiry_id'=> $enquiry_id],$data);
    }
    
    public function unestablishedProjectList($request)
    {
        list($seenBy, $role_id,$created_by) = $this->getUser();
      

        $fromDate = isset($request->from_date) ? Carbon::parse($request->from_date)->format('Y-m-d') : now()->subDays(config('global.date_period'));
        $toDate = isset($request->from_date) ? Carbon::parse($request->to_date)->format('Y-m-d') : now();
        $projetType = isset($request->projet_type) ? $request->projet_type : false;
        $dataDb =  $this->model::where('status', 'In-Progress') ;
                                    if($role_id == ''){
                                      $dataDb->where('customer_id',$seenBy) ; 
                                    }
                                $dataDb->whereBetween('created_at', [$fromDate, $toDate])
                                ->when($projetType, function($q) use($projetType){
                                    $q->where('project_type_id', $projetType);
                                })
                                ->orderBy('id','desc');
        return $dataDb;
    }

    public function liveProjectList($request)
    {
        list($seenBy, $role_id,$created_by) = $this->getUser();
        $fromDate = isset($request->from_date) ? Carbon::parse($request->from_date)->format('Y-m-d') : now()->subDays(config('global.date_period'));
        $toDate = isset($request->from_date) ? Carbon::parse($request->to_date)->format('Y-m-d') : now();
        $projetType = isset($request->projet_type) ? $request->projet_type : false;
        $dataDb =  $this->model::where('status', 'Live');
                                if($role_id == ''){
                                    $dataDb->where('customer_id',$seenBy) ; 
                                }
                               $dataDb->whereBetween('created_at', [$fromDate, $toDate])
                                ->when($projetType, function($q) use($projetType){
                                    $q->where('project_type_id', $projetType);
                                })
                                ->orderBy('id','desc');
        return $dataDb;
    }

    public function getProjectById($id)
    { 
        return$this->model->find($id);

    }
    public  function getliveProjectById($id){
        $project = $this->model->find($id);

        $employee =  Employees::find($project->created_by );
        //dd($project->customer_id);
        //dd($project->gantt_chart_data);
        
      $projechtchart =  isset($project->gantt_chart_data) ? json_decode($project->gantt_chart_data) :array();
        $totalcompletecount = array();
        $totaloverall = array();
        $rearr = array();
        $gnttname = array();

        foreach($projechtchart as $projectdata){
           // dd($projectdata->data);
            //$gnttname = array();
           
            foreach($projectdata->data as $key=>$prodata){
                $finalstatuspercentage = array();
               
                $overall = count($prodata->data);
                $totaloverall[] = $overall;
               
                foreach($prodata->data as $finaldata){
                   
                  
                   if(isset($finaldata->status) &&  $finaldata->status !=  ''){
                    $finalstatuspercentage[] =   $finaldata->status;
                   } 
                   $gnttname[] = $finaldata->task_list;
                   $days = (strtotime($finaldata->start_date) - strtotime($finaldata->end_date)) / (60 * 60 * 24);
                   $start  = date_create($finaldata->start_date);
                   $end    = date_create($finaldata->end_date); // Current time and date
                   $diff   = date_diff( $start, $end );
                   $seriesdata[] = array('y'=>$diff->days,
                                        'color'=>'#008ffb' );


                   //dd($diff->days);

                }
                
                $completecount = count($finalstatuspercentage);
                $totalcompletecount[] = $completecount;
                $rearr[] = array('name' =>$finaldata->get_task_list->task_list_name,
                                 'completed'=> round(($completecount /$overall )*100),2);
               
            }
        }
         //dd(json_encode($seriesdata));
         
        if(count($projechtchart) > 0){
         
         $result = array('overall'=> round(((array_sum($totalcompletecount) / array_sum($totaloverall))*100),2),
         'completed' => $rearr);
            
        }
        $result['project'] = $project;
        $result['lead'] = isset($employee) ? $employee->first_name : '';
        $result['count']= $result;
        $result['series']= $seriesdata;
        $result['categories']= $gnttname;
        
        //dd($project);
        return $result;
    }

    public function checkReferenceNumber()
    {
        $referenceNumber = GlobalService::getProjectNumber();
        $project = $this->model->where('reference_number', $referenceNumber)->first();
        if(!empty($project)) {
            GlobalService::updateConfig('PRO');
        }
    }

    public function storeProjectCreation($id, $data)
    {
        return $this->model->updateOrCreate(['id'=>$id], array_merge($data,['wizard_create_project' => 1]));
    }

    public function storeConnectPlatform($id, $data = [])
    {
        $this->model->where('id', $id)->update([
            'language'=> $data['language'],
            'time_zone' => $data['time_zone'],
            'address_one' => $data['address_one'],
            'address_two' => $data['address_two'],
            'bim_project_type' => $data['bim_project_type'],
            'linked_to_customer' => $data['linked_to_customer']
        ]);
        $connectionPlatform = $this->connectionPlatform->where('project_id', $id)->first();
        if(!$connectionPlatform) {
            return $this->connectionPlatform->create(['project_id'=> $id, 'sharepoint_status'=> 0, 'bim_status'=> 0, 'tf_office_status'=>0]);
        }
        return true;
    }

    public function storeTeamSetupPlatform($project_id, $data)
    {   
        $teamSetups = [];
        $project = $this->getProjectById($project_id);
        foreach($data as $row){
            $teamSetup['role_id'] = $row['role']['id'];
            $teamSetup['team'] = json_encode($row['team']);
            $teamSetups[] = $teamSetup;
        }
        $this->updateWizardStatus($project,'wizard_teamsetup',1);
        $this->projectTeamSetup->where('project_id', $project_id)->delete();
        return $project->teamSetup()->createMany($teamSetups);
    }

    public function getProjectTeamSetup($project_id)
    {
        return $this->projectTeamSetup->with('role')
                                ->where('project_id', $project_id)
                                ->get();
    }

    public function getGranttChartTaskLink($project_id)
    {
        $tasks = new ProjectGranttTask();
        $links = new ProjectGranttLink();
        return [
            "data" => $tasks->where('project_id', $project_id)->get(),
            "links" => $links->where('project_id', $project_id)->get()
        ];
    }

    public function getToDoListData($id)
    {
        return $id;
    }

    public function getInvoicePlan($id)
    {
        return $this->model->with('invoicePlan')->find($id);
    }

    public function storeInvoicePlan($project_id, $data, $flag= true)
    {
        $project = $this->model->find($project_id);
        $insert = [
            "no_of_invoice" => $data['no_of_invoice'] ?? 0,
            "project_cost" => $data['project_cost'] ?? 0,
            "invoice_data" => json_encode($data['invoice_data'] ?? ''),
            "project_id"   => $project->id,
            "created_by"   => Admin()->id
        ];
        if($flag) {
            $this->updateWizardStatus($project,'wizard_invoice_plan',1);
        }
        return $this->invoicePlan->updateOrCreate(['project_id' => $project->id],$insert);
    }

    public function getTeamsetupTemplate($data)
    {
        return $this->teamSetupTemplate->get();
    }

    function getTeamsetupTemplateById($id)
    {
        return $this->teamSetupTemplate->find($id);
    }

    public function storeTeamsetupTemplate($data)
    {
        $insert = [
            'created_by'    => Admin()->id,
            'template_data' => json_encode($data['data'])
        ];
        return $this->teamSetupTemplate->updateOrcreate(['template_name' => $data['tempalte']],$insert);
    }

    public function getToDoList()
    {
        
    }

    public function getFolderById($id)
    {

    }

    public function storeFolder($data)
    {
        return $this->SharepointFolder->create($data);
    }

    public function updateFolder($id, $data)
    {
        return $this->sharepointFolder->updateOrCreate(['project_id'=> $id], $data);
    }

    public function getSharePointFolder($id)
    {
        return $this->model->with('sharepointFolder')->find($id);
    }

    public function draftOrSubmit($id, $data)
    {
        return $this->model->find($id)->update($data);
    }

    public function createSharepointFolder($project_id)
    {
        $sharepoint = SharepointFolder::where('project_id', $project_id)->first();
        if(!empty($sharepoint)) {
            $dirs = json_decode($sharepoint->folder);
                foreach( $dirs as $dir ){
                    $this->myRecursive($dir);
                }
                return $this->fileDir;
        }
        return false;
    }

    public function myRecursive($dir, $rootPath = '')
    {
        if(!is_array($dir)) {
            $dir = [$dir];
        }
        foreach ($dir as  $item) {
            if(!isset($item->items)){
                $this->fileDir[] =  $rootPath.'/'.$item->name;
                $rootPath = '';
                break;
            } else {
                $rootPath =  $rootPath.'/'.$item->name;
                $this->fileDir[] =  $rootPath;
                $this->myRecursive($item->items, $rootPath);
            }
        }
        return $this->fileDir;
    }

    public function updateWizardStatus($project, $column, $value = 0)
    {
        return $project->update([$column => $value]);
    }

    public function updateConnectionPlatform($id, $type)
    {
        $connectPlatform = ConnectionPlatform::where('project_id', $id)->first();
        if(empty( $connectPlatform))  {
            $connectPlatform = new ConnectionPlatform();
        }
        $connectPlatform->{$type} = !$connectPlatform->{$type};
        $connectPlatform->project_id = $id;
        return $connectPlatform->save();
    }

    public function getConnectionPlatform($id)
    {
        return ConnectionPlatform::where('project_id', $id)->first();
    }
    //===========Project To Do List =======
    public function liveprojectdata($id){


        return $this->model->with('customerdatails')->find($id);

    }

    public function getUser()
    {

        //dd(Admin());
        if (!empty(Customer()->id)) {
            $seenBy = Customer()->id;
            $role_id = '';
            $created_by = 'Admin';
        } else {
            $seenBy =  Admin()->id;
            $role_id = Admin()->job_role;

            $created_by = 'Customer';
        }
        return [$seenBy, $role_id,$created_by];
    }
    
}