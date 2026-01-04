<?php

namespace App\Http\Controllers;

use App\Contracts\IImageService;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;

class CourseController extends Controller
{

    public function __construct(
        protected IImageService $imageService
    ) {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("course.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        $course = Course::create([
            "title" => $request->title,
            "description" => $request->description,
            "duration" => $request->duration,
            "price" => $request->price,
            "start" => $request->start,
            "end" => $request->end,
            "image" => $this->imageService->UploadImage($request,"image", "course"),
        ]);
        return redirect()->route("course.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view("course.edit", ['course' => $course]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        if ($request->hasFile("image")) {
            $course->image = $this->imageService->UploadImage($request, "image", "course");
        }
        $course->fill($request->only([
            "title",
            "description",
            "duration",
            "price",
            "start",
            "end",
        ]));
        $course->save();
        return redirect()->route("course.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return back();
    }

    public function index()
    {
        return view("course.index", ['course' => Course::paginate(5)]);
    }
}
