@extends(Auth::user() ? 'layouts.navbar_authenticated' : 'layouts.app')

@section('title', 'Posts')

@section('content')

    <div class="d-flex justify-content-center container" style="height: 100%">
        <div class="col">
            <div class="card col-mb-12 single-post bg-3" style="max-width: 1000px">
                <div class="card-body">
                    <div class="row d-flex justify-content-around">
                        <div class="col">
                        <form method="POST" action="{{ route('posts.store') }}">
                            @csrf
                                <div class="form-group">
                                  <label for="title">Title</label>
                                  <input type="text" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Title" name="title">
                                </div>
                                <div class="form-group">
                                    <label for="time_hours">How many hours</label>
                                    <input type="number" class="form-control" id="time_hours" placeholder="Hours" name="time_hours">
                                </div>
                                <div class="form-group">
                                    <label for="time_mins">How many Minutes</label>
                                    <input type="number" class="form-control" id="time_mins" placeholder="Mins" name="time_mins">
                                </div>
                                <div class="form-group">
                                  <label for="ingredients">Ingredients</label>
                                  <input type="text" class="form-control" id="ingredients" placeholder="Ingredients" name="ingredients">
                                </div>
                                <div class="form-group">
                                    <label for="instructions">Instructions</label>
                                    <input type="text" class="form-control" id="instructions" placeholder="Instructions" name="instructions">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection