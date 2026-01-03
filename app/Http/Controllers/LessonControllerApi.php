<?php

namespace App\Http\Controllers;

use App\Http\Resources\LessonResource;
use App\Models\Course;
use Illuminate\Http\Request;

class LessonControllerApi extends Controller
{
    public function GetAll(Course $course) {
        return LessonResource::collection($course->lesson());
    }
}
