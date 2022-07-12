@extends('layouts.main')

@section('title', "Transaction")

@section('container')
    @include('partials.navbar')
    {{-- @dump($transactions) --}}
    @foreach ($transactions as $tr)
        {{-- @dump($tr->topup, $tr->paymentType, $tr->topup->game) --}}
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="{{ asset('storage/' . $tr->topup->game->game_logo) }}" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">{{ $tr->topup->game->name }}</h5>
                  <p class="card-text">{{ $tr->id }}</p>
                <p class="card-text">{{ $tr->created_at }}</p>
                <p class="card-text">{{ $tr->status }}</p>
                <p class="card-text">{{ $tr->topup->amount }} {{ $tr->topup->topup_type }}</p>
                <p class="card-text">Rp {{ $tr->topup->price }}</p>
                <a href="/transaction/{{ $tr->id }}" class="badge rounded-pill text-bg-secondary text-decoration-none">see detail</a>
                </div>
              </div>
            </div>
          </div>


    @endforeach

@endsection
