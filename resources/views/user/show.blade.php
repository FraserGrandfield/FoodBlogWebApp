
@extends(Auth::user() ? 'layouts.navbar_authenticated' : 'layouts.app')

@section('title', 'Posts')

@section('content')

@php
    use App\Models\Profile;
    use App\Models\User;
    $userDB = User::findOrFail($user->id);
    $profile = Profile::findOrFail($userDB->profile->id);
@endphp

    <div class="d-flex justify-content-center container" style="height: 100%">
        <div class="col">
            <div class="card col-mb-12 single-post bg-3" style="max-width: 1000px">
                <div class="row">
                    <div class="col">
                        <img src="{{ URL::to('/images/' . $profile->profile_picture) }}" class="card-img-top post-image" alt="...">
                    </div>
                    <div class="col">
                        <h1 class="card-title post-text">{{ $userDB->name }}</h1>
                        <h2 class="card-text post-text">Bio: {{ $profile->bio }}</h2>              
                    </div>
                </div>
            </div>
    
            @php
                $posts = $profile->posts;
            @endphp
            
            @foreach ($posts as $post)
                <div class="card post bg-3" style="max-width: 1000px;">
                    <div class="row no-gutters" onclick=(window.location.href="{{ route('posts.show', ['id' => $post->id]) }}")>
                        <div class="col-md-4">
                            <img src="{{ URL::to('/images/' . $post->image) }}" class="card-img post-image" alt="..." width="480px", height="248px">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h1 class="card-title">{{ $post->title }}</h1>
                                <h2 class="card-text post-text">Hours: {{ $post->cook_time_hours }} Mins: {{ $post->cook_time_mins }}</h2>
                                <h2 class="card-text post-text" >
                                    By: {{ $userDB->name }}
                                </h2>
                                <a href="{{ route('user.show', ['id' => $user->id]) }}" >
                                    <img src="{{ URL::to('/images/' . $profile->profile_picture) }}" class="post-profile-image">
                                </a>
                            </div>
                        </div>
                        </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection