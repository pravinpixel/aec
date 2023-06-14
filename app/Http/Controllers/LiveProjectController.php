<?php

namespace App\Http\Controllers;

use App\Mail\liveProject\variationMail;
use App\Mail\variationVersionMail;
use App\Models\InvoicePlan;
use App\Models\IssueComments;
use App\Models\Issues;
use App\Models\LiveProjectGranttTask;
use App\Models\LiveProjectSubSubTasks;
use App\Models\LiveProjectSubTasks;
use App\Models\Project;
use App\Models\projectComments;
use App\Models\VariationOrder;
use App\Models\VariationOrderVersions;
use App\Repositories\LiveProjectRepository;
use App\View\Components\ChatBox;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Laracasts\Flash\Flash;
use Yajra\DataTables\DataTables;
use App\Models\LiveProjectTasks;
use App\Repositories\ProjectRepository;

class LiveProjectController extends Controller
{
    protected $LiveProjectRepository, $projectRepo;

    public function __construct(LiveProjectRepository $LiveProjectRepository, ProjectRepository $projectRepo)
    {
        $this->LiveProjectRepository  = $LiveProjectRepository;
        $this->projectRepo        = $projectRepo;
    }

    public function index($menu_type, $id = null)
    {
        return $this->LiveProjectRepository->wizard_tabs_index($menu_type, $id);
    }

    public function store(Request $request, $menu_type, $id)
    {
        if ($request->form_type == 'CREATE_ISSUE' || $request->form_type == 'EDIT_ISSUE') {
            $result = $this->LiveProjectRepository->wizard_tabs_store($request, $menu_type, $id);
            if ($result) return redirect()->back()->with('success', "Successfuly Saved!");
            return redirect()->back()->with('info', "Invalid action");
        }
        if ($menu_type == 'project-comments') {
            $this->project_comments($request, $id);
        }
        if ($menu_type == 'project-closure') {
            unset($request['_token']);
            $this->project_closure($request, $id);
            return redirect()->route('live-project.completed')->with('success', "Project Closed success!");
        }
        return redirect()->route('live-project.menus-index', ["menu_type" => $request->menu_type, "id" => $id]);
    }
    public function project_closure($request, $id)
    {
        $project = Project::find($id);
        foreach ($request->except('url') as $key => $value) {
            $project->projectClosure()->updateOrCreate(['project_id' => $id, "question" => $key], [
                'project_id' => $id,
                "question" => $key,
                "answer" => $value,
            ]);
        }
        $project->update([
            'status' => 'LIVE_PROJECT_COMPLETED',
            'share_point_folder_link' => json_encode($request->url)
        ]);
    }
    public function project_comments($request, $id)
    {
        if (isset($request->internal)) {
            projectComments::updateOrCreate(['project_id' => $id], [
                "internal" => $request->internal,
                "action_by" => AuthUserData()->full_name
            ]);
        }
        if (isset($request->external)) {
            projectComments::updateOrCreate(['project_id' => $id], [
                "external" => $request->external,
                "action_by" => AuthUserData()->full_name
            ]);
        }
    }
    public function milestones_index($project_id)
    {
        return $this->LiveProjectRepository->get_milestones($project_id);
    }

    public function store_milestones(Request $request, $project_id)
    {
        return $this->LiveProjectRepository->store_milestones($project_id, $request);
    }

    public function update_milestones(Request $request, $project_id, $task_id)
    {
        return $this->LiveProjectRepository->update_milestones($project_id, $task_id, $request);
    }
    public function destroy_milestones($project_id, $task_id)
    {
        return $this->LiveProjectRepository->destroy_milestones($task_id);
    }
    public function store_milestones_link(Request $request, $project_id)
    {
        return $this->LiveProjectRepository->store_milestones_link($project_id, $request);
    }
    public function destroy_milestones_link($project_id, $link_id)
    {
        return $this->LiveProjectRepository->destroy_milestones_link($project_id, $link_id);
    }

    public function task_list_index($project_id)
    {
        $project = $this->LiveProjectRepository->task_list_index($project_id);
        return response()->json([
            "status" => true,
            "view"   => "$project"
        ]);
    }

