<?php

namespace App\Http\Controllers;

use App\Models\Admin\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Laracasts\Flash\Flash;

class AdminAccountController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view("admin.account.index",compact('user'));
    }
    public function update(Request $request)
    {
        $this->store($request->all());
        Flash::success('Account Details Changed !');
        return back();
    }
    public function update_profile(Request $request)
    { 
        $current_image = str_replace(url('')."/storage/app/","",auth()->user()->image);

        if(Storage::exists($current_image)) {
            Storage::delete($current_image);
        }
 
        $image      = Storage::put('userProfiles', $request->image);
    
        $this->store([
            "image" => url('')."/storage/app/".$image
        ]);

        Flash::success('Account Details Changed !');
        return back();
    }
    public function change_password(Request $request)
    {
        $request->validate([
            'current_password' => 'required|min:8',
            'new_password'     => 'required|min:8',
            'confirm_password' => 'required|min:8',
        ]);

        $matchCheck   = Hash::check($request->current_password, auth()->user()->password);
        $confirmCheck = $request->new_password == $request->confirm_password;

        if(!$matchCheck) {
            Flash::error('You are entering the wrong password!');
            return back();
        }

        if(!$confirmCheck) {
            Flash::error('The password confirmation does not match.');
            return back();
        }

        if ($matchCheck && $confirmCheck) {
            $this->store([
                "password" => Hash::make($request->confirm_password)
            ]);
            Flash::success('Your password has been changed');
            return back();
        }
        Flash::error('Invalid Action !');
        return back();
    }
    public function store($data)
    {
        Employees::find(auth()->user()->id)->update($data);
    }
}