@extends('layouts.main')

@section('title', trans('home.title'))

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
            <div class="banner-container banner-1-image">
                <h1 style="font-weight: bold;">@lang('home.valo_bundle')</h1>
                <h1 style="font-weight:bold;"><span style="color:var(--accent); font-size: 48px;">GamesKu</span> @lang('home.got_you')</h1>
            </div>
          </div>
          <div class="carousel-item">
            <div class="banner-container banner-2-image">
                <h1 style="font-weight: bold;">@lang('home.diamond_topup')</h1>
                <h1 style="font-weight:bold;"><span style="color:var(--accent); font-size: 48px;">GamesKu</span> @lang('home.make_easy')</h1>
            </div>
          </div>
          <div class="carousel-item">
            <div class="banner-container banner-3-image">
                <h1 style="font-weight: bold;">@lang('home.showbucks_spass')</h1>
                <h1 style="font-weight:bold;"><span style="color:var(--accent); font-size: 48px;">GamesKu</span> @lang('home.is_answer')</h1>
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

    <div class="mt-5 mb-5" style="padding-left: 200px; padding-right: 200px;">
        <div class="main-search-input fl-wrap mb-5">
            <div class="main-search-input-item">
                <form action="/search" method="get">
                    <input type="text" value="" placeholder="@lang('home.search_placeholder')" name="game">
                    <button class="main-search-button" type="submit">@lang('home.search_button')</button>
                </form>
            </div>
        </div>

        @if (!$popularGames->isEmpty())
        <h3 style="margin-bottom: 20px; color: var(--dark); font-weight: bold;">@lang('home.popular_game')</h3>
            @foreach ($popularGames as $pgame)
                <a href="/game/{{ $pgame->name }}">
                    <div class="card bg-dark mb-4 games-card">
                        <img src="{{ asset('storage/' . $pgame->game_img) }}" alt="..." height="150" style="object-fit:cover; object-position:cover; filter:brightness(50%)">
                        <div class="card-img-overlay" style="padding-left: 50px">
                            <img src="{{ asset('storage/' . $pgame->game_logo) }}" alt="" width="75" height="75" style="object-fit:cover; border-radius:10px">
                            <div class="info ms-3" style="color: var(--white);">
                                <h5 class="card-title">{{ $pgame->name }}</h5>
                                <p class="card-text">{{ $pgame->developer }}</p>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        @endif

        <h3 style="margin-bottom: 20px; color: var(--dark); font-weight: bold;">@lang('home.all_game')</h3>
        @forelse ($games as $game)
                <a href="/game/{{ $game->name }}">
                    <div class="card bg-dark mb-4 games-card">
                        <img src="{{ asset('storage/' . $game->game_img) }}" alt="..." height="150" style="object-fit:cover; object-position:cover; filter:brightness(50%)">
                        <div class="card-img-overlay" style="padding-left: 50px">
                            <img src="{{ asset('storage/' . $game->game_logo) }}" alt="" width="75" height="75" style="object-fit:cover; border-radius:10px">
                            <div class="info ms-3" style="color: var(--white);">
                                <h5 class="card-title">{{ $game->name }}</h5>
                                <p class="card-text">{{ $game->developer }}</p>
                            </div>
                        </div>
                    </div>
                </a>
        @empty
            <div style="display: flex; flex-direction: column; align-items: center;">
                <h4 style="font-weight:bold; color: #00000089;"> @lang('home.no_game') </h4>
                <img src="/storage/No Data.png" class="no-data-image" alt="...">
            </div>
        @endforelse
        <div class="view-all-button-container">
            <a href="/allgames" class="view-all-games-button">@lang('home.view_all_game')</a>
        </div>
    </div>
    @include('partials.footer')
@endsection
