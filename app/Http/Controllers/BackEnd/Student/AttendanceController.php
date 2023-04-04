<?php

namespace App\Http\Controllers\BackEnd\Student;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\IpAddress;
use App\Models\StudentDetails;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    private $student;
    private $attendance;
    private $ip;

    public function __construct(StudentDetails $student, Attendance $attendance, IpAddress $ip)
    {
        $this->student = $student;
        $this->attendance = $attendance;
        $this->ip = $ip;
    }
    /**
     * Display a listing of the resource.
     */
    public function clock_in(Request $request)
    {
        $connected_ip = $_SERVER['REMOTE_ADDR'];
        $save_ips = $this->ip->pluck('ip')->toArray();
        if(in_array($connected_ip, $save_ips))
        {
            $date = date("Y-m-d");
            $time = date("H:i:s");
            $student = $this->student->where('user_id', $request->user()->id)->first();
            if(empty($student))
            {
                return back()->withErrors('Student not found!');
            }
    
            $todayAttendance = $this->attendance->where('student_id', '=', $student->id)->where('date', date('Y-m-d'))->first();
            if (empty($todayAttendance)) {
    
                $attendance = $this->attendance->orderBy('id', 'desc')->where('student_id', '=', $student->id)->where('clock_out', '=', '00:00:00')->first();
                if ($attendance != null) {
                    $attendance = $this->attendance->find($attendance->id);
                    $attendance->clock_out = "12:00:00";
                    $attendance->save();
                }
    
                $attendance = $this->attendance;
                $attendance->student_id = $student->id;
                $attendance->date = $date;
                $attendance->status = 'Present';
                $attendance->clock_in = $time;
                $attendance->clock_out = '00:00:00';
                $attendance->save();
    
                return back()->with('success','Successfully clock in.');
            }
            else 
            {
                return back()->withErrors('Student are not allow multiple time clock in & clock out for every day.');
            }
    
            return back()->withErrors('Something wrong!');
        }
        else
        {
            return back()->withErrors('Please connect with SHINEE Wi-Fi !');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function clock_out(Request $request)
    {
        $student = $this->student->where('user_id', $request->user()->id)->first();
        $todayAttendance = $this->attendance->where('student_id', '=', $student->id)->where('date', date('Y-m-d'))->first();
        if(!empty($todayAttendance))
        {
            $time = date("H:i:s");
            $todayAttendance->clock_out = $time;
            $todayAttendance->save();

            return back()->with('success','Successfully clock out.');
        }
        else
        {
            return back()->withErrors('Something wrong!');
        }

        return back()->withErrors('Something wrong!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function list(Request $request)
    {
        $student = $this->student->where('user_id', $request->user()->id)->first();

        $attendances = $this->attendance->where('student_id', $student->id);
        if ($request->type == 'monthly' && !empty($request->month)) 
        {
            $month = date('m', strtotime($request->month));
            $year = date('Y', strtotime($request->month));

            $start_date = date($year . '-' . $month . '-01');
            $end_date = date($year . '-' . $month . '-t');

            $attendances->whereBetween(
                'date', [
                    $start_date,
                    $end_date,
                ]
            );
        } 
        elseif ($request->type == 'daily' && !empty($request->date)) 
        {
            $attendances->where('date', $request->date);
        } 
        else 
        {
            $month = date('m');
            $year = date('Y');
            $start_date = date($year . '-' . $month . '-01');
            $end_date = date($year . '-' . $month . '-t');
            $attendances->whereBetween(
                'date', [
                    $start_date,
                    $end_date,
                ]
            );
        }
        $attendances = $attendances->paginate(10);

        return view('backend.student.attendance.list', compact('attendances'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
