<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Carbon\Carbon;
class TasksController extends Controller
{
    public function index(Request $request){
        $list = Task::all()->toArray();
        $timezones = Config('constants.timezones');
        $selectedTimeZone = "Asia/Karachi";
        if($request->has('timezone') && !empty($request->input('timezone'))){
            $selectedTimeZone = $request->input('timezone');
            foreach($list as $key=>$val){
                $datetime = Carbon::createFromFormat('Y-m-d H:i:s', $val['deadline'],'Asia/Karachi');
                $datetime->setTimezone($selectedTimeZone);
                $list[$key]['deadline'] = $datetime;
            }
        }
        return view('welcome',['tasks'=>$list,'timezones'=>$timezones,'selectedTimeZone'=>$selectedTimeZone]);
    }

    public function save(Request $request){
        $data = $request->all();
        $data['deadline'] = $data['date'].' '.$data['time'];
        unset($data['date']);
        unset($data['time']);
        Task::create($data);
        return back();
    }
}
