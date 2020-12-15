@extends(Auth::user() ? 'layouts.navbar_authenticated' : 'layouts.app')

@section('title', 'Posts')

@section('content')

    <div class="d-flex justify-content-center container" style="height: 100%">
        <div class="col">
            <div class="card col-mb-12 single-post bg-3" style="max-width: 1000px">
                <div class="card-body">
                    <div class="row d-flex justify-content-around">
                        <div class="col">
                            <form method="POST" action="{{ route('comments.update', ['id' => $comment->id]) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="comment" class="form-text">Bio</label>
                                    <input type="text" class="form-control" id="comment" name='comment' placeholder="comment" value="{{ $comment->comment }}">
                                    <div class="error-div">{{ $errors->first('bio') }}</div>
                                </div>
                                <button type="submit" class="button">Update Comment</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection