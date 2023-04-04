<?php

namespace App\Http\Controllers\BackEnd\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Course;
use App\Models\StudentDetails;
use App\Models\StudentEducationDetails;
use App\Models\User;
use App\Traits\FileManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    use FileManager;
    private $course;
    private $user;
    private $student_details;
    private $student_education_details;
    private $attendance;

    public function __construct(Course $course, User $user, StudentDetails $student_details, StudentEducationDetails $student_education_details, Attendance $attendance)
    {
        $this->course = $course;
        $this->user = $user;
        $this->student_details = $student_details;
        $this->student_education_details = $student_education_details;
        $this->attendance = $attendance;
    }
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $students = $this->student_details->with('course')->paginate(10);
        return view('backend.admin.student.list', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = $this->course->get();
        return view('backend.admin.student.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'student_name' => 'required',
            'course' => 'required',
            'student_batch' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'permanent_address' => 'required',
            'p_state' => 'required',
            'p_pin_code' => 'required',
            'mobile' => 'required',
            'email' => 'required|email|unique:users',
            'date_of_birth' => 'required',
            'nationality' => 'required',
            'sex' => 'required',
            'national_id_card_no' => 'required',
        ])->validate();

        $user = $this->user;
        $user['name'] = $request['student_name'];
        $user['email'] = $request['email'];
        $user['phone'] = $request['mobile'];
        $user['type'] = 'student';
        $user['is_active'] = 1;
        $user['password'] = bcrypt('12345678');
        $user->save();

        $student_details = $this->student_details;
        $student_details['user_id'] = $user['id'];
        $student_details['student_id'] = ($this->course->find($request['course'])->code??'0').'/B'.sprintf("%04d", $request['student_batch']).'/'.sprintf("%03d",(($this->student_details->where('course_id', $request['course'])->latest()->count()??0)+1));
        $student_details['name'] = $request['student_name'];
        $student_details['image'] = $request->has('student_image') ? $this->image_uploader('student/', 'png', $request->student_image) : null;
        $student_details['course_id'] = $request['course'];
        $student_details['batch'] = $request['student_batch'];
        $student_details['father_name'] = $request['father_name'];
        $student_details['mother_name'] = $request['mother_name'];
        $student_details['father_occupation'] = $request['father_occupation'];
        $student_details['permanent_address'] = $request['permanent_address'];
        $student_details['p_state'] = $request['p_state'];
        $student_details['p_pin_code'] = $request['p_pin_code'];
        $student_details['telephone'] = $request['telephone'];
        $student_details['fax'] = $request['fax'];
        $student_details['mobile'] = $request['mobile'];
        $student_details['email'] = $request['email'];
        $student_details['correspondence_address'] = $request['correspondence_address'];
        $student_details['c_state'] = $request['c_state'];
        $student_details['c_pin_code'] = $request['c_pin_code'];
        $student_details['date_of_birth'] = $request['date_of_birth'];
        $student_details['nationality'] = $request['nationality'];
        $student_details['sex'] = $request['sex'];
        $student_details['physical_challenges'] = $request['physical_challenges'];
        $student_details['national_id_card_no'] = $request['national_id_card_no'];
        $student_details['lg_name'] = $request['lg_name'];
        $student_details['lg_address'] = $request['lg_address'];
        $student_details['lg_mobile'] = $request['lg_mobile'];
        $student_details['lg_email'] = $request['lg_email'];
        $student_details->save();

        $student_education_details = new StudenteducationDetails;
        $student_education_details['student_id'] = $student_details->id;
        $student_education_details['exam'] = '10th / Equivalent';
        $student_education_details['board'] = $request['10th_board'];
        $student_education_details['passing_year'] = $request['10th_passing_year'];
        $student_education_details['mark'] = $request['10th_mark'];
        $student_education_details['division'] = $request['10th_division'];
        $student_education_details->save();

        $student_education_details = new StudenteducationDetails;
        $student_education_details['student_id'] = $student_details->id;
        $student_education_details['exam'] = '12th / Equivalent';
        $student_education_details['board'] = $request['12th_board'];
        $student_education_details['passing_year'] = $request['12th_passing_year'];
        $student_education_details['mark'] = $request['12th_mark'];
        $student_education_details['division'] = $request['12th_division'];
        $student_education_details->save();

        $student_education_details = new StudenteducationDetails;
        $student_education_details['student_id'] = $student_details->id;
        $student_education_details['exam'] = 'Graduation';
        $student_education_details['board'] = $request['graduation_board'];
        $student_education_details['passing_year'] = $request['graduation_passing_year'];
        $student_education_details['mark'] = $request['graduation_mark'];
        $student_education_details['division'] = $request['graduation_division'];
        $student_education_details->save();

        $student_education_details = new StudenteducationDetails;
        $student_education_details['student_id'] = $student_details->id;
        $student_education_details['exam'] = 'Post graduation';
        $student_education_details['board'] = $request['post_graduation_board'];
        $student_education_details['passing_year'] = $request['post_graduation_passing_year'];
        $student_education_details['mark'] = $request['post_graduation_mark'];
        $student_education_details['division'] = $request['post_graduation_division'];
        $student_education_details->save();

        $student_education_details = new StudenteducationDetails;
        $student_education_details['student_id'] = $student_details->id;
        $student_education_details['exam'] = 'Others';
        $student_education_details['board'] = $request['others_board'];
        $student_education_details['passing_year'] = $request['others_passing_year'];
        $student_education_details['mark'] = $request['others_mark'];
        $student_education_details['division'] = $request['others_division'];
        $student_education_details->save();

        return redirect()->route('backend.admin.students.show', $student_details->id)->with('success', 'Form successfully submitted.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = $this->student_details->with('course')->find($id);
        $student_educations = $this->student_education_details->where('student_id', $id)->get();

        return view('backend.admin.student.details', compact('student', 'student_educations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function edit(string $id)
    {
        $student = $this->student_details->find($id);
        $student_educations = $this->student_education_details->where('student_id', $id)->get();
        return view('backend.admin.student.edit', compact('student', 'student_educations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Validator::make($request->all(), [
            'student_name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'permanent_address' => 'required',
            'p_state' => 'required',
            'p_pin_code' => 'required',
            'mobile' => 'required',
            'date_of_birth' => 'required',
            'nationality' => 'required',
            'sex' => 'required',
            'national_id_card_no' => 'required',
        ])->validate();

        $student_details = $this->student_details->find($id);

        $user = $this->user->find($student_details->user_id);
        $user['name'] = $request['student_name'];
        $user['phone'] = $request['mobile'];
        $user->save();

        $student_details['name'] = $request['student_name'];
        if($request->has('student_image')) $student_details['image'] = $this->image_uploader('student/', 'png', $request->student_image, $student_details['image']);
        $student_details['father_name'] = $request['father_name'];
        $student_details['mother_name'] = $request['mother_name'];
        $student_details['father_occupation'] = $request['father_occupation'];
        $student_details['permanent_address'] = $request['permanent_address'];
        $student_details['p_state'] = $request['p_state'];
        $student_details['p_pin_code'] = $request['p_pin_code'];
        $student_details['telephone'] = $request['telephone'];
        $student_details['fax'] = $request['fax'];
        $student_details['mobile'] = $request['mobile'];
        $student_details['correspondence_address'] = $request['correspondence_address'];
        $student_details['c_state'] = $request['c_state'];
        $student_details['c_pin_code'] = $request['c_pin_code'];
        $student_details['date_of_birth'] = $request['date_of_birth'];
        $student_details['nationality'] = $request['nationality'];
        $student_details['sex'] = $request['sex'];
        $student_details['physical_challenges'] = $request['physical_challenges'];
        $student_details['national_id_card_no'] = $request['national_id_card_no'];
        $student_details['lg_name'] = $request['lg_name'];
        $student_details['lg_address'] = $request['lg_address'];
        $student_details['lg_mobile'] = $request['lg_mobile'];
        $student_details['lg_email'] = $request['lg_email'];
        $student_details->save();

        $this->student_education_details->where('student_id', $student_details->id)->delete();

        $student_education_details = new StudenteducationDetails;
        $student_education_details['student_id'] = $student_details->id;
        $student_education_details['exam'] = '10th / Equivalent';
        $student_education_details['board'] = $request['10th_board'];
        $student_education_details['passing_year'] = $request['10th_passing_year'];
        $student_education_details['mark'] = $request['10th_mark'];
        $student_education_details['division'] = $request['10th_division'];
        $student_education_details->save();

        $student_education_details = new StudenteducationDetails;
        $student_education_details['student_id'] = $student_details->id;
        $student_education_details['exam'] = '12th / Equivalent';
        $student_education_details['board'] = $request['12th_board'];
        $student_education_details['passing_year'] = $request['12th_passing_year'];
        $student_education_details['mark'] = $request['12th_mark'];
        $student_education_details['division'] = $request['12th_division'];
        $student_education_details->save();

        $student_education_details = new StudenteducationDetails;
        $student_education_details['student_id'] = $student_details->id;
        $student_education_details['exam'] = 'Graduation';
        $student_education_details['board'] = $request['graduation_board'];
        $student_education_details['passing_year'] = $request['graduation_passing_year'];
        $student_education_details['mark'] = $request['graduation_mark'];
        $student_education_details['division'] = $request['graduation_division'];
        $student_education_details->save();

        $student_education_details = new StudenteducationDetails;
        $student_education_details['student_id'] = $student_details->id;
        $student_education_details['exam'] = 'Post graduation';
        $student_education_details['board'] = $request['post_graduation_board'];
        $student_education_details['passing_year'] = $request['post_graduation_passing_year'];
        $student_education_details['mark'] = $request['post_graduation_mark'];
        $student_education_details['division'] = $request['post_graduation_division'];
        $student_education_details->save();

        $student_education_details = new StudenteducationDetails;
        $student_education_details['student_id'] = $student_details->id;
        $student_education_details['exam'] = 'Others';
        $student_education_details['board'] = $request['others_board'];
        $student_education_details['passing_year'] = $request['others_passing_year'];
        $student_education_details['mark'] = $request['others_mark'];
        $student_education_details['division'] = $request['others_division'];
        $student_education_details->save();

        return redirect()->route('backend.admin.students.show', $student_details->id)->with('success', 'Student details updated.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function attendance(Request $request)
    {
        $attendances = $this->attendance;
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
        $attendances = $attendances->orderBy('student_id', 'asc')->paginate(10);

        return view('backend.admin.student.attendance', compact('attendances'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function mark_attendance()
    {
        $students = $this->student_details->pluck('name', 'id');
        return view('backend.admin.student.mark-attendance', compact('students'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function store_mark_attendance(Request $request)
    {
        Validator::make($request->all(), [
            'student' => 'required',
            'date' => 'required',
        ])->validate();

        $student = $this->student_details->where('id', $request->student)->first();
        if(empty($student))
        {
            return back()->withErrors('Student not found!');
        }

        $chkExist = $this->attendance->where('student_id', '=', $request->student)->where('date', $request->date)->first();

        if (empty($chkExist)) {
            $attendance = $this->attendance;
            $attendance->student_id = $request->student;
            $attendance->date = $request->date;
            $attendance->status = 'Present';
            $attendance->clock_in = '10:00:00';
            $attendance->clock_out = '12:00:00';
            $attendance->save();

            return back()->with('success','Student marked as present.');
        }
        else 
        {
            return back()->withErrors('Attendance already exist!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = $this->student_details->find($id);
        $this->user->find($student->user_id)->delete();
        $this->student_education_details->where('student_id', $id)->delete();
        $this->file_remover('student/', $student['image']);
        $student->delete();

        return redirect()->route('backend.admin.students.list')->with('success', 'Successfully removed.');
    }
}
