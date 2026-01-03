@extends('layouts.basic')

@section('content')
    <h1 class="text-center">Redact {{ $course->title }}</h1>
    <form method="post" action="{{ route('course.update', ['course' => $course->id]) }}" enctype="multipart/form-data">
        @csrf
        @method("put")
        <div class="mb-3">
            <label for="title">
                Title
            </label>
            <input type="text" value="{{ $course->title }}" name="title" id="title">
            @error('title')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description">
                Description
            </label>
            <textarea name="description" id="description">{{ $course->description }}</textarea>
            @error('description')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="duration">Duration</label>
            <input type="number" name="duration" id="duration" value="{{ $course->duration }}">
            @error('duration')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price">Price</label>
            <input type="text" name="price" id="price" value="{{ $course->price }}">
            @error('price')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="start">Start</label>
            <input type="date" id="start" name="start" value="{{ $course->start }}">
            @error('start')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="end">End</label>
            <input type="date" id="end" name="end" value="{{ $course->end }}">
            @error('end')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image">Pick image</label>
            <div>
            <p>Old image: </p>
            <img src="{{ $course->image }}" class="course-img-size" />
            </div>
            <input type="file" class="" name="image">
            @error('image')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <button>Redact course</button>
        </div>
    </form>
@endsection
