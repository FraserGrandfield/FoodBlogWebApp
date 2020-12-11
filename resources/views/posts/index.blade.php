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
                            <div class="row">
                                <div class="col-sm-4 d-flex align-items-center">
                                    <img src="{{ $post->image }}" width="100%" height="90%" style="border-radius: 13px; object-fit: cover">
                                </div>
                                <div class="col">
                                    <h1 class="post-text" style="padding-top: 20px; text-decoration: none">{{ $post->title }}</h1>
                                    <h2 class="post-text">Hours: {{ $post->cook_time_hours }} Mins: {{ $post->cook_time_mins }}</h2>
                                    @php
                                        $user = Post::findOrFail($post->id);   
                                    @endphp
                                    <h2 class="post-text" >
                                        <a href="{{ route('profile.show', ['id' => $user->profile->id]) }}" >Profile: {{ $user->profile->user->name }}</a>
                                    </h2>
                                </div>
                            </div>
                    </div>
                </div> --}}

                <div class="card post bg-3" style="max-width: 1000px;">
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
                                    <img src="{{ $user->profile->profile_picture }}" class="post-profile-image">
                                </a>
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