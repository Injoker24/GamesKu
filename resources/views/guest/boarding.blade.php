@extends('layouts.main')

@section('title', 'Boarding Page')

@section('container')
    @include('partials.navbar')
    <div class="modal fade" id="popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">@lang('boarding.default_language')</h5>
            </div>
            <div class="modal-body row d-flex justify-content-center align-items-center my-auto">
                <div class="label-lang col-4">
                    <p>@lang('boarding.choose_language') :</p>
                </div>
                <select class="form-select col-4 w-50" name="lang" id="langHome">
                    <?php
                        $lang = request()->session()->get('locale');
                    ?>
                    <option value="/lang/en"
                        {{ $lang != null && $lang == 'en' ? 'selected' : '' }}>English
                    </option>
                    <option value="/lang/id"
                        {{ $lang != null && $lang == 'id' ? 'selected' : '' }}>Indonesia
                    </option>
                    <option value="/lang/zh_CN"
                        {{ $lang != null && $lang == 'zh_CN' ? 'selected' : '' }}>Mandarin
                    </option>
                    {{-- <option value="/lang/en">English</option>
                    <option value="/lang/id">Indonesia</option>
                    <option value="/lang/zh_CN">Mandarin</option> --}}
                </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="popup-button">@lang('boarding.save_changes')</button>
            </div>
          </div>
        </div>
    </div>
    <div class="boarding-banner">
        <div class="overlay"></div>
        <div class="text-boarding-container">
            <h2 style="font-weight: bold;">@lang('boarding.title')</h2>
            <h2 style="font-weight:bold;"><span style="color:var(--accent); font-size: 48px;">GamesKu</span> @lang('boarding.sub_title')</h2>
        </div>
        <a href="/register" class="join-button">@lang('boarding.join_button')</a>
    </div>

    <div class="pt-5 pb-5" style="padding-left: 200px; padding-right: 200px; background-color: #f1f4f1">
        <div class="row align-items-center mr-auto">
            <div class="col-md-6">
                <h3 class="section-title" style="font-weight: bold;">@lang('boarding.about_us')</h3>
                <p>@lang('boarding.content_about_us')</p>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="widget">
                    <div class="infos-wrapper">
                        <h4 class="about-stat">25</h4>
                        <p style="font-weight: bold;">@lang('boarding.games_available')</p>
                    </div>
                </div>
                <div class="widget">
                    <div class="infos-wrapper">
                        <h4 class="about-stat">7k+</h4>
                        <p style="font-weight: bold;">@lang('boarding.user_register')</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="widget">
                    <div class="infos-wrapper">
                        <h4 class="about-stat">15k+</h4>
                        <p style="font-weight: bold;">@lang('boarding.transaction_completed')</p>
                    </div>
                </div>
                <div class="widget">
                    <div class="infos-wrapper">
                        <h4 class="about-stat">30%</h4>
                        <p style="font-weight: bold;">@lang('boarding.cheaper_site')</p>
                    </div>
                </div>
            </div>
         </div>
    </div>

    <div class="mt-5 mb-5" style="padding-left: 200px; padding-right: 200px;">
        <div class="main-search-input fl-wrap mb-5">
            <div class="main-search-input-item">
                <form action="/search" method="get">
                    <input type="text" value="" placeholder="Search Games..." name="game">
                    <button class="main-search-button" type="submit">@lang('boarding.search_button')</button>
                </form>
            </div>
        </div>

        @if (!$popularGames->isEmpty())
        <h3 style="margin-bottom: 20px; color: var(--dark); font-weight: bold;">@lang('boarding.popular_game')</h3>
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

        <h3 style="margin-bottom: 20px; color: var(--dark); font-weight: bold;">@lang('boarding.all_game')</h3>
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
                <h4 style="font-weight:bold; color: #00000089;"> @lang('boarding.no_game') </h4>
                <img src="/storage/No Data.png" class="no-data-image" alt="...">
            </div>
        @endforelse
        <div class="view-all-button-container">
            <a href="/allgames" class="view-all-games-button">@lang('boarding.view_all_game')</a>
        </div>
    </div>
    @include('partials.footer')
@endsection
