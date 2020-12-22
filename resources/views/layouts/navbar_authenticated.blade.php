<!DOCTYPE html>

<html lang="en">

    <head>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

		<script src="{{ asset('js/app.js') }}" defer></script>

		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}" />

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Food Blog Home </title>
	</head>
	
	@php
		use App\Models\Profile;
		$user = Auth::user();
		$profileID = $user->profile->id;
	@endphp

    <body style="background-image: url({{ URL::to('/images/backgroundImage.png') }}); background-size: cover; background-attachment: fixed;">
          <nav class="navbar navbar-expand-lg navbar-light bg-1 sticky-top" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">
			<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myNavbar">
				<span class="navbar-toggler-icon"></span>                     
			</button>
			<a class="navbar-brand" href="{{ route('home') }}">Food Blog</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="navbar-nav">
					<li class="nav-item"><a class="nav-link" href="{{ route('posts.index') }}" style="font-size: 15px">Posts</a></li>
					<li class="nav-item"><a class="nav-link" href="{{ route('profile.show', ['id' => $profileID]) }}" style="font-size: 15px">Profile</a></li>
					<li class="nav-tiem"><a class="nav-link" href="{{ route('posts.create') }}" style="font-size: 15px">Create Post</a></li>
					<li class="nav-tiem"><a class="nav-link" href="{{ route('recipies.show') }}" style="font-size: 15px">Random Recipie</a></li>
					<li class="nav-item">
					<form method="POST" action="{{ route('logout') }}">
						@csrf
						<a class="nav-link" href="{{route('logout')}}"
								onclick="event.preventDefault();
											this.closest('form').submit();" style="font-size: 15px">
							Log Out
						</a>
					</form>
				</li>
			</ul>
		  </nav>
        <div>
        	@yield('content')
        </div>
    </body>
</html>