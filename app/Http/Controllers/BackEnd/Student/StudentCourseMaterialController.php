<?php

namespace App\Http\Controllers\BackEnd\Student;

use App\Http\Controllers\Controller;
use App\Models\CourseMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentCourseMaterialController extends Controller
{
    private $course_material;

    public function __construct(CourseMaterial $course_material)
    {
        $this->course_material = $course_material;
    }
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $course_materials = DB::table('course_materials')
            ->join('courses', 'courses.id', '=', 'course_materials.course_id')
            ->join('student_details', 'student_details.course_id', '=', 'courses.id')
            ->where('student_details.user_id', '=', auth()->user()->id)
            ->select('course_materials.*')
            ->paginate(10);
        return view('backend.student.course_material.list', compact('course_materials'));
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
        $course_material =$this->course_material->find($id);
        return response()->file(storage_path('app/public/course_material/'.$course_material['file']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function download(string $id)
    {
        $course_material =$this->course_material->find($id);
        return response()->download(storage_path('app/public/course_material/'.$course_material['file']));
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
