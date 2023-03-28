<?php

namespace App\Http\Controllers\BackEnd\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Traits\FileManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminCourseController extends Controller
{
    use FileManager;
    private $course;

    public function __construct(Course $course)
    {
        $this->course = $course;
    }
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $courses = $this->course->paginate(10);
        return view('backend.admin.course.list', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.admin.course.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'code' => 'required',
            'name' => 'required',
            'file' => "required|mimes:pdf|max:10000",
            'thumbnail' =>  'required|image|mimes:jpeg,jpg,png,gif|max:10000',
        ])->validate();

        $course = $this->course;
        $course['code'] = $request['code'];
        $course['name'] = $request['name'];
        $course['file'] = $request->has('file') ? $this->image_uploader('course/file/', 'pdf', $request->file) : null;
        $course['thumbnail'] = $request->has('thumbnail') ? $this->image_uploader('course/thumbnail/', 'png', $request->thumbnail) : null;
        $course->save();

        return redirect()->route('backend.admin.course.create')->with('success', 'Course successfully uploaded.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course =$this->course->find($id);
        return response()->file(storage_path('app/public/course/file/'.$course['file']));
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
        $course = $this->course->find($id);
        $this->file_remover(asset('storage/app/public/course/file'), $course['file']);
        $this->file_remover(asset('storage/app/public/course/thumbnail'), $course['thumbnail']);
        $course->delete();

        return back()->with('success', 'Course successfully deleted.');
    }
}
