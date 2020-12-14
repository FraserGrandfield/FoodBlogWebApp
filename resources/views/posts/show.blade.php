
@extends(Auth::user() ? 'layouts.navbar_authenticated' : 'layouts.app')

@section('title', 'Posts')

@section('content')

    <div class="d-flex justify-content-center container" style="height: 100%">
        <div class="col">
            <div class="card col-mb-12 single-post bg-3" style="max-width: 1000px">
                <div class="row">
                    <div class="col">
                        <img src="{{ URL::to('/images/' . $post->image) }}" class="card-img-top post-image" alt="...">
                    </div>
                    <div class="col">
                        <h1 class="card-title post-text">{{ $post->title }}</h1>
                        <h2 class="card-text post-text">Hours: {{ $post->cook_time_hours }} Mins: {{ $post->cook_time_mins }}</h2>
                        @if(Auth::id() === $post->profile->user->id)
                            <form method="GET" action="{{ route('posts.edit', ['id' => $post->id]) }}">
                                <button type="submit" class="button">Edit</button>
                            </form>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="row d-flex justify-content-around">
                        <div class="col-md-5 post-info bg-1">
                            <h1 class="d-flex justify-content-center">Ingredients</h1>
                                <h2 class="card-text post-text">{{ $post->ingredients }}</h2>
                        </div>
                        <div class="col-md-5 post-info bg-1">
                            <h1 class="d-flex justify-content-center">Instructions</h1>
                            <h2 class="card-text post-text">{{ $post->instructions }}</h2>
                        </div>
                    </div>
                    <h2 class="card-text post-text">By: {{ $post->profile->user->name }}</h2>
                </div>
            </div>
    
            @php
                $comments = $post->comments   
            @endphp
            <div id="app">
                @foreach ($comments as $comment)
                    <example-component :comment="{{ json_encode($comment) }}" />
                @endforeach
            </div>
        </div>
    </div>

@endsection