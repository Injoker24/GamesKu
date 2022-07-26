@extends('layouts.main')

@section('title', trans('manage_transaction_dtl.title') . " " . $trDetail->id)

@section('container')
    @include('partials.navbar')
    <div class="manage-transaction-detail-container">
        <div class="manage-transaction-fill-container p-5" style="border-radius: 40px">
            <div class="d-flex mb-4">
                <img src="{{ asset('storage' . $trDetail->topup->game->game_logo) }}" class="manage-transaction-detail-image" alt="..." width="">
                <div class="info-detail d-flex flex-column" style="justify-content: center;">
                    <h3 class="fw-bolder">{{ $trDetail->topup->game->name }}</h3>
                    <div class="d-flex mb-1" style="width: 350px; justify-content: space-between; align-items: center;">
                        <div>
                            <span class="fw-bolder">@lang('manage_transaction_dtl.tr_id')</span>
                        </div>
                        <div style="width: 200px;">
                            <span style="text-align: left;">{{ $trDetail->id }}</span>
                        </div>
                    </div>
                    <div class="d-flex mb-1" style="width: 350px; justify-content: space-between; align-items: center;">
                        <div>
                            <span class="fw-bolder">@lang('manage_transaction_dtl.user_email')</span>
                        </div>
                        <div style="width: 200px;">
                            <span style="text-align: left;">{{ $trDetail->transaction->user->email }}</span>
                        </div>
                    </div>
                    <div class="d-flex mb-1" style="width: 350px; justify-content: space-between; align-items: center;">
                        <div>
                            <span class="fw-bolder">@lang('manage_transaction_dtl.date_time')</span>
                        </div>
                        <div style="width: 200px;">
                            <span style="text-align: left;">{{ $trDetail->created_at }}</span>
                        </div>
                    </div>
                    <div class="d-flex mb-1" style="width: 350px; justify-content: space-between; align-items: center;">
                        <div>
                            <span class="fw-bolder">@lang('manage_transaction_dtl.paym_stat')</span>
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
                <h5 style="font-weight: bold;">@lang('manage_transaction_dtl.user_id')</h5>
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
                <h5 style="font-weight: bold; ">@lang('manage_transaction_dtl.paym_method')</h5>
                <div class="transaction-detail-payment d-flex align-items-center">
                    <img src="{{ asset('storage/' . $trDetail->paymentType->payment_type_logo ) }}" class="img-flui" alt="..." width="100"></p>
                </div>
            </div>

            <div style="display: flex; flex-direction: column; align-items: center;">
                <h4 class="py-2" style="font-weight: bold; ">@lang('manage_transaction_dtl.prf_paym')</h4>
                <form action="/manage-transaction/{{ $trDetail->id }}" method="POST" class="float-center">
                    @csrf
                    <div class="d-flex justify-content-center mb-5">
                        <img src="{{ asset('storage/' . $trDetail->image_path) }}" style="max-width: 400px;">
                    </div>
                    <div class="d-flex justify-content-between my-4">
                        <button type="submit" class="accept-payment-button me-5" name="submitbutton" value="accept">@lang('manage_transaction_dtl.accept')</button>
                        <button type="submit" class="reject-payment-button ms-5" name="submitbutton" value="reject">@lang('manage_transaction_dtl.reject')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

