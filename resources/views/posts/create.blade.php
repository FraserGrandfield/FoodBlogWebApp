@extends(Auth::user() ? 'layouts.navbar_authenticated' : 'layouts.app')

@section('title', 'Posts')

@section('content')
<span>{{$errors}}</span>

    <div class="d-flex justify-content-center container" style="height: 100%">
        <div class="col">
            <div class="card col-mb-12 single-post bg-3" style="max-width: 1000px">
                <div class="card-body">
                    <div class="row d-flex justify-content-around">
                        <div class="col">
                        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                  <label for="title" class="form-text">Title</label>
                                  <input type="text" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Title" name="title" value="{{ old('title') }}">
                                </div>
                                <div class="form-group">
                                    <label for="time_hours" class="form-text">How many hours</label>
                                    <input type="number" class="form-control" id="time_hours" placeholder="Hours" name="time_hours" value="{{ old('time_hours') }}">
                                </div>
                                <div class="form-group">
                                    <label for="time_mins" class="form-text">How many Minutes</label>
                                    <input type="number" class="form-control" id="time_mins" placeholder="Mins" name="time_mins" value="{{ old('time_mins') }}">
                                </div>
                                <div class="form-group">
                                    <label for="image" class="form-text">Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                                <div class="form-group">
                                  <label for="ingredients" class="form-text">Ingredients</label>
                                  <input type="text" class="form-control" id="ingredients" placeholder="Ingredients" name="ingredients"  value="{{ old('ingredients') }}">
                                </div>
                                <div class="form-group">
                                    <label for="instructions" class="form-text">Instructions</label>
                                    <input type="text" class="form-control" id="instructions" placeholder="Instructions" name="instructions"  value="{{ old('instructions') }}">
                                </div>
                                <button type="submit" class="button">Submit</button>
                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection