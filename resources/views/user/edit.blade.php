
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
                {{-- <div class="row">
                    <div class="col">
                        <img src="{{ URL::to('/images/' . $profile->profile_picture) }}" class="card-img-top post-image" alt="...">
                    </div>
                    <div class="col">
                        <h1 class="card-title post-text">{{ $userDB->name }}</h1>
                        <h2 class="card-text post-text">Bio: {{ $profile->bio }}</h2>              
                    </div>
                </div> --}}
            <form method="POST" action="{{ route('user.update', ['id' => $user->id]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="bio">Bio</label>
                    <input type="text" class="form-control" id="bio" name='bio' placeholder="{{ $user->bio }}">
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>

@endsection