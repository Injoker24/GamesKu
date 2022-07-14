@extends('layouts.main')

@section('title', "Transaction ". $trDetail->id)

@section('container')
    {{-- @dump($trDetail) --}}
    @include('partials.navbar')
    <div class="transaction-detail-container">
        <div class="transaction-fill-container p-5" style="border-radius: 40px">
            <div class="d-flex ms-5 mb-5 pb-3">
                <img src="{{ asset('storage' . $trDetail->topup->game->game_logo) }}" class="transaction-detail-image ms-5" alt="..." width="">
                <div class="info-detail d-flex flex-column justify-content-center">
                    {{-- <span class="h2">{{ $trDetail->topup->game->name }}</span> --}}
                    <h1>{{ $trDetail->topup->game->name }}</h1>
                    <div class="row align-items-center">
                        <div class="col-4">
                            <span>Transaction ID</span>
                        </div>
                        <div class="col ms-3">
                            <span class="fw-bolder">{{ $trDetail->id }}</span>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-4">
                            <span>Email</span>
                        </div>
                        <div class="col ms-3">
                            <span class="fw-bolder">{{ Auth::user()->email }}</span>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-4">
                            <span>Date & Time</span>
                        </div>
                        <div class="col ms-3">
                            <span class="fw-bolder">{{ $trDetail->created_at }}</span>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-4">
                            <span>Payment Status</span>
                        </div>
                        <div class="col ms-3">
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
                    <div class="row align-items-center">
                        <div class="col-4">
                            <span>No. Virtual Acc</span>
                        </div>
                        <div class="col ms-3">
                            <span class="fw-bolder">virtual acc blom bkin</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="transaction-detail-item">
                <span>User ID</span>
                <p class="transaction-detail-data">{{ $trDetail->input_name }}</p>
            </div>
            <div class="transaction-detail-item">
                <span>Item</span>
                <p class="transaction-detail-data">{{ $trDetail->topup->amount }} {{ $trDetail->topup->topup_type }}</</p>
            </div>
            <div class="transaction-detail-item">
                <span>Nominal</span>
                <p class="transaction-detail-data">Rp {{ $trDetail->topup->price }}</p>
            </div>
            <div class="transaction-detail-item">
                <span>Payment Method</span>
                <div class="transaction-detail-payment d-flex align-items-center">
                    <img src="{{ asset('storage/' . $trDetail->paymentType->payment_type_logo ) }}" class="img-fluid ps-4" alt="..." width="100"></p>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="transaction-detail-due">
                    <span>Pay Before &emsp;&emsp;&emsp;{{ $trDetail->due_date }}</span>
                </div>
            </div>

            <div class="note p-3">
                <h2 class="text-center mb-4">NOTE</h2>
                <ul class="fw-bold">
                    <li> Harga yang tertera sudah termasuk PPN</li>
                    <li>Pastikan Nomor Virtual Account sudah benar dan sesuai dengan nominal transaksi</li>
                    <li>Segera lakukan pembayaran sesuai waktu yang ditentukan, jika ada keterlambatan maka pesanan akan secara otomatis dibatalkan</li>
                    <li>Jika ada kendalan silahkan hubungi kontak pada media sosial GamesKu</li>
                    <li>Dimohon untuk menyimpan bukti pembayaran untuk lanjut di langkah selanjutnya</li>
                </ul>

            </div>

            <div class="d-flex justify-content-center my-4">
                @if ($trDetail->status == "Waiting for Payment")
                    {{-- <a href="/transaction/{{ $trDetail->id }}/upload" class="badge rounded-pill text-bg-secondary text-decoration-none p-5">UPLOAD PAYMENT</a> --}}
                    <a href="/transaction/{{ $trDetail->id }}/upload" class="upload-payment-button">UPLOAD<br/>PAYMENT</a>
                @endif
            </div>
            <div class="d-flex justify-content-center">
                @if ($trDetail->status != "Completed")
                    <a href="#" class="cancel-payment-button">CANCEL<br/>TRANSACTION</a>
                @endif
            </div>
        </div>
    </div>

@endsection
