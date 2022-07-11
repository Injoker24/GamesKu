@extends('layouts.main')

@section('title', $games->name)

@section('container')
    @include('partials.navbar')
    {{-- @dump($games, $games->topup, $payments) --}}

    <img src="{{ asset('storage/' . $games->game_img) }}" alt="" width="200">
    <form action="/home/{{ $games->name }}" method="POST" class="mx-5" enctype="multipart/form-data">
        @csrf
        <div class="my-3 w-50 mx-5 align-self-center">
            <label for="userID" class="form-label">Input User ID</label>
            <input type="text" class="form-control" id="userID" name="userID" placeholder="For Example: {{ $games->input_example }}">
        </div>
        <div class="h2 text-center my-3">Choose Nominal</div>
        <div class="row">
            @foreach ($games->topup as $topup)
            <div class="col-4">
                <button type="button" class="btn border border-1 border-dark" id="amount{{ $topup->id }}" onclick="addPrice({{ $topup->price }})">{{ $topup->amount }} {{ $topup->topup_type }}</button>
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

    <script>
        function addPrice(price){
            var priceinput = document.getElementById('priceinput');
            priceinput.innerHTML = "Price: " + price;
            document.getElementById('forprice').value = price;
        }

        function getPaymentType(paymentType){
            document.getElementById('forpayment').value = paymentType;
        }
    </script>
@endsection
