@extends('layouts.basic')

@section('content')
    <a href="{{ route("lesson.index") }}">Lessons</a>
    <a href="{{ route("order.index") }}">Orders</a>
@endsection
