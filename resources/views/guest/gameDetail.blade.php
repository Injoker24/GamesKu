@extends('layouts.main')

@section('title', $games->name)

@section('container')
    @include('partials.navbar')
    {{-- @dump($games, $games->topup, $payments) --}}
    <div class="game-detail-container">
        <div style="border-radius: 40px; overflow: hidden;">
            <div class="game-detail-banner-container">
                <img class="detail-image" src="{{ asset('storage/' . $games->game_img) }}" alt="">
                <img class="detail-icon" src="{{ asset('storage/' . $games->game_logo) }}" alt="">
            </div>
            <div class="form-game-container">
                <h3 class="section-title" style="font-weight: bold; margin-top: 80px;">{{ $games->name }}</h3>
                <form action="/home/{{ $games->name }}/topup" method="POST" class="mx-5 form-game-detail-container" enctype="multipart/form-data">
                    @csrf
                    <div class="my-3 w-100 mx-5 align-self-center topup-button-container">
                        <label for="userID" class="form-label" style="margin-right: 20px;">Input User ID</label>
                        <input style="width: 400px;" type="text" class="form-control" id="userID" name="userID" placeholder="For example: {{ $games->input_example }}">
                    </div>
                    <label class="form-label">Choose Nominal</label>
                    <div class="row">
                        @foreach ($games->topup as $topup)
                        <div class="col-3 topup-button-container">
                            <button type="button" class="topup-type-button" id="amount{{ $topup->id }}" onclick="addPrice({{ $topup->price }})">{{ $topup->amount }} {{ $topup->topup_type }}</button>
                        </div>

                        @endforeach
                    </div>

                    <div class="price-topup" id="priceinput" name="priceinput">Price: </div>
                    {{-- input bawah ni jangan dihapus ya --}}
                    <input type="hidden" name="price" value="" id="forprice">

                    {{-- help bikin ini kek yg diatas warnanya, kek yg buat pick diamond, ato ga help bkin yang diatas kek gni, gw soalnya pake js bikin selected statenya --}}
                    <div class="row">
                        @foreach ($payments as $payment)
                        <div class="col-4 topup-button-container" style="margin-top: 20px;">
                            <input type="radio" class="btn-check" name="btnradio" id="btnradio{{ $payment->id }}" autocomplete="off" onclick="getPaymentType({{ $payment->id }})">
                            <label class="btn btn-outline-primary ms-3" for="btnradio{{ $payment->id }}">
                                <img src="{{ asset('storage/' . $payment->payment_type_logo) }}" alt="" width="100" height="40" class="align-middle" style="object-fit: fill;">
                            </label>
                        </div>
                        @endforeach
                        {{-- input bawah ni jangan dihapus ya --}}
                        <input type="hidden" name="payment" value="" id="forpayment">
                    </div>

                    <button type="submit" class="buy-now-button">Buy Now</button>
                </form>
            </div>
        </div>
    </div>
@endsection
