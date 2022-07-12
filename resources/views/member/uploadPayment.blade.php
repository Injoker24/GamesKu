@extends('layouts.main')

@section('title', "Upload Payment")

@section('container')
    <img src="{{ asset('storage/' . $trDetail->topup->game->game_logo) }}" class="img-fluid rounded-start" alt="...">
    <p>{{ $trDetail->topup->game->name }}</p>
    <p>{{ $trDetail->id }}</p>
    <p>{{ Auth::user()->email }}</p>
    <p>{{ $trDetail->created_at }}</p>
    <p>{{ $trDetail->status }}</p>
    <p>virtual acc blom bkin </p>

    {{-- <div class="mb-3">
        <label for="formFile" class="form-label">Upload Proof of Payment</label>
        <input class="form-control" type="file" id="formFile">
    </div> --}}
    <form action="/transaction/{{ $trDetail->id }}/upload" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="formFile" class="form-label">Upload Proof of Payment</label>
            <input class="form-control w-25" type="file" id="paymentproof" name="paymentproof">
        </div>
        <p>NOTE ASIDFGASDIUGFASUGDFILGAS</p>
        <button class="btn btn-primary" type="submit">SUBMIT</button>
    </form>

@endsection
