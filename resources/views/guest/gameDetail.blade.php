@extends('layouts.main')

@section('title', $games->name)

@section('container')
    @include('partials.navbar')
    <div class="modal fade" id="popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">@lang('boarding.default_language')</h5>
            </div>
            <div class="modal-body row d-flex justify-content-center align-items-center my-auto">
                <div class="label-lang col-4">
                    <p>@lang('boarding.choose_language') :</p>
                </div>
                <select class="form-select col-4 w-50" name="lang" id="langHome">
                    <?php
                        $lang = request()->session()->get('locale');
                    ?>
                    <option value="/lang/en"
                        {{ $lang != null && $lang == 'en' ? 'selected' : '' }}>English
                    </option>
                    <option value="/lang/id"
                        {{ $lang != null && $lang == 'id' ? 'selected' : '' }}>Indonesia
                    </option>
                    <option value="/lang/zh_CN"
                        {{ $lang != null && $lang == 'zh_CN' ? 'selected' : '' }}>Mandarin
                    </option>
                    {{-- <option value="/lang/en">English</option>
                    <option value="/lang/id">Indonesia</option>
                    <option value="/lang/zh_CN">Mandarin</option> --}}
                </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="popup-button">@lang('boarding.save_changes')</button>
            </div>
          </div>
        </div>
    </div>
    {{-- @dump($games, $games->topup, $payments) --}}
    <div class="game-detail-container">
        <div style="border-radius: 40px; overflow: hidden;">
            <div class="game-detail-banner-container">
                <img class="detail-image" src="{{ asset('storage/' . $games->game_img) }}" alt="">
                <img class="detail-icon" src="{{ asset('storage/' . $games->game_logo) }}" alt="">
            </div>
            {{-- masih kurang validasi form untuk harus milih semua baru bisa beli --}}
            <div class="form-game-container">
                <h3 class="section-title" style="font-weight: bold; margin-top: 80px;">{{ $games->name }}</h3>
                <form action="/game/{{ $games->name }}" method="POST" class="mx-5 form-game-detail-container" enctype="multipart/form-data">
                    @csrf
                    <div class="my-3 w-100 mx-5 align-self-center topup-part-container">
                        <label for="userID" class="form-label" style="margin-right: 20px;">Input User ID</label>
                        <input style="width: 100%;" type="text" class="form-control @error('userID') is-invalid @enderror" id="userID" name="userID" placeholder="For example: {{ $games->input_example }}">
                        @error('userID')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="my-3 w-100 mx-5 align-self-center topup-part-container">
                        <label>Choose Nominal</label>
                        @if ( $errors->has('price') )
                            <span id="priceHelp" class="form-text text-danger">{{ $errors->first('price') }}</span>
                        @endif
                        <div class="row">
                            @foreach ($games->topup as $topup)
                            <div class="col-3 topup-button-container">
                                <button type="button" class="topup-type-button" id="amount{{ $topup->id }}" onclick="addPrice({{ $topup->price }})">{{ $topup->amount }} {{ $topup->topup_type }}</button>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="price-topup" id="priceinput" name="priceinput">Price: </div>
                    {{-- input bawah ni jangan dihapus ya --}}
                    <input type="hidden" name="price" value="" id="forprice">

                    <div class="my-3 w-100 mx-5 align-self-center topup-part-container">
                        <label>Choose Payment Type</label>
                        @if ( $errors->has('payment') )
                            <span id="paymentHelp" class="form-text text-danger">{{ $errors->first('payment') }}</span>
                        @endif
                        <div class="row">
                            @foreach ($payments as $payment)
                            <div class="col-4 topup-button-container">
                                <button type="button" class="payment-type-button" id="btnradio{{ $payment->id }}" onclick="getPaymentType({{ $payment->id }})">
                                    <img src="{{ asset('storage/' . $payment->payment_type_logo) }}" alt="" width="100" height="40" class="align-middle" style="object-fit: fill;">
                                </button>
                            </div>
                            @endforeach
                            {{-- input bawah ni jangan dihapus ya --}}
                            <input type="hidden" name="payment" value="" id="forpayment">
                        </div>
                    </div>
                    @if (Auth::check())
                        @if(Auth::user()->IsAdmin)
                            <a href="/manage-game/{{ $games->name }}" class="buy-now-button" style="text-decoration:none;">Manage</a>
                        @else
                            <button type="submit" class="buy-now-button">Buy Now</button>
                        @endif
                    @else
                        <button type="submit" class="buy-now-button">Buy Now</button>
                    @endif
                </form>
            </div>
        </div>
    </div>
    @include('partials.footer')
@endsection
