@extends('layouts.main')

@section('title', "@lang('add_game.title')")

@section('container')
    @include('partials.navbar')
    <div class="add-game-container">
        <div class="add-game-fill-container p-5" style="border-radius: 40px">
            <form method="POST" action="/manage-game/addGame" class="mb-5" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="gameName" class="add-label form-label">@lang('add_game.game_nm')</label>
                  <input type="text" class="form-control @error('gameName') is-invalid
                  @enderror" id="gameName" name="gameName">
                  @error('gameName')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="gameDeveloper" class="add-label form-label">@lang('add_game.game_dvlp')</label>
                  <input type="text" class="form-control @error('gameDeveloper') is-invalid
                  @enderror" id="gameDeveloper" name="gameDeveloper">
                  @error('gameDeveloper')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="mb-3">
                    <label for="inputExample" class="add-label form-label">@lang('add_game.user_id_exp')</label>
                    <input type="text" class="form-control @error('inputExample') is-invalid
                    @enderror" id="inputExample" name="inputExample">
                    @error('inputExample')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="gameLogo" class="add-label form-label">@lang('add_game.up_logo')</label>
                    <input type="file" class="form-control @error('gameLogo') is-invalid
                    @enderror" id="gameLogo" name="gameLogo">
                    @error('gameLogo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="gameBG" class="add-label form-label">@lang('add_game.up_bg')</label>
                    <input class="form-control @error('gameBG') is-invalid
                    @enderror" type="file" id="gameBG" name="gameBG">
                    @error('gameBG')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
                </div>

                <div class="mb-3">
                    <label for="topupType" class="add-label form-label">@lang('add_game.tu_type')</label>
                    <input class="form-control @error('topupType') is-invalid
                    @enderror" type="text" id="topupType" name="topupType">
                    @error('topupType')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
                </div>

                <div class="mb-3">
                    <table class="table table-sm table-light me-5 w-100 tableNominal">
                        @if ( $errors->has('nominal') )
                                    <span id="nominalHelp" class="form-text text-danger">{{ $errors->first('nominal') }}</span>
                                @endif
                        <thead>
                            <tr class="text-center">
                                <th scope="col" style="width:20%">NOMINAL</th>
                                <th scope="col" style="width:20%">@lang('add_game.price')</th>
                                <th scope="col" style="width:20%"></th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr  class="text-center">
                                    <td colspan="3" class="p-5" style="background:none;border:none">@lang('add_game.empty')</td>
                                </tr>
                        </tbody>
                    </table>
                </div>

                <button type="button" class="btn btn-primary w-25 align-self-center" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    +@lang('add_game.add_nom')
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">@lang('add_game.add_nom')</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body d-flex justify-content-start">
                            <div class="ms-3">
                                <label for="inputnominal" class="form-label">@lang('add_game.inp_nom')</label>
                                <input type="text" class="form-control" id="inputnominal" name="inputnominal">
                            </div>

                            <div class="ms-3">
                                <label for="inputprice" class="form-label">@lang('add_game.inp_price')</label>
                                <input type="text" class="form-control" name="inputprice" id="inputprice">
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="addNewNominal()">@lang('add_game.add')</button>
                        </div>
                    </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">@lang('add_game.insert')</button>
            </form>
        </div>
    </div>

@endsection
