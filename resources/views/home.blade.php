@extends(Auth::user() ? 'layouts.navbar_authenticated' : 'layouts.app')

@section('title', 'Posts')

@section('content')

<div class="d-flex justify-content-center container" style="height: 100%">
	<div class="col">
    	<div class="card col-mb-12 single-post bg-3" style="max-width: 1000px">
        	<div class="card-body">
				<h1 class="d-flex justify-content-center">Welcome to FoodBlog.</h1>
				<h1 class="d-flex justify-content-center">A place to share and discover new recipies.</h1>
          	</div>
	  	</div>
	</div>
</div>

@endsection