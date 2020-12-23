@extends(Auth::user() ? 'layouts.navbar_authenticated' : 'layouts.app')

@section('title', 'Posts')

@section('content')

    <div>
        <post-create-component></post-create-component>
    </div>

@endsection