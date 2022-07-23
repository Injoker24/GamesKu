@extends('layouts.main')

@section('title', trans('history_dtl.title'))

@section('container')
    @include('partials.navbar')
    {{-- @dump($hsDetail) --}}
    <div class="history-detail-container">
        <div class="history-fill-container p-5" style="border-radius: 40px">
            <div class="d-flex mb-4">
                <img src="{{ asset('storage/' . $hsDetail->transaction_detail->topup->game->game_logo) }}" class="transaction-detail-image" alt="..." width="">
                <div class="info-detail d-flex flex-column" style="justify-content: center;">
                    <h3 class="fw-bolder">{{ $hsDetail->transaction_detail->topup->game->name }}</h3>
                    <div class="d-flex mb-1" style="width: 350px; justify-content: space-between; align-items: center;">
                        <div>
                            <span class="fw-bolder">@lang('history_dtl.tr_id')</span>
                        </div>
                        <div style="width: 200px;">
                            <span style="text-align: left;">{{ $hsDetail->transaction_detail_id }}</span>
                        </div>
                    </div>
                    <div class="d-flex mb-1" style="width: 350px; justify-content: space-between; align-items: center;">
                        <div>
                            <span class="fw-bolder">@lang('history_dtl.user_email')</span>
                        </div>
                        <div style="width: 200px;">
                            <span style="text-align: left;">{{ Auth::user()->email }}</span>
                        </div>
                    </div>
                    <div class="d-flex mb-1" style="width: 350px; justify-content: space-between; align-items: center;">
                        <div>
                            <span class="fw-bolder">@lang('history_dtl.date_time')</span>
                        </div>
                        <div style="width: 200px;">
                            <span style="text-align: left;">{{ $hsDetail->transaction_detail->created_at }}</span>
                        </div>
                    </div>
                    <div class="d-flex mb-1" style="width: 350px; justify-content: space-between; align-items: center;">
                        <div>
                            <span class="fw-bolder">@lang('history_dtl.paym_stat')</span>
                        </div>
                        <div style="width: 200px;">
                            @if( $hsDetail->transaction_detail->status == "Completed")
                                <span class="badges badge-pill badge-success">{{ $hsDetail->transaction_detail->status }}</span>
                            @elseif ($hsDetail->transaction_detail->status == "Rejected")
                                <span class="badges badge-pill badge-rejected">{{ $hsDetail->transaction_detail->status }}</span>
                            @elseif($hsDetail->transaction_detail->status == "Cancelled")
                                <span class="badges badge-pill badge-cancelled">{{ $hsDetail->transaction_detail->status }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="d-flex mb-1" style="width: 350px; justify-content: space-between; align-items: center;">
                        <div>
                            <span class="fw-bolder">Virtual Acc</span>
                        </div>
                        <div style="width: 200px;">
                            <span style="text-align: left;">virtual acc blom bkin</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="history-detail-item">
                <h5 style="font-weight: bold;">@lang('history_dtl.user_id')</h5>
                <p class="history-detail-data">{{ $hsDetail->transaction_detail->input_name }}</p>
            </div>
            <div class="history-detail-item">
                <h5 style="font-weight: bold;">Item</h5>
                <p class="history-detail-data">{{ $hsDetail->transaction_detail->topup->amount }} {{ $hsDetail->transaction_detail->topup->topup_type }}</</p>
            </div>
            <div class="history-detail-item">
                <h5 style="font-weight: bold;">Nominal</h5>
                <p class="history-detail-data">Rp {{ $hsDetail->transaction_detail->topup->price }}</p>
            </div>
            <div class="history-detail-item">
                <h5 style="font-weight: bold; ">@lang('history_dtl.paym_method')</h5>
                <div class="history-detail-payment d-flex align-items-center">
                    <img src="{{ asset('storage/' . $hsDetail->transaction_detail->paymentType->payment_type_logo ) }}" class="img-flui" alt="..." width="100"></p>
                </div>
            </div>
        </div>
    </div>
    @include('partials.footer')
@endsection
