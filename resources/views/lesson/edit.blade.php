@extends('layouts.basic')

@section('title')
    Redact {{ $lesson->title }}
@endsection

@section('content')
    <form method="post" action="{{ route('lesson.update', ['lesson' => $lesson->id]) }}">
        @csrf
        @method("put")
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" value={{ $lesson->title }}>
            @error('title')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description">{{ $lesson->description }}</textarea>
            @error('description')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label>Link</label>
            <input type="text" name="link" value="{{ $lesson->link }}">
            @error('link')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label>Duration</label>
            <input type="number" name="duration" value="{{ $lesson->duration }}">
            @error('duration')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <button>Redact Lesson</button>
        </div>
    </form>
@endsection
