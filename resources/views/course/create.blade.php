@extends('layouts.basic')

@section('title', 'Create course')
@section('content')
    <form method="post" action="{{ route('course.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title">
                Title
            </label>
            <input type="text" value="{{ old('title') }}" name="title" id="title">
            @error('title')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description">
                Description
            </label>
            <textarea name="description" id="description">{{ old('description') }}</textarea>
            @error('description')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="duration">Duration</label>
            <input type="number" name="duration" id="duration" value="{{ old('duration') }}">
            @error('duration')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price">Price</label>
            <input type="text" name="price" id="price" value="{{ old('price') }}">
            @error('price')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="start">Start</label>
            <input type="date" id="start" name="start" value="{{ old('start') }}">
            @error('start')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="end">End</label>
            <input type="date" id="end" name="end" value="{{ old('end') }}">
            @error('end')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image">Pick image</label>
            <input type="file" class="" name="image" value="{{ old('image') }}">
            @error('image')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <button>Create course</button>
        </div>
    </form>
@endsection
