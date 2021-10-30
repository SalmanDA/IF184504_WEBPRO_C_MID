<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Http\Controllers\Admin\DB;
use Illuminate\Support\Facades\DB;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class AdminReportController extends Controller {
    public function index() {

        $reports = Attendance::join('users','users.id','=','attendances.user_id')
            ->select('users.name','attendances.check_in','attendances.check_out','attendances.absent','attendances.created_at')
            ->orderBy('attendances.created_at','DESC')
            ->get();

        $durations = [];
        $i=0;
        foreach ($reports as $r) { // 7281 -> 2:21
            $checkin = new Carbon($r->check_in);
            $checkout= new Carbon($r->check_out);
            $hours = (int) $checkout->diffInHours($checkin);
            $minutes = (int) $checkout->diffInMinutes($checkin) - ($hours * 60); // 121 - 120 = 1
            $seconds = (int) $checkout->diffInSeconds($checkin)%60;
            $durations[$i++] = (string) ($hours) . ":" . (string) ($minutes) . ":"  . (string) ($seconds);
        }
        
        return view('admin.report',compact('reports','durations'));
    }
}