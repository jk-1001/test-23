@extends('layout.master')

@section('content')

<section id="search">

</section>
<section id="character-list">
    <div class="container">
        <div class="row">
            @foreach($characters['results'] as $char)
                <div class="col-12 col-md-6">
                    <img src="{{ $char['image'] }}" alt="{{ $char['name'] }} from the show Rick and Morty" />
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
