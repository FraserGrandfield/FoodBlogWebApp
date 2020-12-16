
@extends(Auth::user() ? 'layouts.navbar_authenticated' : 'layouts.app')

@section('title', 'Posts')

@section('content')


<div class="d-flex justify-content-center container" style="height: 100%">
    <div class="col">
        <div class="card info-card bg-3" style="max-width: 1000px;">
            <div class="col-md-12">
                <div class="card-body d-flex justify-content-center">
                    <h1 class="card-title">A random recipie to try!</h1>
                </div>
            </div>
        </div>
        @foreach ($recipies as $recipie)  
            <div class="card post bg-3" style="max-width: 1000px;">
                <div class="row no-gutters" onclick=(window.location.href="{{ $recipie['sourceUrl'] }}")>
                    <div class="col-md-4">                            
                        <img src="{{ $recipie['image']?? URL::to('/images/defualt_img.png') }}" class="card-img post-image" alt="..." width="480px", height="258px">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h1 class="card-title">{{ $recipie['title']?? 'Unknown' }}</h1>
                            <h2 class="card-title">Cook time: {{ $recipie['readyInMinutes']?? 'Unknown' }} mins</h2>
                            <h2 class="card-title">Source: {{ $recipie['sourceName']?? 'Unknown' }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <form method="GET" action="{{ route('recipies.show') }}" class="d-flex justify-content-center container" style="margin-top: 20px">
            @csrf
            <button type="submit" class="button">New Random Recipie</button>
        </form>
    </div>
</div>
@endsection