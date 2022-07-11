@extends('layouts.main')

@section('title', "Transaction")

@section('container')
    @dump($transactions)
    @foreach ($transactions as $tr)
        @dump($tr->topup, $tr->paymentType, $tr->topup->game)
        {{ $tr->topup->game->name }}
       <img src="{{ asset('storage/' . $tr->topup->game->game_logo) }}" alt="">
    @endforeach

@endsection
