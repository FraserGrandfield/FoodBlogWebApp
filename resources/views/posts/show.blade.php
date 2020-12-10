@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <ul>
        <li>Title: {{ $post->title }}</li>
        <li>Time: {{ $post->cook_time }}</li>
        <li>Instructions: {{ $post->instructions }}</li>
        <li>Profile: {{ $post->profile->name }} {{ $post->profile->user->last_name }}</li>
    </ul>

@endsection