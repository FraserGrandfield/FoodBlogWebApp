@extends(Auth::user() ? 'layouts.navbar_authenticated' : 'layouts.app')

@section('title', 'Posts')

@section('content')

    <div class="d-flex justify-content-center container" style="height: 100%">
        <div class="col">
            <div class="card col-lg-12 single-post bg-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <form method="POST" action="{{ route('comments.update', ['id' => $comment->id]) }}" enctype="multipart/form-data" id="update">
                                @csrf
                                <div class="form-group">
                                    <label for="comment" class="form-text">Edit Comment</label>
                                    <input type="text" class="form-control input" id="comment" name='comment' placeholder="comment" value="{{ $comment->comment }}">
                                    <div class="error-div">{{ $errors->first('comment') }}</div>
                                </div>
                            </form>
                            <div class="d-flex">
                                <div>
                                    <button type="submit" class="button" form="update">Update Comment</button>  
                                </div>
                                <div class="ml-auto">
                                    <form id="destroy-form" action="{{ route('comments.destroy', ['id' => $comment->id]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="button" type="submit">Delete Comment</button>
                                    </form>
                                </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection