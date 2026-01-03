<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseControllerApi extends Controller
{

    private static string $webHookUrl = "http://localhost:9000";

    public function GetAll()
    {
        return CourseResource::collection(Course::paginate(5));
    }

    public function GetById(Course $course)
    {
        return new CourseResource($course);
    }

    public function Buy(Request $request, Course $course)
    {
        $token = $request->user()->currentAccessToken();
        return response()->json([
            "pay_url" => self::$webHookUrl . "?id=$course->id&token=" . $token,
        ]);
    }

    public function webHook(int $id, string $status) {

    }
}
