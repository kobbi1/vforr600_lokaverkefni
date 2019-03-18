@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="page-header">
            <h1>{{ $profileUser->name }}</h1>
            <small>Since {{ $profileUser->created_at->diffForHumans() }}</small>
        </div>

        @foreach ($threads as $thread)
            <div class="card">
                <div class="card-header">
                    <div class="level">
                        <span class="flex">
                            <a href="#">{{$thread->creator->name }}</a> posted:
                            {{$thread->title}}
                        </span>

                        <span>
                            {{$thread->created_at->diffForHumans()}}
                        </span>
                    </div>

                </div>

                <div class="card-body">
                    <div class="body">{{ $thread->body }}</div>
                </div>
            </div>
            <br>
        @endforeach

        {{ $threads->links()}}
    </div>
@endsection