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
                <div class="card post bg-3">
                    <div class="row no-gutters" onclick=(window.location.href="{{ route('posts.show', ['id' => $post->id]) }}")>
                        <div class="col-lg-4">
                            <img src="{{ URL::to('/images/' . $post->image) }}" class="card-img post-index-image" alt="..." width="480px" height="258px">
                        </div>
                        <div class="col-lg-8">
                            <div class="card-body">
                                <h1 class="card-title">{{ $post->title }}</h1>
                                <h2 class="card-text post-text">Mins: {{ $post->cook_time }}</h2>
                                <div class="row d-flex align-items-center">
                                    <a href="{{ route('profile.show', ['id' => $postDB->profile->id]) }}" style="margin-right: 4px">
                                        <img src="{{ URL::to('/images/' . $postDB->profile->profile_picture) }}" class="post-profile-image">
                                    </a>
                                    <h2 class="card-text post-text" >
                                        By: {{ $postDB->profile->user->name }}
                                    </h2>
                                </div>                   
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach    
            <div class="d-flex justify-content-center" style="margin-top: 20px">
                {{ $posts->links() }}
            </div>
        </div>
    </div>

@endsection