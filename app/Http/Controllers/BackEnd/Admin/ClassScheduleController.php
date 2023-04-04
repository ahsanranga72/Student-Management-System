<?php

namespace App\Http\Controllers\BackEnd\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassSchedule;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClassScheduleController extends Controller
{
    private $class_schedule;
    private $course;

    public function __construct(ClassSchedule $class_schedule, Course $course)
    {
        $this->class_schedule = $class_schedule;
        $this->course = $course;
    }
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $class_schedules = $this->class_schedule->paginate(10);
        return view('backend.admin.class_schedule.list', compact('class_schedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = $this->course->get();
        return view('backend.admin.class_schedule.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'course' => 'required',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ])->validate();

        $class_schedule = $this->class_schedule;
        $class_schedule['course_id'] = $request['course'];
        $class_schedule['day'] = $request['day'];
        $class_schedule['start_time'] = $request['start_time'];
        $class_schedule['end_time'] = $request['end_time'];
        $class_schedule->save();

        return redirect()->route('backend.admin.class-schedule.create')->with('success', 'Successfully created.');
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
        $courses = $this->course->get();
        $class_schedule = $this->class_schedule->find($id);
        return view('backend.admin.class_schedule.edit', compact('courses','class_schedule'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Validator::make($request->all(), [
            'course' => 'required',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ])->validate();

        $class_schedule = $this->class_schedule->find($id);
        $class_schedule['course_id'] = $request['course'];
        $class_schedule['day'] = $request['day'];
        $class_schedule['start_time'] = $request['start_time'];
        $class_schedule['end_time'] = $request['end_time'];
        $class_schedule->save();

        return redirect()->route('backend.admin.class-schedule.list')->with('success', 'Successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->class_schedule->find($id)->delete();
        return back()->with('success', 'Successfully removed.');
    }
}
