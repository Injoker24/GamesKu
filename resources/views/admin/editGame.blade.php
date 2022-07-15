@extends('layouts.main')

@section('title', "Edit " . $game->name)

@section('container')
    @include('partials.navbar')
    @dump($game)

    <div class="transaction-detail-container">
        <div class="transaction-fill-container p-5" style="border-radius: 40px">
            <div class="d-flex mb-4">
                <img src="{{ asset('storage' . $game->game_logo) }}" class="transaction-detail-image" alt="..." width="">
            </div>

            <div class="transaction-detail-item">
                <h5 style="font-weight: bold;">Game Name</h5>
                <input type="text" class="transaction-detail-data w-75" value="{{ $game->name }}">
                {{-- <p class="transaction-detail-data">{{ $trDetail->input_name }}</p> --}}
            </div>
            <div class="transaction-detail-item">
                <h5 style="font-weight: bold;">User ID Example</h5>
                <input type="text" class="transaction-detail-data w-75" value="{{ $game->input_example }}">
                {{-- <p class="transaction-detail-data">{{ $trDetail->topup->amount }} {{ $trDetail->topup->topup_type }}</</p> --}}
            </div>
            <div class="transaction-detail-item p-5">
                <h5 class="align-self-center" style="font-weight: bold;">Nominal List</h5>
                <table class="table table-sm table-light me-5 w-100">
                    <thead>
                        <tr class="text-center">
                            <th scope="col" style="width:20%">Nominal</th>
                            <th scope="col" style="width:20%">Price</th>
                            <th scope="col" style="width:20%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($game->topup as $topup)
                        <tr class="text-center" name="buzhidao">
                            <td>{{ $topup->amount }} {{ $topup->topup_type }}</td>
                            <td>Rp.{{ $topup->price }}</td>
                            <td><a href="#" class="badge text-bg-danger rounded-pull text-decoration-none">DELETE</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

            {{-- <div class="d-flex justify-content-start">
                <div class="ms-3">
                    <label for="inputnominal" class="form-label">Input Nominal</label>
                    <input type="text" class="form-control" id="inputnominal" name="inputnominal">
                </div>

                <div class="ms-3">
                    <label for="inputprice" class="form-label">Input Price</label>
                    <input type="text" class="form-control" name="inputprice" id="inputprice">
                </div>

                <button type="button" class="btn text-bg-success rounded-pill ms-3" onclick="addNominal('{{ $game->topup->first()->topup_type }}')">+Add Nominal</button>
            </div> --}}

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary w-25 align-self-center" data-bs-toggle="modal" data-bs-target="#exampleModal">
                +Add Nominal
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Nominal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex justify-content-start">
                        <div class="ms-3">
                            <label for="inputnominal" class="form-label">Input Nominal</label>
                            <input type="text" class="form-control" id="inputnominal" name="inputnominal">
                        </div>

                        <div class="ms-3">
                            <label for="inputprice" class="form-label">Input Price</label>
                            <input type="text" class="form-control" name="inputprice" id="inputprice">
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="addNominal('{{ $game->topup->first()->topup_type }}')" data-bs-dismiss="modal">Add</button>
                    </div>
                </div>
                </div>
            </div>

            <a href="/manage-game/{{ $game->name }}/update" class="badge text-bg-success rounded-pill">UPDATE</a>
        </div>
    </div>


@endsection
