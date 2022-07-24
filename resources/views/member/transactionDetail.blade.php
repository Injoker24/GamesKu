@extends('layouts.main')

@section('title', trans('transaction_dtl.title'))

@section('container')
    {{-- @dump($trDetail) --}}
    @include('partials.navbar')
    <div class="transaction-detail-container">
        <div class="transaction-fill-container p-5" style="border-radius: 40px">
            <div class="d-flex mb-4">
                <img src="{{ asset('storage' . $trDetail->topup->game->game_logo) }}" class="transaction-detail-image" alt="..." width="">
                <div class="info-detail d-flex flex-column" style="justify-content: center;">
                    <h3 class="fw-bolder">{{ $trDetail->topup->game->name }}</h3>
                    <div class="d-flex mb-1" style="width: 350px; justify-content: space-between; align-items: center;">
                        <div>
                            <span class="fw-bolder">@lang('transaction_dtl.tr_id')</span>
                        </div>
                        <div style="width: 200px;">
                            <span style="text-align: left;">{{ $trDetail->id }}</span>
                        </div>
                    </div>
                    <div class="d-flex mb-1" style="width: 350px; justify-content: space-between; align-items: center;">
                        <div>
                            <span class="fw-bolder">@lang('transaction_dtl.user_email')</span>
                        </div>
                        <div style="width: 200px;">
                            <span style="text-align: left;">{{ Auth::user()->email }}</span>
                        </div>
                    </div>
                    <div class="d-flex mb-1" style="width: 350px; justify-content: space-between; align-items: center;">
                        <div>
                            <span class="fw-bolder">@lang('transaction_dtl.date_time')</span>
                        </div>
                        <div style="width: 200px;">
                            <span style="text-align: left;">{{ $trDetail->created_at }}</span>
                        </div>
                    </div>
                    <div class="d-flex mb-1" style="width: 350px; justify-content: space-between; align-items: center;">
                        <div>
                            <span class="fw-bolder">@lang('transaction_dtl.paym_stat')</span>
                        </div>
                        <div style="width: 200px;">
                            @if( $trDetail->status == "Completed")
                                <span class="badges badge-pill badge-success">{{ $trDetail->status }}</span>
                            @elseif ( $trDetail->status == "Waiting for Payment")
                                <span class="badges badge-pill badge-waiting">{{ $trDetail->status }}</span>
                            @elseif ( $trDetail->status == "In Progress")
                                <span class="badges badge-pill badge-progress">{{ $trDetail->status }}</span>
                            @elseif ( $trDetail->status == "Rejected")
                                <span class="badges badge-pill badge-rejected">{{ $trDetail->status }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="transaction-detail-item">
                <h5 style="font-weight: bold;">@lang('transaction_dtl.user_id')</h5>
                <p class="transaction-detail-data">{{ $trDetail->input_name }}</p>
            </div>
            <div class="transaction-detail-item">
                <h5 style="font-weight: bold;">Item</h5>
                <p class="transaction-detail-data">{{ $trDetail->topup->amount }} {{ $trDetail->topup->topup_type }}</</p>
            </div>
            <div class="transaction-detail-item">
                <h5 style="font-weight: bold;">Nominal</h5>
                <p class="transaction-detail-data">Rp {{ $trDetail->topup->price }}</p>
            </div>
            <div class="transaction-detail-item">
                <h5 style="font-weight: bold; ">@lang('transaction_dtl.paym_method')</h5>
                <div class="transaction-detail-payment d-flex align-items-center">
                    <img src="{{ asset('storage/' . $trDetail->paymentType->payment_type_logo ) }}" class="img-flui" alt="..." width="100"></p>
                </div>
            </div>
            @if ($trDetail->status == "Waiting for Payment")
                <div class="d-flex justify-content-center">
                    <div class="transaction-detail-due">
                        <h5>@lang('transaction_dtl.pay_bfr') <span style="color: var(--accent);">{{ $trDetail->due_date }}</span></h5>
                    </div>
                </div>

                <div class="note p-5">
                    <h2 class="text-center mb-4 fw-bold">@lang('transaction_dtl.notes')</h2>
                    <ul class="fw-normal">
                        <li>@lang('transaction_dtl.n1')</li>
                        <li>@lang('transaction_dtl.n2')</li>
                        <li>@lang('transaction_dtl.n3')</li>
                        <li>@lang('transaction_dtl.n4')</li>
                        <li>@lang('transaction_dtl.n5')</li>
                        <li>@lang('transaction_dtl.n6')</li>
                    </ul>
                </div>
            @endif
            @if ($trDetail->status == "In Progress")
                <div style="display: flex; flex-direction: column; align-items: center;">
                    <h5 style="font-weight: bold; ">@lang('transaction_dtl.paym_prf')</h5>
                    <img src="{{ asset('storage/' . $trDetail->image_path) }}" style="margin-bottom: 20px; max-width: 400px;">
                </div>
            @endif

            @if ($trDetail->status == "Waiting for Payment")
                <div class="d-flex justify-content-center my-4">
                    {{-- <a href="/transaction/{{ $trDetail->id }}/upload" class="badge rounded-pill text-bg-secondary text-decoration-none p-5">UPLOAD PAYMENT</a> --}}
                    <a href="/transaction/{{ $trDetail->id }}/upload" class="upload-payment-button">@lang('transaction_dtl.up_paym')</a>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="/transaction/{{ $trDetail->id }}/cancel" class="cancel-payment-button">@lang('transaction_dtl.cancel_tr')</a>
                </div>
            @endif
        </div>
    </div>
    @include('partials.footer')
@endsection
