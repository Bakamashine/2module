<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseControllerApi extends Controller
{
    public function GetAll() {
        return Course::paginate(5);
    }

    public function GetById(Course $course) {
        return response()->json($course);
    }
}
