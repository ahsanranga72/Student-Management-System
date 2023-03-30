<?php

namespace App\Http\Controllers\Api\V1\Student;

use App\Http\Controllers\Controller;
use App\Models\ClassSchedule;
use App\Models\Holiday;
use App\Models\Question;
use App\Models\StudentClassSchedule;
use App\Traits\FileManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OthersController extends Controller
{
    use FileManager;

    private $holiday;
    private $class_schedule;
    private $question;

    public function __construct(Holiday $holiday, ClassSchedule $class_schedule, Question $question)
    {
        $this->holiday = $holiday;
        $this->class_schedule = $class_schedule;
        $this->question = $question;
    }

    public function get_holidays()
    {
        $holidays = $this->holiday->get();

        return response()->json(['holidays' => $holidays]);
    }

    public function get_class_shecule()
    {
        $student_class_schedule = DB::table('class_schedules')
            ->join('courses', 'courses.id', '=', 'class_schedules.course_id')
            ->join('student_details', 'student_details.course_id', '=', 'courses.id')
            ->where('student_details.user_id', '=', auth()->user()->id)
            ->select('class_schedules.*')
            ->get();

        return response()->json(['student_class_schedule' => $student_class_schedule]);
    }

    public function question_submit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'number' => 'required',
            'email' => 'required',
            'comments' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Data not found!', 'error' => $validator->errors()->getMessages()], 403);
        }

        $question = $this->question;
        $question['name'] = $request['name'];
        $question['number'] = $request['number'];
        $question['email'] = $request['email'];
        $question['comments'] = $request['comments'];
        $question->save();

        return response()->json(['message' => 'Thanks for your comments. You shall be connected soon.'], 200);
    }

    public function about_us()
    {
        return view('api.api-about-us');
    }
}
