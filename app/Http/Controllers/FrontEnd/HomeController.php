<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    private $course;
    private $question;

    public function __construct(Course $course, Question $question)
    {
        $this->course = $course;
        $this->question = $question;
    }
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        $courses = $this->course->take(8)->get();
        return view('frontend.home.home', compact('courses'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function about_us()
    {
        return view('frontend.about-us');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function submit_question(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'number' => 'required',
            'email' => 'required',
            'comments' => 'required',
        ])->validate();

        $question = $this->question;
        $question['name'] = $request['name'];
        $question['number'] = $request['number'];
        $question['email'] = $request['email'];
        $question['comments'] = $request['comments'];
        $question->save();

        return back()->with('success', 'Thanks for your comments. You shall be connected soon.');
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
