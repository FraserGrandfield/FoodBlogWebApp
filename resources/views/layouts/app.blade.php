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

    <body style="background-image: url({{ URL::to('/images/backgroundImage.png') }}); background-size: cover; background-attachment: fixed;">
        <div id="app">
            <nav class="navbar navbar-expand-lg navbar-light bg-1 sticky-top" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myNavbar">
                    <span class="navbar-toggler-icon"></span>                     
                </button>
                <a class="navbar-brand" href="{{ route('home') }}" aria-label="Home Button">Food Blog</a>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="{{ route('posts.index') }}" style="font-size: 15px" aria-label="Posts button">Posts</a></li>
                        <li class="nav-tiem"><a class="nav-link" href="{{ route('recipies.show') }}" style="font-size: 15px" aria-label="Randome recipie button">Random Recipie</a></li>
                        <li class="nav-tiem"><a class="nav-link" href="{{ route('register') }}" style="font-size: 15px" aria-label="Sign up button">Sign Up</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}" style="font-size: 15px" aria-label="Login button">Login</a></li>
                    </ul>
                </div>
            </nav>
            <div>
                @yield('content')
            </div>
        </div>
    </body>
</html>