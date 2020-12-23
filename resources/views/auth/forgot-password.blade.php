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
                        <h2>Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</h2>
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email" class="form-text">Email address</label>
                                <input type="email" class="form-control input" id="email" aria-describedby="emailHelp" name='email' placeholder="Enter email" value="{{ old('email') }}">
                            </div>
                            <hr class="solid">
                            <button type="submit" class="button">Reset Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

