@extends('layouts.main')

@section('title', $games->name)

@section('container')
    @include('partials.navbar')
    {{-- @dump($games, $games->topup, $payments) --}}
    <div class="game-detail-container">
        <div style="border-radius: 40px; overflow: hidden;">
            <div>
                <img class="detail-image" src="{{ asset('storage/' . $games->game_img) }}" alt="">
            </div>
            <div class="form-game-detail-container">
                <h3 class="section-title" style="font-weight: bold;">{{ $games->name }}</h3>
                <form action="/home/{{ $games->name }}/topup" method="POST" class="mx-5" enctype="multipart/form-data">
                    @csrf
                    <div class="my-3 w-50 mx-5 align-self-center">
                        <label for="userID" class="form-label">Input User ID</label>
                        <input style="width: 400px;" type="text" class="form-control" id="userID" name="userID" placeholder="For example: {{ $games->input_example }}">
                    </div>
                    <label class="form-label">Choose Nominal</label>
                    <div class="row">
                        @foreach ($games->topup as $topup)
                        <div class="col-4">
                            <button type="button" class="topup-type-button" id="amount{{ $topup->id }}" onclick="addPrice({{ $topup->price }})">{{ $topup->amount }} {{ $topup->topup_type }}</button>
                        </div>

                        @endforeach
                        <p id="priceinput" name="priceinput">Price: </p>
                        {{-- input bawah ni jangan dihapus ya --}}
                        <input type="hidden" name="price" value="" id="forprice">
                    </div>

                    <div class="row">
                        @foreach ($payments as $payment)
                        <div class="col-4">
                            <input type="radio" class="btn-check" name="btnradio" id="btnradio{{ $payment->id }}" autocomplete="off" onclick="getPaymentType({{ $payment->id }})">
                            <label class="btn btn-outline-primary ms-3" for="btnradio{{ $payment->id }}">
                                <img src="{{ asset('storage/' . $payment->payment_type_logo) }}" alt="" width="100" height="50" class="align-middle">
                            </label>
                        </div>
                        @endforeach
                        {{-- input bawah ni jangan dihapus ya --}}
                        <input type="hidden" name="payment" value="" id="forpayment">
                    </div>

                    <button type="submit" class="btn btn-primary">BUY NOW</button>
                </form>
            </div>
        </div>
    </div>
@endsection
