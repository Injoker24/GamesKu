@extends('layouts.main')

@section('title', "Upload Payment")

@section('container')
    @include('partials.navbar')
    <div class="transaction-detail-container">
        @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert"> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
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
                <h5 style="font-weight: bold;">Nominal</h5>
                <p class="transaction-detail-data">Rp {{ $trDetail->topup->price }}</p>
            </div>
            <div class="transaction-detail-item">
                <h5 style="font-weight: bold; ">Payment Method</h5>
                <div class="transaction-detail-payment d-flex align-items-center">
                    <img src="{{ asset('storage/' . $trDetail->paymentType->payment_type_logo ) }}" class="img-fluid" alt="..." width="100"></p>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="transaction-detail-due">
                    <h5>Pay Before: <span style="color: var(--accent);">{{ $trDetail->due_date }}</span></h5>
                </div>
            </div>
            <form action="/transaction/{{ $trDetail->id }}/upload" method="POST" enctype="multipart/form-data" class="mt-2 container submit-payment-container">
                @csrf
                <label for="formFile" class="form-label" style="font-weight: bold; font-size: 20px;">Upload Proof of Payment</label>
                <input class="form-control w-25 mb-4" type="file" onchange="loadFile(event)" id="paymentproof" name="paymentproof">
                <img id="output-preview" style="margin-bottom: 20px; max-width: 400px;"/>
                @if($errors->any())
                    <div class="alert alert-danger">
                        {{$errors->first()}}
                    </div>
                @endif
                <button class="upload-payment-button" type="submit">Submit Payment</button>
            </form>
        </div>
    </div>
    @include('partials.footer')
@endsection
