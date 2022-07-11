@extends('layouts.main')

@section('title', 'Boarding Page')

@section('container')
    @include('partials.navbar')
    <div class="boarding-banner">
        <div class="overlay"></div>
        <div class="text-boarding-container">
            <h2 style="font-weight: bold;">Easy TopUp?</h2>
            <h2 style="font-weight:bold;"><span style="color:var(--accent); font-size: 48px;">GamesKu</span> is Your Solution</h2>
        </div>
        <a href="/register" class="join-button">Join Now</a>
    </div>

    <div class="pt-5 pb-5" style="padding-left: 200px; padding-right: 200px; background-color: #f1f4f1">
        <div class="row align-items-center mr-auto">
            <div class="col-md-6">
                <h3 class="section-title">About Us</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum sunt, unde aperiam aliquid quia repudiandae, ex harum quis amet delectus maxime, tempora possimus aut laboriosam magni corrupti labore. Doloremque, sit?</p>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="widget">
                    <div class="infos-wrapper">
                        <h4 class="about-stat">25</h4>
                        <p>Games Available</p>
                    </div>
                </div>
                <div class="widget">
                    <div class="infos-wrapper">
                        <h4 class="about-stat">7k+</h4>
                        <p>Users registered</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="widget">
                    <div class="infos-wrapper">
                        <h4 class="about-stat">15k+</h4>
                        <p>Transactions Completed</p>
                    </div>
                </div>
                <div class="widget">
                    <div class="infos-wrapper">
                        <h4 class="about-stat">30%</h4>
                        <p>Cheaper Than Other Sites</p>
                    </div>
                </div>
            </div>
         </div>
    </div>

    <div class="container mt-5" style="padding-left: 140px; padding-right: 140px;">
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
@endsection
