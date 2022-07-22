@extends('layouts.main')

@section('title', 'Search Page')

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
    <div class="mt-5 mb-5" style="padding-left: 200px; padding-right: 200px;">
        <div class="main-search-input fl-wrap mb-5">
            <div class="main-search-input-item">
                <form action="/search" method="get">
                    <input type="text" value="" placeholder="Search Games..." name="game">
                    <button class="main-search-button" type="submit">Search</button>
                </form>
            </div>
        </div>
        <h3 style="margin-bottom: 20px; color: var(--dark); font-weight: bold;">Showing Results for {{ $search }}</h3>
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
                <h4 style="font-weight:bold; color: #00000089;"> No Games Found </h4>
                <img src="/storage/No Data.png" class="no-data-image" alt="...">
            </div>
        @endforelse
    </div>
    @include('partials.footer')
@endsection
