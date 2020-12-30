@extends(Auth::user() ? 'layouts.navbar_authenticated' : 'layouts.app')

@section('title', 'Posts')

@section('content')

    <div id="app">
        <post-update-component post="{{ $post }}" tags="{{ $tags }}" ingredients_in="{{ $ingredientsIn }}"></post-update-component>
    </div>

@endsection