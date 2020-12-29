@extends('layouts.app')

@section('title', 'Posts')

@section('content')

<div class="d-flex justify-content-center container" style="height: 100%">
    <div class="col">
        <div class="card col-mb-12 single-post bg-3">
            <div class="card-body">
                <div class="row d-flex justify-content-around">
                    <div class="col">
                        <div class="error-div">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="form-text">Name</label>
                                <input type="text" class="form-control input" id="name" aria-describedby="emailHelp" name='name' placeholder="Name" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <hr class="solid">
                                <label for="bio" class="form-text">Bio</label>
                                <input type="text" class="form-control input" id="bio" name='bio' placeholder="Bio" value="{{ old('bio') }}">
                            </div>
                            <div class="form-group">
                                <hr class="solid">
                                <label for="profile_picture" class="form-text">Image</label>
                                <input type="file" class="form-control input" id="profile_picture" name="profile_picture">
                            </div>
                            <div class="form-group">
                                <hr class="solid">
                                <label for="email" class="form-text">Email address</label>
                                <input type="email" class="form-control input" id="email" aria-describedby="emailHelp" name='email' placeholder="Enter email" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <hr class="solid">
                                <label for="password" class="form-text">Password</label>
                                <input type="password" class="form-control input" id="password" name='password' placeholder="Password" value="{{ old('password') }}">
                            </div>
                            <div class="form-group">
                                <hr class="solid">
                                <label for="password_confirmation" class="form-text">Confirm Password</label>
                                <input type="password" class="form-control input" id="password_confirmation" name='password_confirmation' placeholder="Confirm Password">
                            </div>
                            <hr class="solid">
                            <button type="submit" class="button">Create Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
