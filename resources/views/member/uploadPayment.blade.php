@extends('layouts.main')

@section('title', "Upload Payment")

@section('container')
    @include('partials.navbar')
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert"> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

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

    {{-- <div class="mb-3">
        <label for="formFile" class="form-label">Upload Proof of Payment</label>
        <input class="form-control" type="file" id="formFile">
    </div> --}}
    <form action="/transaction/{{ $trDetail->id }}/upload" method="POST" enctype="multipart/form-data" class="mt-5 container">
        @csrf
        <div class="mb-3">
            <label for="formFile" class="form-label">Upload Proof of Payment</label>
            <input class="form-control w-25" type="file" id="paymentproof" name="paymentproof">
        </div>
        @if($errors->any())
            <div class="alert alert-danger">
                {{$errors->first()}}
            </div>
        @endif
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
        <button class="btn btn-primary" type="submit">SUBMIT</button>
    </form>

@endsection
