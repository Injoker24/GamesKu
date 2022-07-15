@extends('layouts.main')

@section('title', "History  " . $hsDetail->id)

@section('container')
    @include('partials.navbar')
    @dump($hsDetail)

    <div class="d-flex flex-column">
        <span><img src="{{ asset('storage/' . $hsDetail->transaction_detail->topup->game->game_logo) }}" alt=""> </span>
        <span>{{ $hsDetail->transaction_detail->topup->game->name }}</span>
        <span>{{ $hsDetail->transaction_detail_id }}</span>
        <span>{{ Auth::user()->email }}</span>
        <span> {{ $hsDetail->transaction_detail->created_at }}</span>
        <span>{{ $hsDetail->transaction_detail->status }}</span>
        <span>virtual acc blom</span>
        <span>{{ $hsDetail->transaction_detail->input_name }}</span>
        <span>{{ $hsDetail->transaction_detail->topup->amount }} {{ $hsDetail->transaction_detail->topup->topup_type }}</span>
        <span>  {{ $hsDetail->transaction_detail->topup->price }}</span>
        <span>
            <img src="{{ asset('storage/' . $hsDetail->transaction_detail->paymentType->payment_type_logo) }}" alt="">
           </span>
    </div>















@endsection
