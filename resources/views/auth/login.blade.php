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
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email" class="form-text">Email address</label>
                                <input type="email" class="form-control input" id="email" aria-describedby="emailHelp" name='email' placeholder="Enter email" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <hr class="solid">
                                <label for="password" class="form-text">Password</label>
                                <input type="password" class="form-control input" id="password" name='password' placeholder="Password">
                            </div>
                            <div class="form-check">
                                <hr class="solid">
                                <label class="form-text" for="check_box">Remember me</label>
                                <input type="checkbox" id="check_box" name="remember">
                            </div>
                            <hr class="solid">
                            <button type="submit" class="button">Login</button>
                            <a href="{{route('password.request')}}">Forgot Password?</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection