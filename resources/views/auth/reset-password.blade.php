{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password" class="block font-medium text-sm text-gray-700">
                    {{ __('Password') }}
                </label>

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label for="password_confirmation" class="block font-medium text-sm text-gray-700">
                    {{ __('Confirm Password') }}
                </label>

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Reset Password') }}
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
                        <div class="error-div">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <form method="POST" action="{{ route('password.update') }}" enctype="multipart/form-data">
                            @csrf
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
                            <button type="submit" class="button">Update Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
