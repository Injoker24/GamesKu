@extends('layouts.main')

@section('title', "Transaction Detail")

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
                            <span class="fw-bolder">Transaction ID</span>
                        </div>
                        <div style="width: 200px;">
                            <span style="text-align: left;">{{ $trDetail->id }}</span>
                        </div>
                    </div>
                    <div class="d-flex mb-1" style="width: 350px; justify-content: space-between; align-items: center;">
                        <div>
                            <span class="fw-bolder">User Email</span>
                        </div>
                        <div style="width: 200px;">
                            <span style="text-align: left;">{{ Auth::user()->email }}</span>
                        </div>
                    </div>
                    <div class="d-flex mb-1" style="width: 350px; justify-content: space-between; align-items: center;">
                        <div>
                            <span class="fw-bolder">Date & Time</span>
                        </div>
                        <div style="width: 200px;">
                            <span style="text-align: left;">{{ $trDetail->created_at }}</span>
                        </div>
                    </div>
                    <div class="d-flex mb-1" style="width: 350px; justify-content: space-between; align-items: center;">
                        <div>
                            <span class="fw-bolder">Payment Status</span>
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

            <div class="transaction-detail-item">
                <h5 style="font-weight: bold;">User ID</h5>
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
                <h5 style="font-weight: bold; ">Payment Method</h5>
                <div class="transaction-detail-payment d-flex align-items-center">
                    <img src="{{ asset('storage/' . $trDetail->paymentType->payment_type_logo ) }}" class="img-flui" alt="..." width="100"></p>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="transaction-detail-due">
                    <h5>Pay Before: <span style="color: var(--accent);">{{ $trDetail->due_date }}</span></h5>
                </div>
            </div>

            <div class="note p-5">
                <h2 class="text-center mb-4 fw-bold">Notes</h2>
                <ul class="fw-normal">
                    <li>Displayed price includes PPN</li>
                    <li>Make sure your Virtual Account number is correct</li>
                    <li>Don't forget to save your payment evidence for the next step</li>
                    <li>Please finish uploading your payment evidence within the alloted time, if you're late, the order will be automatically rejected</li>
                    <li>Wait for our admins to review your order</li>
                    <li>If there are any issues or questions, please contact GamesKu at our social media</li>
                </ul>

            </div>

            <div class="d-flex justify-content-center my-4">
                @if ($trDetail->status == "Waiting for Payment")
                    {{-- <a href="/transaction/{{ $trDetail->id }}/upload" class="badge rounded-pill text-bg-secondary text-decoration-none p-5">UPLOAD PAYMENT</a> --}}
                    <a href="/transaction/{{ $trDetail->id }}/upload" class="upload-payment-button">Upload Payment</a>
                @endif
            </div>
            <div class="d-flex justify-content-center">
                @if ($trDetail->status != "Completed")
                    <a href="#" class="cancel-payment-button">Cancel Transaction</a>
                @endif
            </div>
        </div>
    </div>
    @include('partials.footer')
@endsection
