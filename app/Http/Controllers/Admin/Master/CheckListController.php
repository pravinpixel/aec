<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Models\CheckList;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CheckListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CheckList::latest()->get();
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
        CheckList::create([
            'name'                =>  $request->name,
            'is_active'           =>  $request->is_active,
            'task_list'           =>  $request->task_list,
            'task_list_category'  =>  $request->task_list_category,
        ]);

        return response()->json([
            'status'    => true, 
            'msg'       => trans('module.inserted')
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $CheckList  =   CheckList::findOrFail($id);

        return response()->json([
            'status'    =>  true, 
            'data'      =>  $CheckList
        ], Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        CheckList::find($id)->update($request->all());

        return response()->json([
            'status'    => true, 
            'msg'       => trans('module.updated')
        ], Response::HTTP_OK); 
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CheckList::find($id)->delete();

        return response()->json([
            'status'    => true, 
            'msg'       => trans('module.deleted')
        ], Response::HTTP_OK);
    }
}
