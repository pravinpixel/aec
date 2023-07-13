<?php

namespace App\Repositories;

use App\Http\Controllers\SoapController;
use App\Interfaces\ConnectionPlatformInterface;
use App\Interfaces\ProjectRepositoryInterface;
use App\Interfaces\CustomerEnquiryRepositoryInterface;
use App\Models\Admin\Employees;
use App\Models\CheckList;
use App\Models\ConnectionPlatform;
use App\Models\InvoicePlan;
use App\Models\LiveProjectGranttLink;
use App\Models\LiveProjectGranttTask;
use App\Models\Project;
use App\Models\ProjectAssignToUser;
use App\Models\ProjectGranttLink;
use App\Models\ProjectGranttTask;
use App\Models\ProjectTeamSetup;
use App\Models\Role;
use App\Models\SharepointFolder;
use App\Models\sharePointMasterFolder;
use App\Models\TeamSetupTemplate;
use App\Services\GlobalService;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Log;

class ProjectRepository implements ProjectRepositoryInterface, ConnectionPlatformInterface
{
    protected $model;
    protected $projectAssignModel;
    protected $projectTeamSetup;
    protected $invoicePlan;
    protected $teamSetupTemplate;
    protected $sharepointFolder;
    protected $fileDir;
    protected $customerEnquiryRepo;
    protected $connectionPlatform;

    public function __construct(
        Project $project,
        ProjectAssignToUser $projectAssignModel,
        ProjectTeamSetup $projectTeamSetup,
        InvoicePlan $invoicePlan,
        TeamSetupTemplate $teamSetupTemplate,
        SharepointFolder $sharepointFolder,
        ConnectionPlatform $connectionPlatform,
        CustomerEnquiryRepositoryInterface $customerEnquiryRepository
    ) {
        $this->model               = $project;
        $this->projectAssignModel  = $projectAssignModel;
        $this->projectTeamSetup    = $projectTeamSetup;
        $this->invoicePlan         = $invoicePlan;
        $this->teamSetupTemplate   = $teamSetupTemplate;
        $this->sharepointFolder    = $sharepointFolder;
        $this->connectionPlatform  = $connectionPlatform;
        $this->customerEnquiryRepo = $customerEnquiryRepository;
    }

    public function create($enquiry_id, $data)
    {
        $result = $this->model->updateOrCreate(['enquiry_id' => $enquiry_id], $data);
        return $result;
    }

    public function assignProjectToUser($enquiry_id, $data)
    {
        return $this->projectAssignModel
            ->updateOrCreate(['enquiry_id' => $enquiry_id], $data);
    }

    public function unestablishedProjectList($request)
    {
        list($seenBy, $role_id, $created_by) = $this->getUser();


        $fromDate = isset($request->from_date) ? Carbon::parse($request->from_date)->format('Y-m-d') : now()->subDays(config('global.date_period'));
        $toDate = isset($request->from_date) ? Carbon::parse($request->to_date)->format('Y-m-d') : now();
        $projectType = isset($request->project_type) ? $request->project_type : false;
        $dataDb =  $this->model::where('status', 'UN_ESTABLISHED');
        if ($role_id == '') {
            $dataDb->where('customer_id', $seenBy);
        }
        $dataDb->whereBetween('created_at', [$fromDate, $toDate])
            ->when($projectType, function ($q) use ($projectType) {
                $q->where('project_type_id', $projectType);
            })
            ->orderBy('id', 'desc');
        return $dataDb;
    }

    public function liveProjectList($request)
    {
        list($seenBy, $role_id, $created_by) = $this->getUser();
        $fromDate = isset($request->from_date) ? Carbon::parse($request->from_date)->format('Y-m-d') : now()->subDays(config('global.date_period'));
        $toDate = isset($request->from_date) ? Carbon::parse($request->to_date)->format('Y-m-d') : now();
        $projectType = isset($request->project_type) ? $request->project_type : false;

        $dataDb =  $this->model::with('Customer')->WhereHas('Customer', function ($q) {
            $q->where('is_active', 1);
        })->where('status', 'LIVE');
        if ($role_id == '') {
            $dataDb->where('customer_id', $seenBy);
        }
        $dataDb->whereBetween('created_at', [$fromDate, $toDate])
            ->when($projectType, function ($q) use ($projectType) {
                $q->where('project_type_id', $projectType);
            })
            ->orderBy('id', 'desc');
        return $dataDb;
    }

