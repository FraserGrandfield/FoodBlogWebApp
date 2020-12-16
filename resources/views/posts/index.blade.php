@php
    use App\Models\Post;
@endphp

@extends(Auth::user() ? 'layouts.navbar_authenticated' : 'layouts.app')


@section('title', 'Posts')

@section('content')
    <div class="d-flex justify-content-center container" style="height: 100%">
        <div class="col">
            @foreach ($posts as $post)
                @php
                    $postDB = Post::findOrFail($post->id);   
                @endphp
                <div class="card post bg-3" style="max-width: 1000px;">
                    <div class="row no-gutters" onclick=(window.location.href="{{ route('posts.show', ['id' => $post->id]) }}")>
                        <div class="col-lg-4">
                            <img src="{{ URL::to('/images/' . $post->image) }}" class="card-img post-image" alt="..." width="480px", height="258px">
                        </div>
                        <div class="col-lg-8">
                            <div class="card-body">
                                <h1 class="card-title">{{ $post->title }}</h1>
                                <h2 class="card-text post-text">Hours: {{ $post->cook_time_hours }} Mins: {{ $post->cook_time_mins }}</h2>
                                <div class="row d-flex align-items-center">
                                    <div class="col-lg-1">
                                        <a href="{{ route('profile.show', ['id' => $postDB->profile->id]) }}">
                                            <img src="{{ URL::to('/images/' . $postDB->profile->profile_picture) }}" class="post-profile-image">
                                        </a>
                                    </div>
                                    <div class="col-lg-11">
                                        <h2 class="card-text post-text" >
                                            By: {{ $postDB->profile->user->name }}
                                        </h2>
                                    </div>
                                </div>                   
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div style="margin-top: 20px">
        {{ $posts->links() }}
    </div>

@endsection