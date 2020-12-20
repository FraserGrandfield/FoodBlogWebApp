
@extends(Auth::user() ? 'layouts.navbar_authenticated' : 'layouts.app')

@section('title', 'Posts')

@section('content')

    <div class="d-flex justify-content-center container" style="height: 100%">
        <div class="col">
            <div class="card col-mb-12 single-post bg-3">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="{{ URL::to('/images/' . $post->image) }}" class="card-img-top post-show-image" alt="..." width="480px", height="258px">
                    </div>
                    <div class="col-lg-6">
                        <h1 class="card-title post-text" style="margin-top: 10px">{{ $post->title }}</h1>
                        <h2 class="card-text post-text">Hours: {{ $post->cook_time }}</h2>
                        @if(Auth::id() === $post->profile->user->id)
                            <form method="GET" action="{{ route('posts.edit', ['id' => $post->id]) }}">
                                <button type="submit" class="button">Edit</button>
                            </form>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="row d-flex justify-content-around">
                        <div class="col-lg-5 post-info bg-1">
                            <h1 class="d-flex justify-content-center">Ingredients</h1>
                            <ul>
                                @foreach ($ingredients as $ingredient)
                                    <li class="ingredients-text">{{ $ingredient->ingredient }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-lg-5 post-info bg-1">
                            <h1 class="d-flex justify-content-center">Instructions</h1>
                            <h2 class="card-text post-text">{{ $post->instructions }}</h2>
                        </div>
                    </div>
                    <div class="row d-flex align-items-center no-gutters">
                        <a href="{{ route('profile.show', ['id' => $post->profile->id]) }}" style="margin-right: 4px">
                            <img src="{{ URL::to('/images/' . $post->profile->profile_picture) }}" class="post-profile-image">
                        </a>
                        <h2 class="card-text post-text" >
                            By: {{ $post->profile->user->name }}
                        </h2>
                    </div>
                </div>
            </div>

            <div id="app">
            <example-component id="{{ $post->id }}" profileId="{{ $profileId }}" loggedIn="{{ $loggedIn }}"></example-component>
            </div>
        </div>
    </div>

@endsection