@extends("layouts.basic")
@section("title")
    Order
@endsection
@section("content")
    @if (count($order) > 0)
        <h3 class="text-center">Order</h3>
        <div class="admin-order">
            @foreach ($order as $value)
                <div class="admin-order-box">
                    <img src="{{ $value->image }}" class="order-img-size">
                    <p>Title: {{ $value->title }}</p>
                    <p>Description: {{ $value->description ?? 'null' }}</p>
                    <p>Duration: {{ $value->duration }}</p>
                    <p>Price: {{ $value->price }}</p>
                    <p>Start: {{ $value->start }}</p>
                    <p>End: {{ $value->end }}</p>
                    <a href="{{ route('order.edit', ['order' => $value->id]) }}">Redact</a>
                    <form method="post" action="{{ route('order.destroy', ['order' => $value->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button>Delete</button>
                    </form>
                </div>
            @endforeach
            {{ $order->links() }}
        </div>
    @endif
@endsection
