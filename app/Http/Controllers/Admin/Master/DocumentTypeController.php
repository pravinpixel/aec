<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Interfaces\DocumentTypeRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\DocumentType;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use App\Http\Requests\DocumentTypeCreateRequest;

class DocumentTypeController extends Controller
{
    protected $documentTypeRepo;
    public function __construct(DocumentTypeRepositoryInterface $documentTypeRepo)
    {
        $this->documentTypeRepo = $documentTypeRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return response()->json($this->documentTypeRepo->all());
        // $data = DocumentType::all();
        
        // if( !empty( $data ) ) {
        //     return response(['status' => true, 'data' => $data], Response::HTTP_OK);
        // } 
        // return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(DocumentTypeCreateRequest $request)
    {
        
        $module = new DocumentType;
        $module->document_type_name = $request->document_type_name;
        $module->slug = Str::slug($request->document_type_name, "_");
        $module->is_active = $request->is_active;
        if($request->is_mandatory == true)
        {
            $module->is_mandatory = 1;
        }
        else{
            $module->is_mandatory = 0;
        }
        $res = $module->save();
        if($res) {
            return response(['status' => true, 'data' => $res ,'msg' => trans('module.inserted')], Response::HTTP_OK);
        }
        return response(['status' => false ,'msg' => trans('module.something')], Response::HTTP_INTERNAL_SERVER_ERROR );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $data = DocumentType::find($id);
        if( !empty( $data ) ) {
            return response(['status' => true, 'data' => $data], Response::HTTP_OK);
        } 
        return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DocumentTypeCreateRequest $request, $id)
    {
        $module = DocumentType::find($id);
        if( empty( $module ) ) {
            return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
        } 
      
        $module->document_type_name = $request->document_type_name;
        
        $module->slug = Str::slug($request->document_type_name, "_");
        $module->is_active = $request->is_active;
        $module->is_mandatory =  !$module->is_mandatory;
        
        $res = $module->update();
        // $res = $module->update($request->only($module->getFillable()));
        if( $res ) {
            return response(['status' => true, 'msg' => trans('module.updated'), 'data' => $module], Response::HTTP_OK);
        }
        return response(['status' => false, 'msg' => trans('module.something')], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $module = DocumentType::find($id);
        if (empty($module)) {
            return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
        }
        $module->is_active = 2;
        $module->save();
        $module->delete();
        return response(['status' => true, 'msg' => trans('module.deleted')], Response::HTTP_OK);
    }
    public function document_status($id)
    {
        $module = DocumentType::find($id);

        if( empty( $module ) ) {
            return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
        } 
        $module->is_active = !$module->is_active;
        $res = $module->save();

        if( $res ) {
            return response(['status' => true, 'msg' => trans('module.status_updated'),  'data' => $module], Response::HTTP_OK);
        }
        return response(['status' => false, 'msg' => trans('module.something')], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
    public function document_mandatory($id)
    {
        $module = DocumentType::find($id);

        if( empty( $module ) ) {
            return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
        } 
        $module->is_mandatory = !$module->is_mandatory;
        $res = $module->save();

        if( $res ) {
            return response(['status' => true, 'msg' => trans('module.status_updated'),  'data' => $module], Response::HTTP_OK);
        }
        return response(['status' => false, 'msg' => trans('module.something')], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function get(Request $request)
    {
        return response()->json($this->documentTypeRepo->get($request));
    }
}
