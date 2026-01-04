@extends('layouts.basic')

@section('title')
    Students
@endsection

@section('content')
    <div class="sort mb-3">
        <form method="get">
            <select name="courseId" required>
                <option value="all">All</option>
                @foreach ($courses as $value)
                    <option value="{{ $value->id }}">{{ $value->title }}</option>
                @endforeach
            </select>
            <button>Sort</button>
        </form>
    </div>
    @empty($data)
        <p class="text-center">Записей нет</p>
    @else
        <div class="list">
            @foreach ($data as $value)
                <div class="list__wrapper list__wrapper-border">
                    <p>Email: {{ $value->student->email }}</p>
                    <p>Name: {{ $value->student->name ?? 'Неизвестно' }}</p>
                    <p>Date: {{ $value->created_at }}</p>
                    <p>Course: {{ $value->course->title }}</p>
                    <p>Status: {{ $value->status }}</p>
                </div>
            @endforeach
        </div>
    @endempty
@endsection
