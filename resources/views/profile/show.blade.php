
@extends(Auth::user() ? 'layouts.navbar_authenticated' : 'layouts.app')

@section('title', 'Posts')

@section('content')

@php
    use App\Models\Profile;
    $postDB = Profile::findOrFail($profile->id)
@endphp

    <ul>
        <li>Title: {{ $profile->bio }}</li>
    </ul>

@endsection