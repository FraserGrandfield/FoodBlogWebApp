{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}

@extends('layouts.app')

@section('title', 'Posts')

@section('content')

<div class="d-flex justify-content-center container" style="height: 100%">
    <div class="col">
        <div class="card col-mb-12 single-post bg-3">
            <div class="card-body">
                <div class="row d-flex justify-content-around">
                    <div class="col">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="form-text">Name</label>
                                <input type="text" class="form-control input" id="name" aria-describedby="emailHelp" name='name' placeholder="Name" value="{{ old('name') }}">
                                <div class="error-div">{{ $errors->first('name') }}</div>
                            </div>
                            <div class="form-group">
                                <label for="bio" class="form-text">Bio</label>
                                <input type="text" class="form-control input" id="bio" name='bio' placeholder="Bio" value="{{ old('bio') }}">
                                <div class="error-div">{{ $errors->first('bio') }}</div>
                            </div>
                            <div class="form-group">
                                <label for="profile_picture" class="form-text">Image</label>
                                <input type="file" class="form-control input" id="profile_picture" name="profile_picture">
                                <div class="error-div">{{ $errors->first('profile_picture') }}</div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-text">Email address</label>
                                <input type="email" class="form-control input" id="email" aria-describedby="emailHelp" name='email' placeholder="Enter email" value="{{ old('email') }}">
                                <div class="error-div">{{ $errors->first('email') }}</div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-text">Password</label>
                                <input type="password" class="form-control input" id="password" name='password' placeholder="Password" value="{{ old('password') }}">
                                <div class="error-div">{{ $errors->first('password') }}</div>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation" class="form-text">Confirm Password</label>
                                <input type="password" class="form-control input" id="password_confirmation" name='password_confirmation' placeholder="Confirm Password">
                                <div class="error-div">{{ $errors->first('password_confirmation') }}</div>
                            </div>
                            <button type="submit" class="button">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