    public function getProjectById($id)
    {
        return $this->model->with('Customer')->find($id);
    }
    public  function getliveProjectById($id)
    {
        $project = $this->model->find($id);

        $employee =  Employees::find($project->created_by);
        $projechtchart =  isset($project->gantt_chart_data) ? json_decode($project->gantt_chart_data) : array();
        $totalcompletecount = array();
        $totaloverall = array();
        $rearr = array();
        $gnttname = array();
        $intervalday = array();
        $seriesdata = array();

        foreach ($projechtchart as $projectdata) {
            foreach ($projectdata->data as $key => $prodata) {
                $finalstatuspercentage = array();
                $overall = count($prodata->data);
                $overall = $overall <= 0 ? 1 : $overall;
                $totaloverall[] = $overall;

                foreach ($prodata->data as $finaldata) {

                    //dd($finaldata->delivery_date);

                    $delivery_date = isset($finaldata->delivery_date) ? Carbon::parse($finaldata->delivery_date)->format('Y-m-d') : '';


                    if (isset($finaldata->status) &&  $finaldata->status !=  '') {
                        $finalstatuspercentage[] =   $finaldata->status;
                    }
                    $gnttname[] = $finaldata->task_list;

                    $date_now = date("Y-m-d"); // this format is string comparable

                    if (isset($delivery_date) && $date_now > $delivery_date) {
                        $datetime1 = new DateTime($date_now);
                        $datetime2 = new DateTime($delivery_date);
                        $intervalday[] = $datetime1->diff($datetime2)->days * 24;
                    } else {
                        $intervalday[] = 0;
                    }



                    $days = (strtotime(str_replace('/', '-', $finaldata->start_date)) - strtotime(str_replace('/', '-', $finaldata->end_date))) / (60 * 60 * 24);
                    $start  = date_create(str_replace('/', '-', $finaldata->start_date));
                    $end    = date_create(str_replace('/', '-', $finaldata->end_date)); // Current time and date
                    $diff   = date_diff($start, $end);
                    $seriesdata[] = array(
                        'y' => $diff->days * 24,
                        'color' => '#008ffb'
                    );




                    //dd($diff->days);

                }

                $completecount = count($finalstatuspercentage);
                $totalcompletecount[] = $completecount;
                // $rearr[] = array('name' =>$finaldata->get_task_list->task_list_name,
                //                  'completed'=> round(($completecount /$overall )*100),2);
            }
        }

        if (count($projechtchart) > 0) {

            $result = array(
                'overall' => round(((array_sum($totalcompletecount) / array_sum($totaloverall)) * 100), 2),
                'completed' => $rearr
            );
        }
        $result['project'] = $project;
        $result['lead'] = isset($employee) ? $employee->first_name : '';
        $result['count'] = $result;
        $result['series'] = $seriesdata;
        $result['categories'] = $gnttname;
        $result['intervelday'] = $intervalday;

        //dd($project);
        return $result;
    }

    public function checkReferenceNumber()
    {
        $referenceNumber = GlobalService::getProjectNumber();
        $project = $this->model->where('reference_number', $referenceNumber)->first();
        if (!empty($project)) {
            GlobalService::updateConfig('PRJ');
        }
    }

    public function storeProjectCreation($id, $data)
    {
        return $this->model->updateOrCreate(['id' => $id], array_merge($data, ['wizard_create_project' => 1]));
    }

    public function storeConnectPlatform($id, $data = [])
    {
        $this->model->where('id', $id)->update([
            'language' => $data['language'],
            'time_zone' => $data['time_zone'],
            'address_one' => $data['address_one'],
            'address_two' => $data['address_two'],
            'bim_project_type' => $data['bim_project_type'],
            'linked_to_customer' => $data['linked_to_customer'],
            'is_move_to_customer_input_folder' => $data['is_move_to_customer_input_folder'],
            'wizard_connect_platform' => 1
        ]);
        $connectionPlatform = $this->connectionPlatform->where('project_id', $id)->first();
        if (!$connectionPlatform) {
            return $this->connectionPlatform->create(['project_id' => $id, 'sharepoint_status' => 0, 'bim_status' => 0, 'tf_office_status' => 0]);
        }
        return true;
    }

