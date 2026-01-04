@extends('layouts.basic')

@section('content')
    <a href="{{ route("lesson.index") }}">Lessons</a>
    <a href="{{ route("course.index") }}">Courses</a>
    <a href="{{  route("student.index") }}">Student</a>
@endsection
