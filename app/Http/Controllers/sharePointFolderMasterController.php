<?php

namespace App\Http\Controllers;

use App\Models\sharePointMasterFolder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class sharePointFolderMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all(){
        return response()->json([
            'data'=>SharePointMasterFolder::all()
        ]);
    }
    public function index(Request $req)
    {
       
        return view('admin.setup.files.files'); 
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
    public function store(Request $req)
    {
        $state=SharePointMasterFolder::create([
            'name'=>$req->input('share_point_folder_name'),
            'status'=>$req->input('is_active')
        ]);
         
        if($state){
            return response()->json([
                'message'=>'folder added',
                'folders'=>$state
            ]);
        }
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
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req,$id)
    {   
        
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
    public function stateChange(Request $req){
         $state=SharePointMasterFolder::find($req->input('id'));
        if($req->input('status')=='1'){
            $state->status='0';
            $state->save();
            return response()->json([
                'state'=>'changes to 0'
            ]);
        }
        else{
            $state->status='1';
            $state->save();
            return response()->json([
                'state'=>'changes to 1'
            ]);
        }
    }
    public function getFolder(Request $req){
        $folder=SharePointMasterFolder::find($req->input('id'));
        return response()->json([
            'data'=>$folder
        ]);
    }
    public function folderUpdate(Request $req){
        $folder=SharePointMasterFolder::find($req->input('id'));
        $folder->name=$req->input('name');
        $folder->status=$req->input('status');
        $folder->save();
        if($folder){
            return response()->json([
                'msg'=>'form has updated'
            ]);
        }
    }
    public function deleteFolder(Request $req){
        $folder=SharePointMasterFolder::find($req->input('id'))->delete();
        if($folder){
            return response()->json([
                'msg'=>'folder deleted'
            ]);
        }
    }


    public function finalDelivery($id)
    {
        sharePointMasterFolder::find($id)->update(['is_final_delivery'=> 1]);
        sharePointMasterFolder::where('id','!=',$id)->update(['is_final_delivery'=>0]);
        return response(['status' => true, 'msg' =>__('Final delivery folder set successfully')], Response::HTTP_OK);
    }
}
