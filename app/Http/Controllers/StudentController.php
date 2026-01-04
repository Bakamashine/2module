<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\StatusPayment;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $courseId = $request->query("courseId");
        $data = [];
        $courses = Course::all();
        if (!$courseId || $courseId == "All" || $courseId == "all") {
            $data = StatusPayment::all();
        } else {
            $data = StatusPayment::where("course_id", $courseId)->get();
        }
        return view("student.index", ['data' => $data, 'courses' => $courses]);
    }
}
