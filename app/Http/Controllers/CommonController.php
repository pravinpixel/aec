<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function issues()
    {
        return view('issues.index');
    }
}
