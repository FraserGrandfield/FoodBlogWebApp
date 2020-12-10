@php
    use App\Models\Post;
@endphp

@extends(Auth::user() ? 'layouts.navbar_authenticated' : 'layouts.app')


@section('title', 'Posts')

@section('content')

    <div class="d-flex justify-content-center container" style="height: 100%">
        <div class="col">
            @foreach ($posts as $post)
                {{-- <div class="containter">
                    <div class="bg-3 post">
                        <a href="{{ route('posts.show', ['id' => $post->id]) }}">
                            <div class="row">
                                <div class="col-sm-4 d-flex align-items-center">
                                    <img src="{{ $post->image }}" width="100%" height="90%" style="border-radius: 13px; object-fit: cover">
                                </div>
                                <div class="col">
                                    <h1 class="post-text" style="padding-top: 20px; text-decoration: none">{{ $post->title }}</h1>
                                    <h2 class="post-text">Hours: {{ $post->cook_time_hours }} Mins: {{ $post->cook_time_mins }}</h2>
                                    <h2 class="post-text" >
                                        <a href="{{ route('profile.show', ['id' => $user->profile->id]) }}" >Profile: {{ $user->profile->user->name }}</a>
                                    </h2>
                                </div>
                            </div>
                        </a>
                    </div>
                </div> --}}
                <div class="card post" style="max-width: 1000px;">
                    {{-- <a href="{{ route('posts.show', ['id' => $post->id]) }}"> --}}
                    <div class="row no-gutters" onclick=(window.location.href="{{ route('posts.show', ['id' => $post->id]) }}")>
                        <div class="col-md-4">
                            <img src="{{ $post->image }}" class="card-img post-image" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h1 class="card-title">{{ $post->title }}</h1>
                                <h2 class="card-text post-text">Hours: {{ $post->cook_time_hours }} Mins: {{ $post->cook_time_mins }}</h2>
                                @php
                                    $user = Post::findOrFail($post->id);   
                                @endphp
                                <h2 class="card-text post-text" >
                                    By: {{ $user->profile->user->name }}
                                </h2>
                                <a href="{{ route('profile.show', ['id' => $user->profile->id]) }}" >
                                    <img src="{{ $user->profile->profile_picture }}" style="border-radius: 50%; object-fit: cover" width="50vh" height="50vh">
                                </a>
                            </div>
                        </div>
                        </div>
                    {{-- </a> --}}
                  </div>

        @endforeach
        </div>
    </div>

    <div style="margin-top: 20px">
        {{ $posts->links() }}
    </div>

@endsection