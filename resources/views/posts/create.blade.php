@extends(Auth::user() ? 'layouts.navbar_authenticated' : 'layouts.app')

@section('title', 'Posts')

@section('content')

    <div class="d-flex justify-content-center container" style="height: 100%">
        <div class="col">
            <div class="card col-mb-12 single-post bg-3" style="max-width: 1000px">
                <div class="card-body">
                    <div class="row d-flex justify-content-around">
                        <div class="col">
                            <form>
                                <div class="form-group">
                                  <label for="title">Email address</label>
                                  <input type="text" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Title">
                                </div>
                                <div class="form-group">
                                  <label for="ingredients">Password</label>
                                  <input type="text" class="form-control" id="ingredients" placeholder="Ingredients">
                                </div>
                                <div class="form-group">
                                    <label for="instructions">Password</label>
                                    <input type="text" class="form-control" id="instructions" placeholder="Instructions">
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