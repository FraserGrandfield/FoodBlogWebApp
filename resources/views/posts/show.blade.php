
@extends(Auth::user() ? 'layouts.navbar_authenticated' : 'layouts.app')

@section('title', 'Posts')

@section('content')
    <div class="d-flex justify-content-center container" style="height: 100%">
        <div class="col">
            <div class="card col-mb-12 single-post bg-3">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="{{ URL::to('/images/' . $post->image) }}" class="card-img-top post-show-image" alt="Post Image" width="480px" height="258px">
                    </div>
                    <div class="col-lg-6">
                        <h1 class="card-title post-text" style="margin-top: 10px">{{ $post->title }}</h1>
                        <h2 class="card-text post-text">Mins: {{ $post->cook_time }}</h2>
                        <h2 class="card-text post-text">Tags: {{ $postTags ?? 'No Tags' }}</h2>
                        @if(Auth::id() === $post->profile->user->id)
                            <form method="GET" action="{{ route('posts.edit', ['id' => $post->id]) }}">
                                <button type="submit" class="button">Edit</button>
                            </form>
                        @endif
                        @if (Auth::user())
                            @if (Auth::user()->is_admin == 1)
                                <form method="POST" action="{{ route('posts.destroy', ['id' => $post->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="button">Delete Post</button>
                                </form>
                            @endif
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="row d-flex justify-content-around">
                        <div class="col-lg-5 post-info bg-2">
                            <h1 class="d-flex justify-content-center">Ingredients</h1>
                            <ul>
                                @foreach ($ingredients as $ingredient)
                                    <div style="display:flex; flex-wrap: wrap; align-content: space-between;">
                                        <li class="ingredients-text">{{ $ingredient->ingredient }}</li>
                                        @if (count($ingredient->tags) > 0)
                                            <div style="display:flex; align-items: center;">
                                                <i class="info-icon material-icons" style="color: black">info</i>
                                                <span class="tool-tip-text-post">
                                                    Tags:
                                                    <ul style="  list-style-type: disc;">
                                                        @foreach ($ingredient->tags as $tag)
                                                            <li>{{$tag->name}}</li>
                                                        @endforeach
                                                    </ul>
                                                </span>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-lg-5 post-info bg-2">
                            <h1 class="d-flex justify-content-center">Instructions</h1>
                            <h2 class="card-text post-text" style="white-space: pre-wrap;">{{ $post->instructions }}</h2>
                        </div>
                    </div>
                    <div class="row d-flex align-items-center no-gutters">
                        <a href="{{ route('profile.show', ['id' => $post->profile->id]) }}" style="margin-right: 4px" aria-label="Show profile button">
                            <img src="{{ URL::to('/images/' . $post->profile->profile_picture) }}" class="post-profile-image" alt="Profile Picture">
                        </a>
                        <h2 class="card-text post-text" >
                            By: {{ $post->profile->user->name }}
                        </h2>
                    </div>
                </div>
            </div>
            <comment-component id="{{ $post->id }}" profileId="{{ $profileId }}" loggedIn="{{ $loggedIn }}"></comment-component>
        </div>
    </div>

@endsection