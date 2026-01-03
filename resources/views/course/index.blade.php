@extends("layouts.basic")
@section("title")
    course
@endsection
@section("content")
    @if (count($course) > 0)
        <h3 class="text-center">course</h3>
        <div class="admin-course">
            @foreach ($course as $value)
                <div class="admin-course-box">
                    <img src="{{ $value->image }}" class="course-img-size">
                    <p>Title: {{ $value->title }}</p>
                    <p>Description: {{ $value->description ?? 'null' }}</p>
                    <p>Duration: {{ $value->duration }}</p>
                    <p>Price: {{ $value->price }}</p>
                    <p>Start: {{ $value->start }}</p>
                    <p>End: {{ $value->end }}</p>
                    <a href="{{ route('course.edit', ['course' => $value->id]) }}">Redact</a>
                    <form method="post" action="{{ route('course.destroy', ['course' => $value->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button>Delete</button>
                    </form>
                </div>
            @endforeach
            {{ $course->links() }}
        </div>
    @endif
@endsection
