@extends('layout.master')

@section('content')

<section id="search">

</section>
<section id="character-list">
    <div class="container">
        <div class="row">
            @foreach($characters['results'] as $char)
                <div class="col-12 col-md-3">
                    <div class="card">
                    <img src="{{ $char['image'] }}" class="card-img-top" alt="{{ $char['name'] }} from the show Rick and Morty">
                    <div class="card-body">
                        <h5 class="card-title">{{ $char['name'] }}</h5>
                        <p class="card-text">
                            <span>Species:</span> {{ $char['species'] }}<br>
                            <span>Origin:</span> {{ $char['origin']['name'] }}<br>
                            <span>Episodes:</span>
                        </p>
                    </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection