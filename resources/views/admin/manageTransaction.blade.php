@extends('layouts.main')

@section('title', "@lang('manage_transaction.title')")

@section('container')
    @include('partials.navbar')
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

    <div class="container-fluid mt-5" style="padding-left: 160px; padding-right: 160px;">
        <h3 class="pb-3" style="font-weight: bold;">@lang('manage_transaction.curr_tr')</h3>
        <div class="transaction-container">
            @forelse ($transactions as $tr)
            <div class="card-transaction w-100 py-5 px-4">
                <div style="display: flex; flex-direction: row; justify-content: center; align-items: center;">
                    <div>
                        <img src="{{ asset('storage/' . $tr->topup->game->game_logo) }}" class="transaction-image" alt="...">
                    </div>
                    <div class="transaction-text">
                        <h6 class="card-text mb-1">@lang('manage_transaction.tr_id') {{ $tr->id }}</h6>
                        <h5 class="card-title mb-1">{{ $tr->topup->game->name }}</h5>
                        <p class="card-text mb-2" style="font-size: 14px;">@lang('manage_transaction.dl') <span style="color: var(--accent);">{{ $tr->due_date }}</span></p>
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
                    <a href="/manage-transaction/{{ $tr->id }}" class="detail-button">@lang('manage_transaction.manage')</a>
                </div>
            </div>
            @empty
                <div style="display: flex; flex-direction: column; align-items: center;">
                    <h4 style="font-weight:bold; color: #00000089;"> @lang('manage_transaction.no_tr') </h4>
                    <img src="/storage/No Data.png" class="no-data-image" alt="...">
                </div>
            @endforelse
        </div>
    </div>
    @include('partials.footer')
@endsection
