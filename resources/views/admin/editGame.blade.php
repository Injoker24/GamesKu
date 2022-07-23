@extends('layouts.main')

@section('title', "@lang('edit_game.title') " . $game->name)

@section('container')
    @include('partials.navbar')
    @dump($game)

    <div class="transaction-detail-container">
        <div class="transaction-fill-container p-5" style="border-radius: 40px">
            <form action="/manage-game/{{ $game->name }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="d-flex mb-4">
                    <img src="{{ asset('storage/' . $game->game_logo) }}" class="transaction-detail-image" alt="..." width="">
                </div>

                <div class="transaction-detail-item">
                    <h5 style="font-weight: bold;">@lang('edit_game.game_nm')</h5>
                    <input type="text" class="transaction-detail-data w-75" name="gameName" value="{{ $game->name }}">
                    {{-- <p class="transaction-detail-data">{{ $trDetail->input_name }}</p> --}}
                </div>

                <div class="transaction-detail-item">
                    <h5 style="font-weight: bold;">@lang('edit_game.game_dvlp')</h5>
                    <input type="text" class="transaction-detail-data w-75" name="gameDeveloper" value="{{ $game->developer }}">
                    {{-- <p class="transaction-detail-data">{{ $trDetail->input_name }}</p> --}}
                </div>

                <div class="transaction-detail-item">
                    <h5 style="font-weight: bold;">@lang('edit_game.user_id_exp')</h5>
                    <input type="text" class="transaction-detail-data w-75" name="inputExample" value="{{ $game->input_example }}">
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
                <button type="button" class="btn btn-primary w-25 align-self-center" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    +@lang('edit_game.add_nom')
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

                <button type="submit" class="btn btn-success w-25 align-self-center">@lang('edit_game.update')</button>
            </form>
        </div>
    </div>


@endsection