    public function storeTeamSetupPlatform($project_id, $data)
    {
        $teamSetups = [];
        $project = $this->getProjectById($project_id);
        foreach ($data as $row) {
            $teamSetup['role_id'] = $row['role']['id'];
            $teamSetup['team'] = json_encode($row['team']);
            $teamSetups[] = $teamSetup;
        }
        $this->updateWizardStatus($project, 'wizard_teamsetup', 1);
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
        return [
            "data" => ProjectGranttTask::where('project_id', $project_id)->get(),
            "links" => ProjectGranttLink::where('project_id', $project_id)->get()
        ];
    }

    public function getToDoListData($id)
    {
        return $id;
    }

    public function getInvoicePlan($id)
    {
        if(is_null(session()->get('24-seven-office-token')) || empty(session()->get('24-seven-office-token'))) {
            $xmlSoap = new SoapController();
            $xmlSoap->credential();
        }
        return $this->model->with('invoicePlan')->find($id);
    }

    public function storeInvoicePlan($project_id, $data, $flag = true)
    {
        $project      = $this->model->find($project_id);
        $insert = [
            "no_of_invoice" => $data['no_of_invoice'] ?? 0,
            "project_cost" => $data['project_cost'] ?? 0,
            "invoice_data" => json_encode($data['invoice_data'] ?? ''),
            "project_id"   => $project->id,
            "created_by"   => Admin()->id
        ];
        if ($flag) {
            $this->updateWizardStatus($project, 'wizard_invoice_plan', 1);
        }
        return $this->invoicePlan->updateOrCreate(['project_id' => $project->id], $insert);
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
        return $this->teamSetupTemplate->updateOrcreate(['template_name' => $data['tempalte']], $insert);
    }

    public function deleteTeamSetupTemplate($id)
    {
        return $this->teamSetupTemplate->findOrFail($id)->delete();
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
        return $this->sharepointFolder->updateOrCreate(['project_id' => $id], $data);
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
        if (!empty($sharepoint)) {
            $dirs = json_decode($sharepoint->folder);
            foreach ($dirs as $dir) {
                $this->myRecursive($dir);
            }
            return $this->fileDir;
        }
        return false;
    }

