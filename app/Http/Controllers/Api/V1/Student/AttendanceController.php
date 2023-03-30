<?php

namespace App\Http\Controllers\Api\V1\Student;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\StudentDetails;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    private $attendance;
    private $student;

    public function __construct(Attendance $attendance, StudentDetails $student)
    {
        $this->attendance = $attendance;
        $this->student = $student;
    }

    public function attendance_list(Request $request)
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
        $attendances = $attendances->get();

        return response()->json(['attendances' => $attendances], 200);
    }

    public function clock_in(Request $request)
    {
        $date = date("Y-m-d");
        $time = date("H:i:s");
        $student = $this->student->where('user_id', $request->user()->id)->first();
        if(empty($student))
        {
            return response()->json(['message' => 'Student not found!'], 403);
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

            return response()->json(['message' => 'Successfully clock in.'], 200);
        }
        else 
        {
            return response()->json(['message' => 'Student are not allow multiple time clock in & clock out for every day.'], 403);
        }

        return response()->json(['message' => 'Something wrong!'], 403);
    }

    public function clock_out(Request $request)
    {
        $student = $this->student->where('user_id', $request->user()->id)->first();
        $todayAttendance = $this->attendance->where('student_id', '=', $student->id)->where('date', date('Y-m-d'))->first();
        if(!empty($todayAttendance))
        {
            $time = date("H:i:s");
            $todayAttendance->clock_out = $time;
            $todayAttendance->save();

            return response()->json(['message' => 'Successfully clock out.'], 200);
        }
        else
        {
            return response()->json(['message' => 'Something wrong!'], 403);
        }

        return response()->json(['message' => 'Something wrong!'], 403);
    }

    //todays attendance
    public function todays_attendance(Request $request)
    {
        $student = $this->student->where('user_id', $request->user()->id)->first();
        $todaysAttendance = $this->attendance
            ->orderBy('id', 'desc')
            ->where('student_id', '=', !empty($student) ? $student->id : 0)
            ->where('date', '=', date("Y-m-d"))
            ->first();

        return response()->json(['todaysAttendance'=>$todaysAttendance],201);
    }

    //todays attendance
    public function count_attendance(Request $request){
        $student = $this->student->where('user_id', $request->user()->id)->first();
        $total_present = $this->attendance
            ->orderBy('id', 'desc')
            ->where('student_id', '=', !empty($student) ? $student->id : 0)
            ->whereMonth('date', '=', date('m'))
            ->get()->count();
        return response()->json(['total_present'=>$total_present],201);
    }
}
