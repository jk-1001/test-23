@extends('layout.master')
@inject('api', 'App\Http\Controllers\ListController')

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
                            @foreach($char['episode'] as $episode)
                                <a href="{{ $episode }}">{{ $api->getEpisode($episode) }}</a>
                            @endforeach
                        </p>
                    </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<section id="pagination">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5 mb-5">
                {{ $paginator->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</section>

@endsection
