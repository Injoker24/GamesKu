@extends('layouts.main')

@section('title', trans('manage_game.title'))

@section('container')
    @include('partials.navbar')

    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert"> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert"> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container-fluid mt-5 mb-5" style="padding-left: 200px; padding-right: 200px;">
        <a href="/manage-game/addGame" class="text-decoration-none">@lang('manage_game.add_game')</a>

        <h3 class="pb-3 pt-3" style="margin-bottom: 20px; color: var(--dark); font-weight: bold;"">@lang('manage_game.game_list')</h3>
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
                        <form action="/manage-game/{{ $game->name }}/delete" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger mx-4">@lang('manage_game.del')</button>
                        </form>
                    </div>
                @endif
            @empty
                <div style="display: flex; flex-direction: column; align-items: center;">
                    <h4 style="font-weight:bold; color: #00000089;"> @lang('manage_game.no_games') </h4>
                    <img src="/storage/No Data.png" class="no-data-image" alt="...">
                </div>
            @endforelse
        </div>

    </div>



    @include('partials.footer')
@endsection