    public function sub_task_index($task_id)
    {
        $view = $this->LiveProjectRepository->get_sub_task_view($task_id);
        return response()->json([
            "status" => true,
            "view"   => "$view"
        ]);
    }

    public function sub_task_change_order_index(Request $request)
    {
        foreach ($request->data as $key => $task) {
            LiveProjectSubSubTasks::find($task)->update([
                'sort_order' =>  $key + 1
            ]);
        }
        return response()->json([
            "status" => true
        ]);
    }

    public function update_sub_sub_task(Request $request, $sub_sub_task_id)
    {
        $task = LiveProjectSubSubTasks::find($sub_sub_task_id);
        if ($request->type == 'name') {
            LiveProjectGranttTask::find($task->chart_task_id)->update([
                'text' => $request->value
            ]);
        }
        $task->update([
            $request->type => $request->value
        ]);
        return response()->json([
            "status" => true
        ]);
    }
    public function delete_sub_sub_task($sub_sub_task_id)
    {
        $LiveProjectSubSubTasks = LiveProjectSubSubTasks::find($sub_sub_task_id);
        LiveProjectGranttTask::find($LiveProjectSubSubTasks->parent)->delete();
        $sub_task_id = $LiveProjectSubSubTasks->sub_task_id;
        $LiveProjectSubSubTasks->delete();
        $result = $this->LiveProjectRepository->getSubTaskProgress($sub_task_id);
        return response()->json([
            "status"   => true,
            "progress" => "$result"
        ]);
    }
    public function create_sub_task(Request $request, $sub_task_id)
    {
        $LiveProjectSubTasks = LiveProjectSubTasks::find($sub_task_id);

        $LiveProjectGranttTask = LiveProjectGranttTask::create([
            "text"          => $request->TaskName,
            'start_date'    => $request->StartDate,
            'end_date'      => $request->EndDate,
            'delivery_date' => $request->DeliveryDate,
            "parent"        => $LiveProjectSubTasks->chart_task_id,
            "type"          => 'project',
            "status"        => 1,
            "project_id"    => $LiveProjectSubTasks->project_id
        ]);
        $LiveProjectSubTasks->SubSubTasks()->create([
            'name'          => $request->TaskName,
            'assign_to'     => $request->AssignTo,
            'start_date'    => $request->StartDate,
            'end_date'      => $request->EndDate,
            'delivery_date' => $request->DeliveryDate,
            "chart_task_id" => $LiveProjectSubTasks->chart_task_id,
            "parent"        => $LiveProjectGranttTask->id,
            'status'        => 0
        ]);
        return response()->json([
            "status" => true
        ]);
    }
    public function delete_sub_task($sub_task_id)
    {
        $LiveProjectSubTasks = LiveProjectSubTasks::with('SubSubTasks')->find($sub_task_id);
        LiveProjectGranttTask::find($LiveProjectSubTasks->chart_task_id)->delete();
        LiveProjectGranttTask::where('parent', $LiveProjectSubTasks->chart_task_id)->delete();
        $LiveProjectSubTasks->update(['status' => 0]);
        if (!is_null($LiveProjectSubTasks->SubSubTasks)) {
            $LiveProjectSubTasks->SubSubTasks()->delete();
        }
        $LiveProjectSubTasks->delete();
        return response()->json([
            "status"   => true,
        ]);
    }

