@extends('layouts.main')

@section('title', "Manage Games")

@section('container')
    @include('partials.navbar')
    <div class="container-fluid mt-5 mb-5" style="padding-left: 200px; padding-right: 200px;">
        <a href="/manage-game/add-game">Add Game</a>

        <h3 class="pb-3 pt-3" style="margin-bottom: 20px; color: var(--dark); font-weight: bold;"">Game List</h3>
        <div class="tes d-flex row">
            @forelse ($games as $game)
                @if ($game->deleted == 0)
                    <div class="content" style="width: 90%">
                        <a href="/manage-game/{{ $game->name }}">
                            <div class="card bg-dark mb-4 games-card">
                                <img src="{{ asset('storage/' . $game->game_img) }}" alt="..." height="150" style="object-fit:cover; object-position:cover; filter:brightness(50%)">
                                <div class="game-content">

                                    <div class="card-img-overlay" style="padding-left: 50px">
                                        <img src="{{ asset('storage/' . $game->game_logo) }}" alt="" width="75" height="75" style="object-fit:cover; border-radius:10px">
                                        <div class="info ms-3" style="color: var(--white);">
                                            <h5 class="card-title">{{ $game->name }}</h5>
                                            <p class="card-text">{{ $game->developer }}</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </a>
                    </div>

                    <div class="delete" style="width:10%;">
                        <form action="/manage-game/{{ $game->id }}/delete" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger mx-4" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </div>
                @endif
            @empty
                <div style="display: flex; flex-direction: column; align-items: center;">
                    <h4 style="font-weight:bold; color: #00000089;"> No Games Found </h4>
                    <img src="/storage/No Data.png" class="no-data-image" alt="...">
                </div>
            @endforelse
        </div>

    </div>



    @include('partials.footer')
@endsection
