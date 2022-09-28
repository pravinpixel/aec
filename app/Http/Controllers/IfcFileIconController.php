<?php

namespace App\Http\Controllers;

use App\Models\IfcFilesIcons;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Laracasts\Flash\Flash;
use Image;
class IfcFileIconController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.setup.ifc-files.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => "required|unique:ifc_files_icons,type"
        ]);

        $compressedFile = Image::make($request->file('icon'))->resize(20, null, function ($constraint) {
            $constraint->aspectRatio();
        })->encode();

        $fileName = $request->type.".png";

        Storage::put("ifc-icons/".$fileName, $compressedFile);

        IfcFilesIcons::create([
            'type' => $request->type,
            'icon' => $fileName
        ]);

        Flash::success('New File Icon Created!');
        return redirect()->route('setup.ifc-file-icon');
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
        $file   =   IfcFilesIcons::findOrFail($id);
        return view('admin.setup.ifc-files.edit',compact('file'));
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
        $file   =   IfcFilesIcons::findOrFail($request->id);

        $compressedFile = Image::make($request->file('icon'))->resize(20, null, function ($constraint) {
            $constraint->aspectRatio();
        })->encode();
        
        $fileName = $request->type.".png";
        Storage::put("ifc-icons/".$fileName, $compressedFile);

        if(Storage::exists('ifc-icons/'.$file->icon)) {
            Storage::delete('ifc-icons/'.$file->icon);
        }
        $file->update([
            'type' => $request->type ?? $file->type,
            'icon' => $fileName ?? $file->icon
        ]);
        Flash::success('File Icon Updated!');
        return redirect()->route('setup.ifc-file-icon');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $file   =   IfcFilesIcons::findOrFail($request->id);
        if(Storage::exists('ifc-icons/'.$file->icon)) {
            Storage::delete('ifc-icons/'.$file->icon);
        }
        $file->delete();
        Flash::success('File Icon Deleted!');
        return redirect()->route('setup.ifc-file-icon');
    }
}