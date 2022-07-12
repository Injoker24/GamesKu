@extends('layouts.main')

@section('title', "Transaction ". $trDetail->id)

@section('container')
    {{-- @dump($trDetail) --}}
    <img src="{{ asset('storage/' . $trDetail->topup->game->game_logo) }}" class="img-fluid rounded-start" alt="...">
    <p>{{ $trDetail->topup->game->name }}</p>
    <p>{{ $trDetail->id }}</p>
    <p>{{ Auth::user()->email }}</p>
    <p>{{ $trDetail->created_at }}</p>
    <p>{{ $trDetail->status }}</p>
    <p>virtual acc blom bkin </p>
    <p>USER ID {{ $trDetail->input_name }}</p>
    <p>ITEM {{ $trDetail->topup->amount }} {{ $trDetail->topup->topup_type }}</p>
    <p>NOMINAL: RP {{ $trDetail->topup->price }}</p>
    <p>PAYMENT METHOD <img src="{{ asset('storage/' . $trDetail->paymentType->payment_type_logo ) }}" class="img-fluid rounded-start" alt="..." width="100"></p>
    <p>PAY BEFORE BELOM DIBUAT DI DB</p>
    <p>NOTE ASDIOSHDGSIAUOGDDISUGIUGF</p>

    <a href="/transaction/{{ $trDetail->id }}/upload" class="badge rounded-pill text-bg-secondary text-decoration-none p-5">UPLOAD PAYMENT</a>



@endsection
