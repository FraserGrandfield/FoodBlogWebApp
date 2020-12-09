@php
    use App\Models\Post;
@endphp

@extends('layouts.app')

@section('title', 'Posts')

@section('content')

    <div class="d-flex justify-content-center container" style="height: 100%">
        <div class="col">
            @foreach ($posts as $post)

            {{-- <li>
                <a href="{{ route('posts.show', ['id' => $post->id]) }}"> {{ $post->title }} </a>
            </li> --}}
            <div class="container bg-3 post">
                <a href="{{ route('posts.show', ['id' => $post->id]) }}">
                    <div class="row" style="height: 100%">
                        <div class="col-sm-4 d-flex align-items-center">
                            <img src="{{ $post->image }}" width="100%" height="90%" style="border-radius: 13px; object-fit: cover">
                        </div>
                        <div class="col">
                            <h1 class="post-text" style="padding-top: 20px; text-decoration: none">{{ $post->title }}</h1>
                            <h2 class="post-text">Hours: {{ $post->cook_time_hours }} Mins: {{ $post->cook_time_mins }}</h2>
                            @php
                                $user = Post::findOrFail($post->id);
                            @endphp
                            <h2 class="post-text">Profile: {{ $user->profile->user->first_name }}</h2>
                        </div>
                    </div>
                </a>
            </div>

        @endforeach
        </div>
    </div>

    {{ $posts->links() }}

@endsection