@extends('layouts.main')

@section('title', trans('history.title'))

@section('container')
    @include('partials.navbar')
    {{-- @dump($histories) --}}
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert"> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="container-fluid mt-5" style="padding-left: 160px; padding-right: 160px;">
        <h3 class="pb-3" style="font-weight: bold;">@lang('history.my_history')</h3>
        <div class="transaction-container">
            @forelse ($histories as $hs)
            <div class="card-transaction w-100 py-5 px-4">
                <div style="display: flex; flex-direction: row; justify-content: center; align-items: center;">
                    <div>
                        <img src="{{ asset('storage/' . $hs->transaction_detail->topup->game->game_logo) }}" class="transaction-image" alt="...">
                    </div>
                    <div class="transaction-text">
                        <h6 class="card-text mb-1">@lang('history.tr_id') {{ $hs->transaction_detail->id }}</h6>
                        <h5 class="card-title mb-1">{{ $hs->transaction_detail->topup->game->name }}</h5>
                        <p class="card-text mb-2" style="font-size: 14px;">@lang('history.created') <span style="color: var(--accent);">{{ $hs->transaction_detail->created_at }}</span></p>
                        @if( $hs->transaction_detail->status == "Completed")
                            <span class="badges badge-pill badge-success">{{ $hs->transaction_detail->status }}</span>
                        @elseif ( $hs->transaction_detail->status == "Rejected")
                            <span class="badges badge-pill badge-rejected">{{ $hs->transaction_detail->status }}</span>
                            {{-- need colour for badge-cancelled --}}
                        @elseif ($hs->transaction_detail->status == "Cancelled")
                            <span class="badges badge-pill badge-cancelled">{{ $hs->transaction_detail->status }}</span>
                        @endif
                    </div>
                </div>
                <div style="display: flex; flex-direction: row; justify-content: center; align-items: center;">
                    <div class="transaction-price-container">
                        <h6 class="card-text">{{ $hs->transaction_detail->topup->amount }} {{ $hs->transaction_detail->topup->topup_type }}</h6>
                        <h5 class="card-text" style="color: var(--accent); font-weight: bold;">Rp {{ $hs->transaction_detail->topup->price }}</h5>
                    </div>
                    <a href="/history/{{ $hs->id }}" class="detail-button">@lang('history.see_dtl')</a>
                    <form action="/history/{{ $hs->id }}/delete" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="remove-button">X</button>
                    </form>
                    {{-- <a href="/history/{{ $hs->id }}/delete" class="remove-button">X</a> --}}
                </div>
            </div>
            @empty
                <div style="display: flex; flex-direction: column; align-items: center;">
                    <h4 style="font-weight:bold; color: #00000089;"> @lang('history.no_history') </h4>
                    <img src="/storage/No Data.png" class="no-data-image" alt="...">
                </div>
            @endforelse
            @if( $histories->count() > 1)
                <form action="/history/delete" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger remove-all-button">@lang('history.remove_all')</button>
                </form>
            @endif
        </div>
    </div>
    @include('partials.footer')
@endsection
