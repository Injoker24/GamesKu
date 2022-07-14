@extends('layouts.main')

@section('title', "Transaction")

@section('container')
    @include('partials.navbar')
    {{-- @dump($transactions) --}}
    <div class="container-fluid mt-5" style="padding-left: 200px; padding-right: 200px;">
        <h3 class="pb-3">My Transactions</h3>
        <div class="transaction-container">
            @foreach ($transactions as $tr)
            <div class="card-transaction mb-3 w-100 py-5 px-5">
                <div style="display: flex; flex-direction: row; justify-content: center; align-items: center;">
                    <div>
                        <img src="{{ asset('storage/' . $tr->topup->game->game_logo) }}" class="transaction-image" alt="...">
                    </div>
                    <div class="transaction-text">
                        <h5 class="card-text mb-1">Transaction ID: {{ $tr->id }}</h5>
                        <h4 class="card-title">{{ $tr->topup->game->name }}</h4>
                        <p class="card-text my-1">{{ $tr->created_at }}</p>
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
                    <div class="transaction-price">
                        <h2 class="card-text">{{ $tr->topup->amount }} {{ $tr->topup->topup_type }}</h2>
                        <h2 class="card-text" style="color:grey">Rp {{ $tr->topup->price }}</h2>
                    </div>
                    <a href="/transaction/{{ $tr->id }}" class="login-button">See Detail</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection
