<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class CommonController extends Controller
{
    public function issues(Request $request)
    {
        if ($request->ajax()) {
            $table = DataTables::of(getIssuesByUserId(AuthUserData()->id));
            $table->addIndexColumn();
            $table->addColumn('issue_id', function ($row) { // '.Project()->reference_number.'.
                $count  = $row->IssueComments->where('unread', 0)->count();
                $countTemp = '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">' . $count . '</span>';
                $count = $count != 0 ?  $countTemp : "";
                if (is_null($row->VariationOrder)) {
                    return '<button type="button" class="btn-quick-view" onclick="showIssue(' . $row->id . ' , this)" >' . $row->issue_id . $count . '</button>';
                }
                return '<button type="button" class="btn-quick-view bg-warning fw-bold shadow-none border-dark border text-dark" onclick="showIssue(' . $row->id . ' , this)" >' . $row->issue_id . $count . '</button>';
            });
            $table->addColumn('issue_type', function ($row) {
                if ($row->type == 'INTERNAL') {
                    return '<small class="badge bg-danger rounded-pill"><i style="transform: rotate(-45deg)" class="fa fa-ticket" aria-hidden="true"></i> Internal</small>';
                } else {
                    return '<small class="badge badge-danger-lighten rounded-pill"><i style="transform: rotate(-45deg)" class="fa fa-ticket" aria-hidden="true"></i> External</small>';
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
            $table->rawColumns(['issue_id', 'priority_type', 'status_type', 'issue_type', 'requested_date']);
            return $table->make(true);
        }
        return view('issues.index');
    }
    public function issues_by_project(Request $request, $id)
    {
        $project = Project::find($id);
        session()->put('current_project', $project);
        return view('issues.show', compact('project'));
    }
    public function issues_project_dashboard(Request $request)
    {
        if ($request->ajax()) {
            $dataDb = Project::with('Issues', 'Issues.IssueComments')->select('*');
            return DataTables::eloquent($dataDb)
                ->editColumn('reference_number', function ($row) {
                    $issues = getIssuesByProjectId($row->id);
                    $count = 0;
                    foreach ($issues->get() as $key => $value) {
                        $count  += $value->IssueComments->where('unread', 0)->count();
                    }
                    $countTemp = '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">' . $count . '</span>';
                    $count = $count != 0 ?  $countTemp : "";
                    return ' <button type="button" onclick="LiveProjectQuickView(' . $row->id . ' , this)"  class="btn-quick-view"  >
                                <b>' . $row->reference_number . '</b> ' . $count . '
                            </button>';
                })
                ->editColumn('start_date', function ($row) {
                    $format = config('global.model_date_format');
                    return Carbon::parse($row->start_date)->format($format);
                })
                ->editColumn('delivery_date', function ($row) {
                    $format = config('global.model_date_format');
                    return Carbon::parse($row->delivery_date)->format($format);
                })
                ->editColumn('opened', function ($row) {
                    return issuesCount($row, ['OPEN', 'NEW']);
                })
                ->editColumn('closed', function ($row) {
                    return issuesCount($row, ['CLOSED']);
                })
                ->editColumn('total_issues', function ($row) {
                    return issuesCount($row, 'ALL');
                })
                ->editColumn('action', function ($row) {
                    return "<a href=" . route('issues.show', $row->id) . " class='border btn-sm rounded-pill btn-success'><i class='fa fa-eye'></i></a>";
                })
                ->rawColumns(['reference_number', 'action', 'total_issues', 'opened', 'closed'])
                ->make(true);
        }
        return view('issues.dashboard');
    }
}
