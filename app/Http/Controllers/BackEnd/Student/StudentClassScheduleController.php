<?php

namespace App\Http\Controllers\BackEnd\Student;

use App\Http\Controllers\Controller;
use App\Models\ClassSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentClassScheduleController extends Controller
{
    private $class_schedule;

    public function __construct(ClassSchedule $class_schedule)
    {
        $this->class_schedule = $class_schedule;
    }
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $class_schedules = DB::table('class_schedules')
            ->join('courses', 'courses.id', '=', 'class_schedules.course_id')
            ->join('student_details', 'student_details.course_id', '=', 'courses.id')
            ->where('student_details.user_id', '=', auth()->user()->id)
            ->select('class_schedules.*')
            ->paginate(10);
        return view('backend.student.class_schedule.list', compact('class_schedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