    public function set_progress(Request $request, $project_id)
    {
        $result = $this->LiveProjectRepository->task_status_update_and_index($project_id, $request);

        return response()->json([
            "status" => true,
            "progress" => "$result",
        ]);
    }
    public function issues(Request $request, $id)
    {
        if ($request->ajax()) {
            $Issues = $id != 0 ? getIssuesByProjectId($id) : getIssuesByUserId(AuthUserData()->id);
            if ($request->filters) {
                $Issues->when(isset($request->filters['Priority']), function ($q) use ($request) {
                    $q->where('priority', $request->filters['Priority']);
                });
                $Issues->when(isset($request->filters['Status']), function ($q) use ($request) {
                    $q->where('status', $request->filters['Status']);
                });
                $Issues->when(isset($request->filters['IssueType']), function ($q) use ($request) {
                    $q->where('type', $request->filters['IssueType']);
                });
                $Issues->when(isset($request->filters['IssueId']), function ($q) use ($request) {
                    $q->where('issue_id', $request->filters['IssueId']);
                });
                $Issues->when(isset($request->filters['DueStartDate']) && isset($request->filters['DueEndDate']), function ($q) use ($request) {
                    $q->whereDate('due_date', '>=', $request->filters['DueStartDate']);
                    $q->whereDate('due_date', '<=', $request->filters['DueEndDate']);
                });
                $Issues->when(isset($request->filters['RequestStartDate']) && isset($request->filters['RequestEndDate']), function ($q) use ($request) {
                    $q->whereDate('created_at', '>=', $request->filters['RequestStartDate']);
                    $q->whereDate('created_at', '<=', $request->filters['RequestEndDate']);
                });
            }
            $table = DataTables::of($Issues);
            $table->addIndexColumn();
            $table->addColumn('issue_id', function ($row) { // '.Project()->reference_number.'.
                $count  = $row->MyIssueComments->count();
                $countTemp = '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">' . $count . '</span>';
                $count = $count != 0 ?  $countTemp : "";
                if (is_null($row->VariationOrder)) {
                    return '<button type="button" class="btn-quick-view" onclick="showIssue(' . $row->id . ' , this)" >' . $row->issue_id . $count . '</button>';
                }
                return '<button type="button" class="btn-quick-view bg-warning fw-bold shadow-none border-dark border text-dark" onclick="showIssue(' . $row->id . ' , this)" >' . $row->issue_id . $count . '</button>';
            });
            $table->addColumn('issue_type', function ($row) {
                if ($row->type == 'INTERNAL') {
                    return '<span class="text-primary fw-bold">• <small>Internal</small></b></span>';
                } else {
                    return '<span class="text-danger fw-bold">• <small>External</small></b></span>';
                }
            });
            $table->addColumn('requested_date', function ($row) {
                return Carbon::parse($row->created_at)->format('Y-m-d');
            });
            $table->addColumn('title_type', function ($row) {
                return Str::limit($row->title, 28, ' ...');
            });
            $table->addColumn('status_type', function ($row) {
                return '<span class="badge text-dark border rounded-pill">' . __('project.' . $row->status) . '</span>';
            });
            $table->addColumn('priority_type', function ($row) {
                if ($row->priority == 'CRITICAL') {
                    return "<small>🔴 " . ucfirst(strtolower($row->priority)) . " </small>";
                } elseif ($row->priority == 'HIGH') {
                    return "<small>🟠 " . ucfirst(strtolower($row->priority)) . " </small>";
                } elseif ($row->priority == 'MEDIUM') {
                    return "<small>🟡 " . ucfirst(strtolower($row->priority)) . " </small>";
                } elseif ($row->priority == 'LOW') {
                    return "<small>🟢 " . ucfirst(strtolower($row->priority)) . " </small>";
                }
            });
            $table->addColumn('action', function ($row) {
                $btnConvert = '';
                $actionButtons = '';
                if (AuthUser() == 'ADMIN') {
                    if ($row->type == "EXTERNAL" || !is_null($row->VariationOrder)) {
                        $btnConvert = '<button type="button" onclick="convertVariation(' . $row->id . ',this)" title="Convert to variation Order" class="dropdown-item"><i class="fa fa-share me-1"></i> Convert Variation</button>';
                    }
                }
                if ($row->requester_role === AuthUser() || AuthUser() === 'ADMIN') {
                    $actionButtons = '<button type="button" onclick=editIssue(' . $row->id . ',this) class="dropdown-item"><i class="fa fa-pen me-1"></i> Edit</button><button type="button" onclick="deleteIssue(' . $row->id . ',this)"  class="dropdown-item text-danger"><i class="fa fa-trash me-1"></i> Delete</button>';
                }
                if(empty($btnConvert) && empty($actionButtons)) {
                    return '<span onclick="showIssue('.$row->id.',this)" title="View" class="mx-1"><i class="fa fa-eye text-success"></i></span>';
                }
                return '<div class="dropdown text-center">
                            <button class="btn btn-sm btn-light border" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                ' . $btnConvert . '
                                <button type="button" onclick=showIssue(' . $row->id . ',this) class="dropdown-item"><i class="fa fa-eye me-1"></i> View </button>
                                ' . $actionButtons . ' 
                            </div>
                        </div>';
            });
            // <button type="button" onclick="SendMailVersion(' . $row->id . ',this)" class="dropdown-item"><i class="fa fa-envelope me-1"></i> Send</button>
            $table->rawColumns(['action', 'issue_id', 'priority_type', 'status_type', 'issue_type', 'requested_date']);
            return $table->make(true);
        }
    }

    public function show_issues($id)
    {
        $issue = Issues::with('IssuesAttachments', 'IssueComments', 'IssueComments')->find($id);
        $issue->status == 'NEW' ?  $issue->update(['status' => 'OPEN']) : null;
        $view  = view('live-projects.templates.issues-model', compact('issue'));
        return response([
            "view"  => "$view"
        ]);
    }
    public function edit_issue($id)
    {
        $issue = Issues::with('IssuesAttachments')->find($id);
        $view  = view('live-projects.templates.edit-issues-model', compact('issue'));
        return response([
            "view"  => "$view",
        ]);
    }
    public function create_issue_variation($id)
    {
        $issue = Issues::find($id);
        $view  = view('live-projects.templates.create-variation', compact('issue'));
        return response([
            "view"  => "$view",
        ]);
    }
    public function delete_issues($id)
    {
        try {
            $issue = Issues::with('IssuesAttachments')->find($id);
            foreach ($issue->IssuesAttachments as $attachment) {
                Storage::delete($attachment->file_path);
            }
            $issue->delete();
            return response([
                "status"  => true,
            ]);
        } catch (\Throwable $th) {
            return response([
                "status"  => false,
            ]);
        }
    }
    public function change_status_issues(Request $request, $id)
    {
        Issues::find($id)->update([
            "status"  => $request->status,
            "remarks" => $request->remarks ?? null
        ]);
        return response([
            "status"  => true,
        ]);
    }
    public function store_issue_variation(Request $request, $id)
    {
        $issue = Issues::with('VariationOrder')->find($id);
        if (is_null($issue->VariationOrder)) {
            $VariationOrder = $issue->VariationOrder()->create([
                'project_id'  => $issue->project_id
            ]);
            $totalVersion = count($VariationOrder->VariationOrderVersions);
            $VariationOrderVersion = $VariationOrder->VariationOrderVersions()->create([
                'version'     => 'R ' . $totalVersion,
                'project_id'  => $issue->project_id,
                'title'       => $request->title,
                'hours'       => $request->hours,
                'price'       => $request->price,
                'description' => $request->description
            ]);
            Flash::success('Variation Order Created !');
            if ((bool) $request->send_mail) {
                $customer = getCustomerByProjectId($issue->project_id);
                sendMail(new variationMail(), [
                    "name"         => $customer->full_name,
                    "avatar"       => $customer->image,
                    "email"        => $customer->email,
                    "mobile_no"    => $customer->mobile_no,
                    "company_name" => $customer->company_name,
                    "project_name" => Project::find($issue->project_id)->project_name,
                    "variation"    => $VariationOrderVersion
                ]);
            }
            $menu_type = 'variation-orders';
        } else {
            Flash::error('Variation Order Already Exist !');
        }
        return redirect()->route(
            'live-project.menus-index',
            [
                'menu_type' => $menu_type ?? session()->get('menu_type'),
                'id'        => session()->get('current_project')->id
            ]
        );
    }
    public function variation_order($id)
    {
        $variations = VariationOrder::with('Issues', 'VariationOrderVersions')->where('project_id', $id)->select('*');
        $table      = DataTables::of($variations->get());
        $table->addColumn('variation_id', function ($row) {
            return $row->issues->issue_id;
            //  '<button type="button" class="btn-quick-view bg-warning fw-bold shadow-none border-dark border text-dark" onclick="showVariationOrder(' . $row->id . ',this)" >' . $row->issues->issue_id . '</button>';
        });
        $table->addColumn('total_versions', function ($row) {
            return count($row->VariationOrderVersions);
        });
        $table->addColumn('action', function ($row) {
            if (AuthUser() == 'ADMIN') {
                return '
                    <span onclick="showVariationOrder(' . $row->id . ',this)" title="View" class="mx-1 text-success"><i class="fa fa-eye"></i></span>
                    <span onclick="deleteVariationOrder(' . $row->id . ',this)" title="Cancel Variation Order" class="mx-1"><i class="fa fa-ban text-danger"></i> Cancel</span>
                ';
            }
            return '<span onclick="showVariationOrder(' . $row->id . ',this)" title="View" class="mx-1 text-success"><i class="fa fa-eye"></i></span>';
        });
        $table->rawColumns(['action', 'variation_id']);
        return $table->make(true);
    }
    public function show_variation_order($id)
    {
        $variation = VariationOrder::with('Issues')->find($id);
        $view = view('live-projects.templates.show-variation-order', compact('variation'));
        return response([
            "view"  => "$view",
        ]);
    }
    public function delete_variation_order($id)
    {
        $variation = VariationOrder::find($id);
        if ($variation->delete()) {
            return response([
                "status"  => true,
            ]);
        }
    }
    public function variation_version($id)
    {
        $variations = VariationOrderVersions::where('variation_id', $id)->select('*');
        $table      = DataTables::of($variations->get());
        $table->addIndexColumn();
        $table->addColumn('version_id', function ($row) {
            return '<button type="button" class="btn-quick-view bg-warning fw-bold shadow-none border-dark border text-dark" onclick=ViewVersion(' . $row->id . ',"VIEW") >
                    ' . $row->version . '
                </button>';
        });
        $table->addColumn('status', function ($row) {
            return VariationStatus($row->status);
        });
        $table->addColumn('total_price', function ($row) {
            return (int) $row->hours *  (int) $row->price;
        });
        $table->addColumn('action', function ($row) {
            $chatButton = new ChatBox(
                "CHAT_LINK_ICON",
                "project",
                $row->project_id,
                "VARIATION_ORDER_" . str_replace(' ', '_', $row->version)
            );
            return '<div class="dropdown btn-group">
                        <button class="btn btn-sm btn-light border" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">' . variationOrderMenu($row) . '</div>
                        ' . $chatButton->render() . '
                    </div>';
        });
        $table->rawColumns(['action', 'status', 'version_id', 'total_price']);
        return $table->make(true);
    }
    public function view_version($id, $mode)
    {
        $variation = VariationOrderVersions::find($id);
        $view      = view('live-projects.templates.view-variation-version', compact('variation', 'mode'));
        return response([
            "view"  => "$view",
        ]);
    }
    public function duplicate_version(Request $request, $id)
    {
        $request['variation_id'] = $id;
        $this->store_version($request, $id, 'DUPLICATE');
        return response([
            "status" => true
        ]);
    }
    public function  store_version(Request $request, $id, $mode)
    {
        if ($mode === 'DUPLICATE') {
            $variationVersions  = VariationOrderVersions::where('variation_id', $request->variation_id)->get();
            foreach ($variationVersions as $key => $variation) {
                $variation->update(["status" => 'OBSOLETE']);
            }
            $totalVersion       = count($variationVersions);
            $request['version'] = 'R ' . $totalVersion;
            $request['staus']   = 'NEW';
            VariationOrderVersions::create($request->all());
        } elseif ($mode === 'EDIT') {
            VariationOrderVersions::find($id)->update($request->all());
        }
        return response([
            "status" => true,
            "message" => 'Changes Saved!',
            "variation_id" => $request->variation_id
        ]);
    }
    public function delete_version($id)
    {
        $version = VariationOrderVersions::find($id);
        $variation_id = $version->variation_id;
        if ($version->delete()) {
            return response([
                "status"       => true,
                "variation_id" => $variation_id
            ]);
        }
    }
    public function send_mail_version($id)
    {
        $version = VariationOrderVersions::findOrFail($id);
        Mail::to(getCustomerByProjectId($version->project_id)->email)->send(new variationVersionMail($version));
        $version->update([
            "status" => 'SENT'
        ]);
        return response([
            "status"       => true,
            "message"      => 'Mail was sent succesfully !',
            "variation_id" => $version->variation_id
        ]);
    }

