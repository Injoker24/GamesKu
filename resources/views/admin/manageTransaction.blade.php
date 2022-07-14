@extends('layouts.main')

@section('title', "Manage Transaction")

@section('container')
    @include('partials.navbar')
    {{-- <div class="container-fluid mt-5 px-0">
        <h1 class="ms-5 ps-5 pb-5">My Transaction</h1>
        @foreach ($transactions as $tr)
            @dump($tr->topup, $tr->paymentType, $tr->topup->game)
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
                                <a href="/manage-transaction/{{ $tr->id }}" class="btn-see-detail text-decoration-none">SEE DETAIL</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div> --}}
    @if (session()->has('message'))
        @if (str_contains(session('message'), 'accepted'))
            <div class="alert alert-success alert-dismissible fade show" role="alert"> {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif (str_contains(session('message'), 'rejected'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert"> {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    @endif

    <div class="container-fluid mt-5" style="padding-left: 180px; padding-right: 180px;">
        <h3 class="pb-3" style="font-weight: bold;">Current Transactions</h3>
        <div class="transaction-container">
            @foreach ($transactions as $tr)
            <div class="card-transaction w-100 py-5 px-4">
                <div style="display: flex; flex-direction: row; justify-content: center; align-items: center;">
                    <div>
                        <img src="{{ asset('storage/' . $tr->topup->game->game_logo) }}" class="transaction-image" alt="...">
                    </div>
                    <div class="transaction-text">
                        <h6 class="card-text mb-1">Transaction ID: {{ $tr->id }}</h6>
                        <h5 class="card-title mb-1">{{ $tr->topup->game->name }}</h5>
                        <p class="card-text mb-2" style="font-size: 14px;">Deadline: <span style="color: var(--accent);">{{ $tr->due_date }}</span></p>
                        @if( $tr->status == "Completed")
                            <span class="badges badge-pill badge-success">{{ $tr->status }}</span>
                        @elseif ( $tr->status == "Waiting for Payment")
                            <span class="badges badge-pill badge-waiting">{{ $tr->status }}</span>
                        @elseif ( $tr->status == "In Progress")
                            <span class="badges badge-pill badge-progress">{{ $tr->status }}</span>
                        @elseif ( $tr->status == "Rejected")
                            <span class="badges badge-pill badge-rejected">{{ $tr->status }}</span>
                        @endif
                    </div>
                </div>
                <div style="display: flex; flex-direction: row; justify-content: center; align-items: center;">
                    <div class="transaction-price-container">
                        <h6 class="card-text">{{ $tr->topup->amount }} {{ $tr->topup->topup_type }}</h6>
                        <h5 class="card-text" style="color: var(--accent); font-weight: bold;">Rp {{ $tr->topup->price }}</h5>
                    </div>
                    <a href="/manage-transaction/{{ $tr->id }}" class="detail-button">Manage</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @include('partials.footer')
@endsection
