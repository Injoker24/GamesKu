@extends('layouts.main')

@section('title', "History")

@section('container')
    @include('partials.navbar')
    {{-- @dump($histories) --}}
    <div class="container-fluid mt-5" style="padding-left: 200px; padding-right: 200px;">
        <h3 class="pb-3">My History</h3>
        <div class="transaction-container">
            @foreach ($histories as $hs)
            <div class="card-transaction mb-3 w-100 py-5 px-5">
                <div style="display: flex; flex-direction: row; justify-content: center; align-items: center;">
                    <div>
                        <img src="{{ asset('storage/' . $hs->transaction_detail->topup->game->game_logo) }}" class="transaction-image" alt="...">
                    </div>
                    <div class="transaction-text">
                        <h5 class="card-text mb-1">Transaction ID: {{ $hs->transaction_detail->id }}</h5>
                        <h4 class="card-title">{{ $hs->transaction_detail->topup->game->name }}</h4>
                        <p class="card-text my-1">{{ $hs->transaction_detail->created_at }}</p>
                        @if( $hs->transaction_detail->status == "Completed")
                            <span class="badges badge-pill badge-success">{{ $hs->transaction_detail->status }}</span>
                        @elseif ( $hs->transaction_detail->status == "Rejected")
                            <span class="badges badge-pill badge-rejected">{{ $hs->transaction_detail->status }}</span>
                        @endif
                    </div>
                </div>
                <div style="display: flex; flex-direction: row; justify-content: center; align-items: center;">
                    <div class="transaction-price">
                        <h2 class="card-text">{{ $hs->transaction_detail->topup->amount }} {{ $hs->transaction_detail->topup->topup_type }}</h2>
                        <h2 class="card-text" style="color:grey">Rp {{ $hs->transaction_detail->topup->price }}</h2>
                    </div>
                    <a href="/history/{{ $hs->id }}" class="login-button">See Detail</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
