<?php

namespace App\Http\Controllers\BackEnd\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseMaterial;
use App\Traits\FileManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminCourseMaterialController extends Controller
{
    use FileManager;
    private $course_material;
    private $course;

    public function __construct(CourseMaterial $course_material, Course $course)
    {
        $this->course_material = $course_material;
        $this->course = $course;
    }
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $course_materials = $this->course_material->paginate(10);
        return view('backend.admin.course_material.list', compact('course_materials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = $this->course->get();
        return view('backend.admin.course_material.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'course' => 'required',
            'name' => 'required',
            'file' => "required|mimes:pdf|max:10000",
        ])->validate();

        $course_material = $this->course_material;
        $course_material['course_id'] = $request['course'];
        $course_material['name'] = $request['name'];
        $course_material['file'] = $request->has('file') ? $this->image_uploader('course_material/', 'pdf', $request->file) : null;
        $course_material->save();

        return redirect()->route('backend.admin.course-material.create')->with('success', 'Course material successfully uploaded.');
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
    public function destroy($id)
    {
        $course_material = $this->course_material->find($id);
        $this->file_remover(asset('storage/app/public/course_material/'), $course_material['file']);
        $course_material->delete();

        return back()->with('success', 'Course material successfully removed.');
    }
}
