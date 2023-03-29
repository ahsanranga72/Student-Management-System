<?php

namespace App\Http\Controllers\Api\V1\Student;

use App\Http\Controllers\Controller;
use App\Models\ClassSchedule;
use App\Models\Holiday;
use App\Models\StudentClassSchedule;
use App\Traits\FileManager;

class OthersController extends Controller
{
    use FileManager;

    private $holiday;
    private $class_schedule;

    public function __construct(Holiday $holiday, ClassSchedule $class_schedule)
    {
        $this->holiday = $holiday;
        $this->class_schedule = $class_schedule;
    }

    public function get_holidays()
    {
        $holidays = $this->holiday->get();

        return response()->json(['holidays' => $holidays]);
    }

    public function get_class_shecule()
    {
        $student_class_schedule = $this->class_schedule->get();

        return response()->json(['student_class_schedule' => $student_class_schedule]);
    }
}
