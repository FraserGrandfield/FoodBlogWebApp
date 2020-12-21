@extends(Auth::user() ? 'layouts.navbar_authenticated' : 'layouts.app')

@section('title', 'Posts')

@section('content')

    {{-- <div class="d-flex justify-content-center container" style="height: 100%">
        <div class="col">
            <div class="card col-lg-12 single-post bg-3">
                <div class="card-body">
                    <div class="row d-flex justify-content-around">
                        <div class="col">
                        <form method="POST" action="{{ route('posts.update', ['id' => $post->id]) }}" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                  <label for="title" class="form-text">Title</label>
                                  <input type="text" class="form-control input" id="title" aria-describedby="emailHelp" placeholder="Title" name="title" value="{{ $post->title }}">
                                  <div class="error-div">{{ $errors->first('title') }}</div>
                                </div>
                                <div class="form-group">
                                    <label for="time_hours" class="form-text">How many hours</label>
                                    <input type="number" class="form-control input" id="time_hours" placeholder="Hours" name="time_hours" value="{{ $post->cook_time_hours }}">
                                    <div class="error-div">{{ $errors->first('time_hours') }}</div>
                                </div>
                                <div class="form-group">
                                    <label for="time_mins" class="form-text">How many Minutes</label>
                                    <input type="number" class="form-control input" id="time_mins" placeholder="Mins" name="time_mins" value="{{ $post->cook_time_mins }}">
                                    <div class="error-div">{{ $errors->first('time_mins') }}</div>
                                </div>
                                <div class="form-group">
                                    <label for="image" class="form-text">Image</label>
                                    <input type="file" class="form-control input" id="image" name="image">
                                    <div class="error-div">{{ $errors->first('image') }}</div>
                                </div>
                                <div class="form-group">
                                  <label for="ingredients" class="form-text">Ingredients</label>
                                  <input type="text" class="form-control input" id="ingredients" placeholder="Ingredients" name="ingredients"  value="{{ $post->ingredients }}">
                                  <div class="error-div">{{ $errors->first('ingredients') }}</div>
                                </div>
                                <div class="form-group">
                                    <label for="instructions" class="form-text">Instructions</label>
                                    <input type="text" class="form-control input" id="instructions" placeholder="Instructions" name="instructions"  value="{{ $post->instructions }}">
                                    <div class="error-div">{{ $errors->first('instructions') }}</div>
                                </div>
                                <button type="submit" class="button">Update Post</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div id="app">
    <post-update-component post="{{ $post }}" tags="{{ $tags }}"></post-update-component>
    </div>

@endsection