<?php

namespace App\Http\Controllers\Api\V1\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CourseMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function get(Request $request)
    {
        $file_path = asset('storage/app/public/course-material/{file}');
        $course_materials = DB::table('course_materials')
            ->join('courses', 'courses.id', '=', 'course_materials.course_id')
            ->join('student_details', 'student_details.course_id', '=', 'courses.id')
            ->where('student_details.user_id', '=', $request->user()->id)
            ->select('course_materials.*')
            ->get();

        return response()->json(['course_materials' => $course_materials, 'file_url' => $file_path], 200);
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
