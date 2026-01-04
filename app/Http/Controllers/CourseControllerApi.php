<?php

namespace App\Http\Controllers;

use App\Http\Requests\WebHookRequest;
use App\Http\Resources\CourseResource;
use App\Http\Resources\OrderResource;
use App\Models\Course;
use App\Models\StatusPayment;
use Illuminate\Http\Request;
use App\StatusPayment as StatusPaymentEnum;

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
        $request->user()->payment()->create([
            "status" => StatusPaymentEnum::WaitingPayment,
            "course_id" => $course->id
        ]);

        return response()->json([
            "pay_url" => self::$webHookUrl . "?id=$course->id" . "&url=" . env("APP_URL"),
        ]);
    }

    public function webHook(WebHookRequest $request)
    {
        $status = (boolean) $request->status;
        $statusPayment = StatusPayment::find($request->id);
        if ($status) {
            $statusPayment->status = StatusPaymentEnum::Bought;
            $statusPayment->save();
            return response()->noContent();
        } else {
            $statusPayment->status = StatusPaymentEnum::Error;
            $statusPayment->save();
            return response()->noContent(402);
        }
    }

    public function GetStudentCourse(Request $request)
    {
        return OrderResource::collection($request->user()->payment);
    }

    public function CancelOrderCourse(Request $request, StatusPayment $statusPayment)
    {
        if ($statusPayment->student_id == $request->user()->id) {

            if (
                $statusPayment->status === StatusPaymentEnum::WaitingPayment->value
                || $statusPayment->status === StatusPaymentEnum::Error->value
            ) {
                $statusPayment->delete();
                return response()->json([
                    "status" => "success"
                ]);
            }
            return response()->json([
                "status" => "was payed",
            ], 418);
        } else {
            return response()->json([
                "message" => "Forbidden for you"
            ], 403);
        }
    }
}
