@extends('layouts.basic')

@section('title')
    Create new Lesson
@endsection

@section('content')
    <form method="post" action="{{ route('lesson.store') }}">
        @csrf
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" value={{ old('title') }}>
            @error('title')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description">{{ old('description') }}</textarea>
            @error('description')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label>Link</label>
            <input type="text" name="link" value="{{ old('link') }}">
            @error('link')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label>Duration</label>
            <input type="number" name="duration" value="{{ old('duration') }}">
            @error('duration')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <button>Create Lesson</button>
        </div>
    </form>
@endsection
