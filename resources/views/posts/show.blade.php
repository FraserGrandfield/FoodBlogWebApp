
@extends(Auth::user() ? 'layouts.navbar_authenticated' : 'layouts.app')

@section('title', 'Posts')

@section('content')

    <div class="d-flex justify-content-center container" style="height: 100%">
        <div class="col">
            <div class="card col-mb-12 single-post bg-3" style="max-width: 1000px">
                <img src="{{ $post->image }}" class="card-img-top post-image" alt="...">
                <div class="card-body">
                    <h1 class="card-title post-text">{{ $post->title }}</h1>
                    <h2 class="card-text post-text">Hours: {{ $post->cook_time_hours }} Mins: {{ $post->cook_time_mins }}</h2>
                    <div class="row d-flex justify-content-around">
                        <div class="col-md-5 post-info bg-1">
                            <h1 class="d-flex justify-content-center">Ingrediants</h1>
                            <h2 class="card-text post-text">{{ $post->ingrediants }}</h2>
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
    
            @foreach ($comments as $comment)
                <div class="card col-mb-12 single-post bg-3" style="max-width: 1000px">
                    <div class="card-body">
                        <h1 class="card-title post-text">{{ $comment->profile->user->name }}</h1>
                        <h2 class="card-text post-text">{{ $comment->comment }}</h2>
                    </div>
                </div>
            @endforeach
        </div>
    </div>




@endsection