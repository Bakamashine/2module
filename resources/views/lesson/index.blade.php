@extends('layouts.basic')
@section('title')
    Lesson
@endsection
@section('content')
    @if (count($lesson) > 0)
        <h3 class="text-center">Lesson</h3>
        <div class="admin-order">
            @foreach ($lesson as $value)
                <div class="admin-order-box">
                    <p>Title: {{ $value->title }}</p>
                    <p>Description: {{ $value->description ?? 'null' }}</p>
                    <p>Duration: {{ $value->duration }}</p>
                    @empty($value->link)
                        <p>Video not found</p>
                    @else
                        <p>Url:
                            <video width="320" height="240" controls>
                                <source src="{{ $value->link }}">
                            </video>
                        </p>
                    @endempty
                    <a href="{{ route('lesson.edit', ['lesson' => $value->id]) }}">Redact</a>
                    <a href="{{ route('lesson.destroy', ['lesson' => $value->id]) }}">Delete</a>
                </div>
            @endforeach
            {{ $lesson->links() }}
        </div>
    @endif
@endsection
