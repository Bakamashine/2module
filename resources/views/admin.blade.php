@extends('layouts.basic')

@section('content')
    @if (count($order) > 0)
        @foreach ($order as $value)
            <div>
                <img src="{{ $value->image }}" class="order-img-size">
                <p>Title: {{ $value->title }}</p>
                <p>Description: {{ $value->description ?? 'null' }}</p>
                <p>Duration: {{ $value->duration }}</p>
                <p>Price: {{ $value->price }}</p>
                <p>Start: {{ $value->start }}</p>
                <p>End: {{ $value->end }}</p>
                <a href="{{ route('order.edit', ['order' => $value->id]) }}">Redact</a>
                <a id="button-{{ $value->id }}" href="javascript:void(0)">Delete</a>
                <form id="form-{{ $value->id }}" class="hidden" method="post"
                    action="{{ route('order.destroy', ['order' => $value->id]) }}">
                    @csrf
                    @method('delete')
                </form>
                <script>
                    let current_form = document.querySelector("#form-{{ $value->id }}");
                    let current_button = document.querySelector("#button-{{ $value->id }}")
                    console.log("current_form: ", current_form);
                    console.log("current_button: ", current_button);

                    current_button.addEventListener("click", (event) => {
                        event.preventDefault();
                        current_form.push();
                    })
                </script>
            </div>
        @endforeach
    @endif
@endsection
