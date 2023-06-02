@extends('layout.master')
@inject('api', 'App\Http\Controllers\ListController')

@section('content')

<section id="search" class="mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <form class="row gy-2 gx-3 align-items-center" method="GET">
            <div class="col-auto">
                <label class="visually-hidden" for="autoSizingInput">Name</label>
                <input type="text" class="form-control" id="autoSizingInput" name="name" placeholder="Character Name">
            </div>
            <div class="col-auto">
                <label class="visually-hidden" for="autoSizingSelect">Status</label>
                <select class="form-select" name="status" id="autoSizingSelect">
                <option value="" selected>Status</option>
                <option value="alive">Alive</option>
                <option value="dead">Dead</option>
                <option value="unknown">Unknown</option>
                </select>
            </div>
            <div class="col-auto">
                <label class="visually-hidden" for="autoSizingInput">Species</label>
                <input type="text" class="form-control" id="autoSizingInput" name="species" placeholder="Species">
            </div>
            <div class="col-auto">
                <label class="visually-hidden" for="autoSizingSelect">Gender</label>
                <select class="form-select" name="gender" id="autoSizingSelect">
                <option value="" selected>Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="genderless">Genderless</option>
                <option value="unknown">Unknown</option>
                </select>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
            </div>
        </div>
    </div>
</section>
<section id="character-list">
    <div class="container">
        <div class="row">
            @forelse($characters['results'] as $char)
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
                @empty
                <div class="alert alert-danger mt-5" role="alert">
                    No characters found.
                </div>
            @endforelse
        </div>
    </div>
</section>
<section id="pagination">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5 mb-5">
                {{ $paginator->appends(request()->query())->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</section>

@endsection
