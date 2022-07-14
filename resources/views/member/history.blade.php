@extends('layouts.main')

@section('title', "History")

@section('container')
    @include('partials.navbar')
    {{-- @dump($histories) --}}
    <div class="container-fluid mt-5" style="padding-left: 180px; padding-right: 180px;">
        <h3 class="pb-3" style="font-weight: bold;">My History</h3>
        <div class="transaction-container">
            @foreach ($histories as $hs)
            <div class="card-transaction w-100 py-5 px-4">
                <div style="display: flex; flex-direction: row; justify-content: center; align-items: center;">
                    <div>
                        <img src="{{ asset('storage/' . $hs->transaction_detail->topup->game->game_logo) }}" class="transaction-image" alt="...">
                    </div>
                    <div class="transaction-text">
                        <h6 class="card-text mb-1">Transaction ID: {{ $hs->transaction_detail->id }}</h6>
                        <h5 class="card-title mb-2">{{ $hs->transaction_detail->topup->game->name }}</h5>
                        @if( $hs->transaction_detail->status == "Completed")
                            <span class="badges badge-pill badge-success">{{ $hs->transaction_detail->status }}</span>
                        @elseif ( $hs->transaction_detail->status == "Rejected")
                            <span class="badges badge-pill badge-rejected">{{ $hs->transaction_detail->status }}</span>
                        @endif
                    </div>
                </div>
                <div style="display: flex; flex-direction: row; justify-content: center; align-items: center;">
                    <div class="transaction-price-container">
                        <h6 class="card-text">{{ $hs->transaction_detail->topup->amount }} {{ $hs->transaction_detail->topup->topup_type }}</h6>
                        <h5 class="card-text" style="color: var(--accent); font-weight: bold;">Rp {{ $hs->transaction_detail->topup->price }}</h5>
                    </div>
                    <a href="/history/{{ $hs->id }}" class="detail-button">See Detail</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @include('partials.footer')
@endsection
