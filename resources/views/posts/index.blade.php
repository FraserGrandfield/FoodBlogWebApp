@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <p>Posts</p>
    <ul>
        @foreach ($posts as $post)

            <li>{{ $post->title}}</li>
            
        @endforeach

@endsection