@extends('layouts.main')

@section('title', "History")

@section('container')
    @include('partials.navbar')
    {{-- @dump($histories) --}}
    <div class="container-fluid mt-5" style="padding-left: 160px; padding-right: 160px;">
        <h3 class="pb-3" style="font-weight: bold;">My History</h3>
        <div class="transaction-container">
            @forelse ($histories as $hs)
            <div class="card-transaction w-100 py-5 px-4">
                <div style="display: flex; flex-direction: row; justify-content: center; align-items: center;">
                    <div>
                        <img src="{{ asset('storage/' . $hs->transaction_detail->topup->game->game_logo) }}" class="transaction-image" alt="...">
                    </div>
                    <div class="transaction-text">
                        <h6 class="card-text mb-1">Transaction ID: {{ $hs->transaction_detail->id }}</h6>
                        <h5 class="card-title mb-1">{{ $hs->transaction_detail->topup->game->name }}</h5>
                        <p class="card-text mb-2" style="font-size: 14px;">Created: <span style="color: var(--accent);">{{ $hs->transaction_detail->created_at }}</span></p>
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
                    <a href="/history/{{ $hs->id }}/delete" class="remove-button">X</a>
                </div>
            </div>
            @empty
                <div style="display: flex; flex-direction: column; align-items: center;">
                    <h4 style="font-weight:bold; color: #00000089;"> No History Found </h4>
                    <img src="/storage/No Data.png" class="no-data-image" alt="...">
                </div>
            @endforelse
        </div>
    </div>
    @include('partials.footer')
@endsection
