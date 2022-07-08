@extends('layouts.main')

@section('title', $games->name)

@section('container')
    @include('partials.navbar')
    @dump($games, $games->topup, $payments)

    <img src="{{ asset('storage/' . $games->game_img) }}" alt="" width="200">
    @foreach ($games->topup as $topup)
    <button type="button" class="btn border border-1 border-dark">{{ $topup->amount }}</button>
    @endforeach

    @foreach ($payments as $payment)
    <button type="button" class="btn border border-1 border-dark">
        <img src="{{ asset('storage/' . $payment->payment_type_logo) }}" alt="" width="100">
    </button>
    @endforeach
@endsection
