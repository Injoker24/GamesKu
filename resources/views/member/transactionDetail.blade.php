@extends('layouts.main')

@section('title', "Transaction ". $trDetail->id)

@section('container')
    {{-- @dump($trDetail) --}}
    @include('partials.navbar')
    <div class="d-flex mt-5 ms-5">
        <img src="{{ asset('storage' . $trDetail->topup->game->game_logo) }}" class="img-fluid rounded-start" alt="..." width="150">

        <div class="info-detail d-flex flex-column justify-content-center ms-5">
            <span class="h2">{{ $trDetail->topup->game->name }}</span>
            <span>Transaction ID &emsp;{{ $trDetail->id }}</span>
            <span>Email &emsp;&emsp;&emsp;&emsp;&emsp;{{ Auth::user()->email }}</span>
            <span>Date & Time &emsp;&emsp;{{ $trDetail->created_at }}</span>
            <span>Payment Status &emsp;{{ $trDetail->status }}</span>
            <span>No. Virtual Acc &emsp;virtual acc blom bkin </span>
        </div>
    </div>

    <p>USER ID {{ $trDetail->input_name }}</p>
    <p>ITEM {{ $trDetail->topup->amount }} {{ $trDetail->topup->topup_type }}</p>
    <p>NOMINAL: RP {{ $trDetail->topup->price }}</p>
    <p>PAYMENT METHOD <img src="{{ asset('storage/' . $trDetail->paymentType->payment_type_logo ) }}" class="img-fluid rounded-start" alt="..." width="100"></p>
    <p>PAY BEFORE {{ $trDetail->due_date }}</p>

    <div class="note">
        <h2 class="text-center">NOTE</h2>
        <ul class="fw-bold">
            <li> Harga yang tertera sudah termasuk PPN</li>
            <li>Pastikan Nomor Virtual Account sudah benar dan sesuai dengan nominal transaksi</li>
            <li>Segera lakukan pembayaran sesuai waktu yang ditentukan, jika ada keterlambatan maka pesanan akan secara otomatis dibatalkan</li>
            <li>Jika ada kendalan silahkan hubungi kontak pada media sosial GamesKu</li>
            <li>Dimohon untuk menyimpan bukti pembayaran untuk lanjut di langkah selanjutnya</li>
        </ul>

    </div>

    @if ($trDetail->status == "Waiting for Payment")
        <a href="/transaction/{{ $trDetail->id }}/upload" class="badge rounded-pill text-bg-secondary text-decoration-none p-5">UPLOAD PAYMENT</a>
    @endif



@endsection
