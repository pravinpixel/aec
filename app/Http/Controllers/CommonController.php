<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CommonController extends Controller
{
    public function issues(Request $request)
    {
        if ($request->ajax()) {
            $dataDb = Project::with('Issues')->select('*');
           
            return DataTables::eloquent($dataDb)
                ->editColumn('reference_number', function ($row) {
                     return ' <button type="button" onclick="LiveProjectQuickView(' . $row->id . ' , this)"  class="btn-quick-view"  >
                                <b>' . $row->reference_number . '</b>
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
                    return issuesCount($row,['OPEN','NEW']); 
                }) 
                ->editColumn('closed', function ($row) { 
                    return issuesCount($row,['CLOSED']); 
                })
                ->editColumn('total_issues', function ($row) { 
                    return issuesCount($row,'ALL'); 
                }) 
                ->editColumn('action', function ($row) {
                    return "<button onclick='viewIssueByProject(".$row->id.")' class='border rounded-pill btn-success'><i class='fa fa-eye'></i></button>";
                }) 
                ->rawColumns(['reference_number','action','total_issues','opened','closed'])
                ->make(true);
        }
        return view('issues.index');
    }
}
