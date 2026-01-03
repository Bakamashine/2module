<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseControllerApi extends Controller
{
    public function GetAll() {
        return CourseResource::collection(Course::paginate(5));
    }

    public function GetById(Course $course) {
        return new CourseResource($course);
    }
}