    public function get_invoice_by_project($id)
    {
        $data = InvoicePlan::where('project_id', $id)->first();
        return [
            "id"            => $data->id,
            "no_of_invoice" => $data->no_of_invoice,
            "project_cost"  => $data->project_cost,
            "project_id"    => $data->project_id,
            "invoices"      => json_decode($data->invoice_data)->invoices
        ];
    }
    public function create_comment(Request $request, $id)
    {
        $issue      = Issues::with('IssueComments')->find($id);
        $customer   = getCustomerByProjectId($issue->project_id);

        if (AuthUser() == 'CUSTOMER') {
            $reciver_id   = $issue->request_id;
            $reciver_name = getEmployeeById($issue->request_id)->display_name;
            $reciver_role = 'ADMIN';
        } else {
            $reciver_id   = $customer->id;
            $reciver_name = getUser($issue->assignee_id)->first_name;
            $reciver_role = 'CUSTOMER';
        }

        $issue->IssueComments()->create([
            'comment'             => $request->comment,
            'sender_id'           => AuthUserData()->id,
            'sender_name'         => AuthUserData()->first_name,
            'sender_role'         => AuthUser(),
            'sender_read_status'  => false,
            'reciver_id'          => $reciver_id,
            'reciver_name'        => $reciver_name,
            'reciver_role'        => $reciver_role,
            'reciver_read_status' => false
        ]);
        $comments = Issues::with('IssueComments')->find($id)->IssueComments;
        return view('live-projects.templates.issue-comments', compact('comments'));
    }
    public function delete_comment($comment_id)
    {
        $issue    = IssueComments::find($comment_id);
        $issue_id = $issue->issue_id;
        $issue->delete();
        $comments = Issues::with('IssueComments')->find($issue_id)->IssueComments;
        return view('live-projects.templates.issue-comments', compact('comments'));
    }
    public function update_comment(Request $request, $comment_id)
    {
        IssueComments::find($comment_id)->update([
            'comment' => $request->comment
        ]);
        return response([
            "status" => true
        ]);
    }
    public function set_comment_count($id)
    {
        IssueComments::where('issue_id', $id)
            ->where('reciver_id', AuthUserData()->id)
            ->where('reciver_role', userRole()['slug'])
            ->update(['reciver_read_status' => 1]);
        return response([
            "status" => true
        ]);
    }
    public function completed_project(Request $request)
    {
        if ($request->ajax()) {
            $dataDb = Project::where('status', 'LIVE_PROJECT_COMPLETED')->select('*');
            return DataTables::of($dataDb)
                ->editColumn('reference_number', function ($dataDb) {
                    return '
                        <button type="button" class="btn-quick-view" onclick="ProjectQuickView(' . $dataDb->id . ' , this)" >
                            <b>' . $dataDb->reference_number . '</b>
                            ' . getModuleChatCount('ADMIN', 'project', $dataDb->id) . '
                        </button>
                    ';
                })
                ->editColumn('start_date', function ($dataDb) {
                    $format = config('global.model_date_format');
                    return Carbon::parse($dataDb->start_date)->format($format);
                })
                ->editColumn('delivery_date', function ($dataDb) {
                    $format = config('global.model_date_format');
                    return Carbon::parse($dataDb->delivery_date)->format($format);
                })
                ->addColumn('pipeline', function ($dataDb) {
                    return '
                        <div class="progress bg-light border" style="position:relative;"> 
                            <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: 100%;" aria-valuenow="100%" aria-valuemin="0" aria-valuemax="100">
                                <small class="smallTag">100%</small>
                            </div>
                        </div>
                    ';
                })
                // ->addColumn('action', function ($dataDb) {
                //     return '<div class="dropdown">
                //             <button class="btn btn-light btn-sm border shadow-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                //                 <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                //             </button>
                //             <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                //                 <a class="dropdown-item" href="' . route('edit-projects', $dataDb->id) . '">View / Edit</a>
                //                 <a type="button" class="dropdown-item delete-modal" data-header-title="Delete" data-title="Are you sure to delete this enquiry" data-action="' . route('enquiry.delete', $dataDb->id) . '" data-method="DELETE" data-bs-toggle="modal" data-bs-target="#primary-header-modal">Delete</a>
                //             </div>
                //         </div>';
                // })
                ->rawColumns(['pipeline', 'reference_number'])
                ->make(true);
        }
        return view('live-projects.completed-project');
    }

