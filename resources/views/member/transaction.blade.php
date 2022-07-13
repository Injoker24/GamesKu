@extends('layouts.main')

@section('title', "Transaction")

@section('container')
    @include('partials.navbar')
    {{-- @dump($transactions) --}}
    <div class="container-fluid mt-5 px-0">
        <h1 class="ms-5 ps-5 pb-5">My Transaction</h1>
        @foreach ($transactions as $tr)
            {{-- @dump($tr->topup, $tr->paymentType, $tr->topup->game) --}}
            <div class="card-transaction mb-3 w-100 py-3 px-5">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="row" style="">
                            <div class="col-auto">
                                <img src="{{ asset('storage/' . $tr->topup->game->game_logo) }}" class="img-fluid rounded-4" alt="..." style="height: 9.5rem">
                            </div>
                            <div class="col-8">
                                <h2 class="card-title">{{ $tr->topup->game->name }}</h2>
                                <p class="card-text mb-1">{{ $tr->id }}</p>
                                <p class="card-text my-1">{{ $tr->created_at }}</p>
                                <p class="card-status mt-3">{{ $tr->status }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col border-start border-4 border-dark ps-4" style="height:9.5rem">
                        <div class="row align-items-center">
                            <div class="col-7">
                                <h2 class="card-text">{{ $tr->topup->amount }} {{ $tr->topup->topup_type }}</h2>
                                <h2 class="card-text" style="color:grey">Rp {{ $tr->topup->price }}</h2>
                            </div>
                            <div class="col-5">
                                <a href="/transaction/{{ $tr->id }}" class="btn-see-detail text-decoration-none">SEE DETAIL</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
