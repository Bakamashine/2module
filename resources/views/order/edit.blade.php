@extends('layouts.basic')

@section('content')
    <h1 class="text-center">Redact {{ $order->title }}</h1>
    <form method="post" action="{{ route('order.update', ['order' => $order->id]) }}" enctype="multipart/form-data">
        @csrf
        @method("put")
        <div class="mb-3">
            <label for="title">
                Title
            </label>
            <input type="text" value="{{ $order->title }}" name="title" id="title">
            @error('title')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description">
                Description
            </label>
            <textarea name="description" id="description">{{ $order->description }}</textarea>
            @error('description')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="duration">Duration</label>
            <input type="number" name="duration" id="duration" value="{{ $order->duration }}">
            @error('duration')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price">Price</label>
            <input type="text" name="price" id="price" value="{{ $order->price }}">
            @error('price')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="start">Start</label>
            <input type="date" id="start" name="start" value="{{ $order->start }}">
            @error('start')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="end">End</label>
            <input type="date" id="end" name="end" value="{{ $order->end }}">
            @error('end')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image">Pick image</label>
            <div>
            <p>Old image: </p>
            <img src="{{ $order->image }}" class="order-img-size" />
            </div>
            <input type="file" class="" name="image">
            @error('image')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <button>Redact order</button>
        </div>
    </form>
@endsection
