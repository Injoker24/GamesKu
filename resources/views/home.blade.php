@extends('layouts.main')

@section('title', 'Home Page')

@section('container')
    @include('partials.navbar')

    <img src="\storage\Banner 1.png" alt="" width="100%" height="400">
    <div class="container mt-5">
        @foreach ($games as $game)
            <div class="card bg-dark">
                <img src="{{ asset('storage/' . $game->game_img) }}" class="card-img" alt="..." height="100" style="object-fit:cover; object-position:cover; filter:brightness(50%)">
                <div class="card-img-overlay">
                    <div class="d-flex">
                        <img src="{{ asset('storage/' . $game->game_logo) }}" alt="" width="50">
                        <div class="info ms-3" style="color: #66FCF1">
                            <h5 class="card-title">{{ $game->name }}</h5>
                            <p class="card-text">{{ $game->developer }}</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <img src="{{ asset('storage/' . $game->game_img) }}" alt="" width="150"> --}}
        @endforeach
    </div>
@endsection
