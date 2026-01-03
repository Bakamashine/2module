<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{

    public function create()
    {
        return view("lesson.create");
    }

    public function store(StoreLessonRequest $request)
    {
        Lesson::create($request->all());
        return redirect()->route("lesson.index");
    }


    public function edit(Lesson $lesson)
    {
        return view("lesson.edit", ['lesson' => $lesson]);
    }

    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        $lesson->fill($request->all());
        $lesson->save();
        return redirect()->route("lesson.index");
    }
    public function destroy(Lesson $lesson)
    {
        dd("In Development..");
    }

    public function index() {
        return view("lesson.index", ['lesson'=> Lesson::paginate(5)]);
    }
}
