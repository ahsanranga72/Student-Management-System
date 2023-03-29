<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Holiday;
use App\Models\StudentDetails;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $holiday;
    private $student;
    private $course;
    private $user;

    public function __construct(Holiday $holiday, StudentDetails $student, Course $course, User $user)
    {
        $this->holiday = $holiday;
        $this->student = $student;
        $this->course = $course;
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     */
    public function admin_dashboard()
    {
        $holidays = $this->holiday->whereYear('date',date('Y'))->get();
        $student_count = $this->student->get()->count();
        $course_count = $this->course->get()->count();
        $guest_count = $this->user->where('type', 'guest')->get()->count();
        return view('backend.admin.dashboard', compact('holidays','student_count', 'course_count', 'guest_count'));
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