    public function create_task(Request $request, $id)
    {
        $task = $this->projectRepo->bindTodoList([
            "project_id" => $id,
            "data" => $request->task_id
        ]);
        $LiveProjectGranttTask = LiveProjectGranttTask::create([
            "text"             => $task['name'],
            "progress"         => "0.00",
            'start_date'       => $task['project_start_date'],
            'end_date'         => $task['project_end_date'],
            "parent"           => "0",
            "type"             => 'project',
            "project_id"       => $id,
            "status"           => 1,
            "project_end_date" => $task['project_end_date']
        ]);
        $LiveProjectTasks =  LiveProjectTasks::create([
            'name'          => $task['name'],
            'slug'          => Str::slug($task['name']),
            'start_date'    => $task['project_start_date'],
            'end_date'      => $task['project_end_date'],
            "chart_task_id" => $LiveProjectGranttTask->id,
            "project_id"    => $id,
            "parent"        => "0",
        ]);
        foreach ($task['data'] as $sub_task) {
            $subChart =  LiveProjectGranttTask::create([
                "text"          => $sub_task['name'],
                "progress"      => "0.00",
                'start_date'    => $task['project_start_date'],
                'end_date'      => $task['project_end_date'],
                "project_id"    => $id,
                "type"          => 'project',
                "parent"        => $LiveProjectGranttTask->id,
                "status"        => 1,
                "delivery_date" => $task['project_end_date'],
            ]);
            $LiveProjectSubTasks = LiveProjectSubTasks::create([
                'task_id'       => $LiveProjectTasks->id,
                'name'          => $sub_task['name'],
                'slug'          => Str::slug($sub_task['name']),
                'start_date'    => $task['project_start_date'],
                'end_date'      => $task['project_end_date'],
                "project_id"    => $id,
                'parent'        => $subChart->id,
                'chart_task_id' => $subChart->id
            ]);
            foreach($sub_task['data'] as $sub_sub_task) {
                $subSubChart =  LiveProjectGranttTask::create([
                    "text"          => $sub_sub_task['task_list'],
                    "progress"      => "0.00",
                    'start_date'    => $sub_sub_task['start_date'],
                    'end_date'      => $sub_sub_task['end_date'],
                    "project_id"    => $id,
                    "type"          => 'project',
                    "parent"        => $subChart->id,
                    "status"        => 1,
                    "delivery_date" => $sub_sub_task['end_date'],
                ]);
                LiveProjectSubSubTasks::create([
                    'sub_task_id'   => $LiveProjectSubTasks->id,
                    "name"          => $sub_sub_task['task_list'],
                    'start_date'    => $sub_sub_task['start_date'],
                    'end_date'      => $sub_sub_task['end_date'],
                    "delivery_date" => $sub_sub_task['end_date'],
                    "project_id"    => $id,
                    'parent'        => $subSubChart->id,
                    'chart_task_id' => $subSubChart->id
                ]);
            }
        } 
        return response()->json([
            "status" => true
        ]);
    }
    public function delete_task($id)
    {
        $task = LiveProjectTasks::find($id);
        LiveProjectGranttTask::find($task->chart_task_id)->delete();
        LiveProjectGranttTask::where('parent', $task->chart_task_id)->delete();
        foreach ($task->SubTasks as $sub) {
            $sub->SubSubTasks()->delete();
        }
        $task->SubTasks()->delete();
        $task->delete();
        return response()->json([
            "status" => true
        ]);
    }
}