    public function myRecursive($dir, $rootPath = '')
    {
        if (!is_array($dir)) {
            $dir = [$dir];
        }
        foreach ($dir as  $item) {
            if (!isset($item->items)) {
                $this->fileDir[] =  $rootPath . '/' . $item->name;
                $rootPath = '';
                break;
            } else {
                $rootPath =  $rootPath . '/' . $item->name;
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
        if ($type == 'is_move_to_customer_input_folder') {
            $project = Project::find($id);
            $project->is_move_to_customer_input_folder = !$project->is_move_to_customer_input_folder;
            return $project->save();
        }
        $connectPlatform = ConnectionPlatform::where('project_id', $id)->first();
        if (empty($connectPlatform)) {
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
    public function liveprojectdata($id)
    {


        return $this->model->with('customerdatails')->find($id);
    }

    //==chart===//

    public  function getliveProjectchart($id, $type)
    {
        $project = $this->model->find($id);
        $employee =  Employees::find($project->created_by);
        $projechtchart =  isset($project->gantt_chart_data) ? json_decode($project->gantt_chart_data) : array();
        $totalcompletecount = array();
        $totaloverall = array();
        $rearr = array();
        $gnttname = array();
        $startOfWeek = date("Y-m-d", strtotime("Monday this week"));
        for ($i = 0; $i < 7; $i++) {
            $finddays[] = date("d-m-Y", strtotime($startOfWeek . " + $i day"));
        }

        for ($x = 2; $x >= 0; $x--) {
            $qutermonth[] = date('m-Y', strtotime(date('Y-m') . " -" . $x . " month"));
        }

        foreach ($projechtchart as $projectdata) {
            foreach ($projectdata->data as $key => $prodata) {
                $finalstatuspercentage = array();
                $overall = count($prodata->data);
                $totaloverall[] = $overall;
                //dd($totaloverall);
                foreach ($prodata->data as $finaldata) {

                    if (isset($finaldata->status) &&  $finaldata->status !=  '' && (in_array(date("d-m-Y", strtotime($finaldata->delivery_date)), $finddays)) && $type == 'weekly') {
                        $finalstatuspercentage[] =   $finaldata->status;
                    }
                    if (isset($finaldata->status) &&  $finaldata->status !=  '' && date("m-Y", strtotime($finaldata->delivery_date)) ==  date("m-Y")  && $type == 'monthly') {
                        $finalstatuspercentage[] =   $finaldata->status;
                    }
                    if (isset($finaldata->status) &&  $finaldata->status !=  '' && (in_array(date("m-Y", strtotime($finaldata->delivery_date)), $qutermonth)) && $type == 'weekly') {
                        $finalstatuspercentage[] =   $finaldata->status;
                    }
                    if (isset($finaldata->status) &&  $finaldata->status !=  '' && date("Y", strtotime($finaldata->delivery_date)) ==  date("Y")  && $type == 'Year') {
                        $finalstatuspercentage[] =   $finaldata->status;
                    }
                    $gnttname[] = $finaldata->task_list;
                    $days = (strtotime($finaldata->start_date) - strtotime($finaldata->end_date)) / (60 * 60 * 24);
                    $start  = date_create($finaldata->start_date);
                    $end    = date_create($finaldata->end_date); // Current time and date
                    $diff   = date_diff($start, $end);
                    $seriesdata[] = array(
                        'y' => $diff->days,
                        'color' => '#008ffb'
                    );
                }

                $completecount = count($finalstatuspercentage);
                $totalcompletecount[] = $completecount;
                $rearr[] = array(
                    'name' => $finaldata->get_task_list->task_list_name,
                    'completed' => round(($completecount / $overall) * 100), 2
                );
            }
        }
        //dd(json_encode($seriesdata));

        if (count($projechtchart) > 0) {

            $result = array(
                'overall' => round(((array_sum($totalcompletecount) / array_sum($totaloverall)) * 100), 2),
                'completed' => $rearr
            );
        }
        $result['project'] = $project;
        $result['lead'] = isset($employee) ? $employee->first_name : '';
        $result['count'] = $result;
        $result['series'] = $seriesdata;
        $result['categories'] = $gnttname;

        //dd($project);
        return $result;
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
        return [$seenBy, $role_id, $created_by];
    }


    public function getSharePointMasterFolders()
    {
        $formatFolder = [];
        $isPresentCustomerInput = false;
        $sharepointFolders = sharePointMasterFolder::where('status', '1')->get();
        foreach ($sharepointFolders as $sharepointFolder) {
            if ($isPresentCustomerInput == false && $sharepointFolder->name == "Customer Input") {
                $isPresentCustomerInput = true;
            }
            $formatFolder[] = [
                "isDirectory" => true,
                "name" => $sharepointFolder->name
            ];
        }

        if ($isPresentCustomerInput == false) {
            $formatFolder[] = ["isDirectory" => true, "name" => "Customer Input"];
        }
        return $formatFolder;
    }
    public function  EstablishNewProject($project_id)
    {
        $Project               = Project::find($project_id);
        // try {
            $invoicesFor24Seven = collect(json_decode($Project->invoicePlan->invoice_data)->invoices)->toArray();
            $SaveInvoices = new SoapController();
            $result = $SaveInvoices->SaveInvoices($invoicesFor24Seven);
        // } catch (\Throwable $th) {
        //     Log::info($th->getMessage());
        // } 
        $project_scheduler     = $this->getGranttChartTaskLink($project_id);
        $LiveProjectGranttTask = LiveProjectGranttTask::where('project_id', $project_id);
        $LiveProjectGranttTask->delete();
        LiveProjectGranttLink::where('project_id', $project_id)->delete();
        // dd($project_scheduler['data']->toArray());
        foreach ($project_scheduler['data']->toArray() as $key => $value) {
            LiveProjectGranttTask::create($value);
        }
        foreach ($project_scheduler['links']->toArray() as $key => $value) {
            LiveProjectGranttLink::updateOrCreate($value);
        }
        $taskArray = $LiveProjectGranttTask->get()->toArray();
        function getChlidNodes($task, $taskArray, $key_name)
        {
            $taskTempArray = [];
            foreach ($taskArray as $key => $innerTask) {
                if ($task['id'] == $innerTask['parent']) {
                    $taskTempArray[] = $innerTask;
                }
            }
            if (count($taskTempArray)) {
                $task[$key_name] = $taskTempArray;
                return $task;
            }
            return $taskTempArray;
        }
        $resultArray = [];
        foreach ($taskArray as $index => $task) {
            $data =  getChlidNodes($task, $taskArray, 'child');
            if (isset($data['child']) == 1) {
                $result = [];
                foreach ($data['child'] as $index => $innerTask) {
                    $result[]  = getChlidNodes($innerTask, $taskArray, 'child');
                }
                $data['child'] = $result;
                $resultArray[] = $data;
            }
        }
        foreach ($resultArray as $tasks) {
            $LiveProjectTasks = $Project->LiveProjectTasks()->create([
                'name'          => $tasks['text'],
                'start_date'    => $tasks['start_date'],
                'end_date'      => $tasks['end_date'],
                'project_id'    => $project_id,
                'parent'        => $tasks['parent'],
                'chart_task_id' => $tasks['id'],
            ]);
            if (isset($tasks['child']) && !empty($tasks['child'])) {
                foreach ($tasks['child'] as $sub_tasks) {
                    if ($sub_tasks['text'] ?? false) {
                        $LiveProjectSubTasks = $LiveProjectTasks->SubTasks()->create([
                            'name'          => $sub_tasks['text'],
                            'start_date'    => $sub_tasks['start_date'],
                            'end_date'      => $sub_tasks['end_date'],
                            'project_id'    => $project_id,
                            'parent'        => $sub_tasks['parent'],
                            'chart_task_id' => $sub_tasks['id'],
                        ]);
                        if (isset($sub_tasks['child']) && !empty($sub_tasks['child'])) {
                            foreach ($sub_tasks['child'] as $sub_sub_tasks) {
                                $LiveProjectSubTasks->SubSubTasks()->create([
                                    'name'          => $sub_sub_tasks['text'],
                                    // 'assign_to'     => $sub_sub_tasks['assign_to'],
                                    'start_date'    => $sub_sub_tasks['start_date'],
                                    'end_date'      => $sub_sub_tasks['end_date'],
                                    'project_id'    => $project_id,
                                    'parent'        => $sub_sub_tasks['parent'],
                                    'chart_task_id' => $sub_sub_tasks['id'],
                                ]);
                            }
                        }
                    }
                }
            }
        }

        return true;
    }

    public function bindTodoList($request)
    {
        $project              =     Project::findOrFail($request['project_id']);
        $project_manager_id   =     Role::where('slug', config('global.project_manager'))->first();
        $project_manager      =     Employees::where('job_role', $project_manager_id->id)->where('status', 1)->first();

        $start_date     =   $project->start_date;
        $end_date       =   $project->delivery_date;
        $list           =   CheckList::where("name",  '=', $request['data'])->with('getTaskList')->latest()->get();

        $grouped    =   $list->groupBy('task_list_category')->map(function ($item) use ($start_date, $end_date, $project_manager) {
            $tasks  =   $item->map(function ($task) use ($start_date, $end_date, $project_manager) {
                $task->{"start_date"}    = $start_date;
                $task->{"end_date"}      = $end_date;
                // $task->assign_to = (string)$project_manager->id ?? "";
                $task->assign_to = $project_manager->id ?? null;
                return $task;
            });
            return [
                'name'          => $item[0]->getTaskList->task_list_name,
                'data'          => $tasks,
                'start_date'    => $item[0]->start_date,
                'end_date'      => $item[count($item) - 1]->end_date
            ];
        });

        return [
            "name"               => $request['data'],
            "project_start_date" => SetDateFormat($project->start_date),
            "project_end_date"   => SetDateFormat($project->delivery_date),
            "data"               => $grouped
        ];
    }
}
