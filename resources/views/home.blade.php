@extends('layouts.main')

@section('title', 'Home Page')

@section('container')
    @include('partials.navbar')
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="banner-container">
                <h1>BINGUNG CARI TEMPAT BELI SKIN?</h1>
                <h1><span style="color:var(--accent)">GAMESKU-IN</span> AJA</h1>
            </div>
          </div>
          <div class="carousel-item">
            <div class="banner-container">
                <h1>BINGUNG CARI TEMPAT BELI SKIN?</h1>
                <h1><span style="color:var(--accent)">GAMESKU-IN</span> AJA</h1>
            </div>
          </div>
          <div class="carousel-item">
            <div class="banner-container">
                <h1>BINGUNG CARI TEMPAT BELI SKIN?</h1>
                <h1><span style="color:var(--accent)">GAMESKU-IN</span> AJA</h1>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    {{-- <div class="banner-container">
        <h1>BINGUNG CARI TEMPAT BELI SKIN?</h1>
        <h1><span style="color:var(--accent)">GAMESKU-IN</span> AJA</h1>
    </div> --}}

    <div class="container mt-5">
        <div class="main-search-input fl-wrap mb-5">
            <div class="main-search-input-item">
                <input type="text" value="" placeholder="Search Games...">
            </div>
            <button class="main-search-button">SEARCH</button>
        </div>
        <h1>ALL GAMES</h1>
        @foreach ($games as $game)
        <a href="/game/{{ $game->name }}">
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
        </a>
        @endforeach
    </div>
    @include('partials.footer')
@endsection
