<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LiveProjectController extends Controller
{
    public function index($menu_type)
    {
        $wizard_menus = config('live-project.wizard_menus');
        return view('live-projects.index', compact('wizard_menus'));
    }

    public function store(Request $request)
    {
        // dd($request->menu_type);
        return redirect()->route('live-project.menus-index',["menu_type" => $request->menu_type]);
    }
}
