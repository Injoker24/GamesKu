@extends('layouts.main')

@section('title', 'Home Page')

@section('container')
    @include('partials.navbar')
    <div class="banner-container">
        <h1>BINGUNG CARI TEMPAT BELI SKIN?</h1>
        <h1><span style="color:var(--accent)">GAMESKU-IN</span> AJA</h1>
    </div>

    <div class="container mt-5">
        <div class="main-search-input fl-wrap mb-5">
            <div class="main-search-input-item">
                <input type="text" value="" placeholder="Search Games...">
            </div>
            <button class="main-search-button">SEARCH</button>
        </div>
        <h1>ALL GAMES</h1>
        @foreach ($games as $game)
            <div class="card bg-dark mb-4 games-card">
                <img src="{{ asset('storage/' . $game->game_img) }}" alt="..." height="150" style="object-fit:cover; object-position:cover; filter:brightness(50%)">
                <div class="card-img-overlay">
                    <img src="{{ asset('storage/' . $game->game_logo) }}" alt="" width="75" height="75" style="object-fit:cover; border-radius:10px">
                    <div class="info ms-3" style="color: var(--accent)">
                        <h5 class="card-title">{{ $game->name }}</h5>
                        <p class="card-text">{{ $game->developer }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
