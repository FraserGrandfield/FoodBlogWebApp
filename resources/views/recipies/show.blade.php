
@extends(Auth::user() ? 'layouts.navbar_authenticated' : 'layouts.app')

@section('title', 'Posts')

@section('content')


<div class="d-flex justify-content-center container" style="height: 100%">
    <div class="col">
        @foreach ($recipies as $recipie)  
            <div class="card post bg-3" style="max-width: 1000px;">
            <div class="row no-gutters" onclick=(window.location.href="{{ $recipie['sourceUrl'] }}")>
                    <div class="col-md-4">                            
                        <img src="{{ $recipie['image']?? URL::to('/images/defualt_img.png') }}" class="card-img post-image" alt="..." width="480px", height="248px">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h1 class="card-title">{{ $recipie['title'] }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="col">
            <form method="GET" action="{{ route('recipies.show') }}">
                @csrf
                <button type="submit" class="button">New Random Recipie</button>
            </form>
        </div>
    </div>
</div>
@endsection