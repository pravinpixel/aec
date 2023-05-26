<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        return view('calendar.index');
    }
    public function events()
    {
        foreach ($this->getUserEvents() as $event) {
           
            $result[] = [
                "id"       => $event['id'],
                "title"    => $event['title'],
                "start"    => $event['start'],
                "end"      => $event['end'],
                "editable" => AuthUser() === 'ADMIN' ? true : (is_null($event['user_id']) ? false : true),
                "color"    => $event['color']
            ];
        }
        return $result;
    }
    public function update_or_create(Request $request)
    {
        if (is_null($request->id)) {
            return  Calendar::create([
                "user_id"   => AuthUserData()->id,
                "user_role" => AuthUser(),
                "title"     => $request->title,
                "color"     => $request->color,
                "start"     => $request->start,
                "end"       => $request->end,
            ]);
        } 
        Calendar::find($request->id)->update([
            "title"     => $request->title,
            "color"     => $request->color,
            "start"     => $request->start,
            "end"       => $request->end,
        ]);
        return Calendar::find($request->id);
    }
    public function delete($id)
    {
        return Calendar::find($id)->delete();
    }

    public function getUserEvents()
    {
        if (AuthUser() === 'ADMIN') {
            return Calendar::all();
        }
        $user_events   = Calendar::where(["user_id"   => AuthUserData()->id, "user_role" => AuthUser()])->get()->toArray();
        $common_events = Calendar::whereNull("user_id")->get()->toArray();
        return  array_merge($user_events, $common_events);
    }
}
