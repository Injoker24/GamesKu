@extends('layouts.main')

@section('title', trans('edit_game.title') . " " . $game->name)

@section('container')
    @include('partials.navbar')

    <div class="game-detail-container">
        <div style="border-radius: 40px; overflow: hidden;">
            <form action="/manage-game/{{ $game->name }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="game-detail-banner-container">
                    <div class="detail-image game-bg">
                        <img  src="{{ asset('storage/' . $game->game_img) }}" alt="" id="photobg">
                        <label for="gameBackground" id="gameBackgroundBtn"><i class="bi bi-camera-fill"></i> Change Background</label>
                        <input type="file" id="gameBackground" name="gameBackground" onchange="loadFileBG(event)">
                    </div>
                    <div class="detail-icon game-logo">
                        <img class="" src="{{ asset('storage/' . $game->game_logo) }}" alt="" id="photoLogo">
                        <input type="file" id="gamelogo" name="gamelogo" onchange="loadFileLogo(event)">
                        <label for="gamelogo" id="gameLogoBtn"><i class="bi bi-camera-fill"></i> Change Logo</label>
                    </div>
                </div>
                <div class="form-manage-container">
                    <h3 class="section-title" style="font-weight: bold; margin-top: 80px;">{{ $game->name }}</h3>

                        <div class="transaction-detail-item">
                            <h5 style="font-weight: bold;">@lang('edit_game.game_nm')</h5>
                            <input type="text" class="edit-detail-data" name="gameName" value="{{ $game->name }}">
                            {{-- <p class="transaction-detail-data">{{ $trDetail->input_name }}</p> --}}
                        </div>

                        <div class="transaction-detail-item">
                            <h5 style="font-weight: bold;">@lang('edit_game.game_dvlp')</h5>
                            <input type="text" class="edit-detail-data" name="gameDeveloper" value="{{ $game->developer }}">
                            {{-- <p class="transaction-detail-data">{{ $trDetail->input_name }}</p> --}}
                        </div>

                        <div class="transaction-detail-item">
                            <h5 style="font-weight: bold;">@lang('edit_game.user_id_exp')</h5>
                            <input type="text" class="edit-detail-data" name="inputExample" value="{{ $game->input_example }}">
                        </div>
                        <div class="transaction-detail-item p-5">
                            <h5 class="align-self-center" style="font-weight: bold;">@lang('edit_game.nom_list')</h5>
                            <table class="table table-sm table-light me-5 w-100 tableNominal">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col" style="width:20%">Nominal</th>
                                        <th scope="col" style="width:20%">@lang('edit_game.price')</th>
                                        <th scope="col" style="width:20%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($game->topup)
                                        @foreach ($game->topup as $topup)
                                        @if ($topup->deletedtopup == TRUE)
                                            @continue
                                        @endif
                                        <tr class="text-center">
                                            <td>{{ $topup->amount }} {{ $topup->topup_type }}</td>
                                            <td>Rp.{{ $topup->price }}</td>
                                            <td><button type="button" class="btn btn-danger delete-column" id="deletebutton{{ $topup->id }}">@lang('edit_game.delete')</button></td>
                                        </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>

                            <input type="hidden" name="deleted" value="" id="fordeleted">
                        </div>


                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary w-25 align-self-center mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            + @lang('edit_game.add_nom')
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">@lang('edit_game.add_nom')</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body d-flex justify-content-start">
                                        <div class="ms-3">
                                            <label for="inputnominal" class="form-label">@lang('edit_game.inp_nom')</label>
                                            <input type="text" class="form-control" id="inputnominal" name="inputnominal">
                                        </div>

                                        <div class="ms-3">
                                            <label for="inputprice" class="form-label">@lang('edit_game.inp_price')</label>
                                            <input type="text" class="form-control" name="inputprice" id="inputprice">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('edit_game.cancel')</button>
                                        <button type="button" class="btn btn-primary" onclick="addNominal('{{ $game->topup->first()->topup_type }}')" data-bs-dismiss="modal">@lang('edit_game.add')</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success w-25 align-self-center mb-4">@lang('edit_game.update')</button>
                    </form>
                </div>
            </form>
        </div>
    </div>

    @include('partials.footer')

@endsection
