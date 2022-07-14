@extends('layouts.main')

@section('title', "Transaction ". $trDetail->id)

@section('container')
    @include('partials.navbar')
    <div class="d-flex mt-5 ms-5">
        <img src="{{ asset('storage' . $trDetail->topup->game->game_logo) }}" class="img-fluid rounded-start" alt="..." width="150">

        <div class="info-detail d-flex flex-column justify-content-center ms-5">
            <span class="h2">{{ $trDetail->topup->game->name }}</span>
            <span>Transaction ID &emsp;{{ $trDetail->id }}</span>
            <span>Email &emsp;&emsp;&emsp;&emsp;&emsp;{{ Auth::user()->email }}</span>
            <span>Date & Time &emsp;&emsp;{{ $trDetail->created_at }}</span>
            <span>Payment Status &emsp;{{ $trDetail->status }}</span>
            <span>No. Virtual Acc &emsp;virtual acc blom bkin </span>
        </div>
    </div>

    <h2 class="mt-5 text-center">PAYMENT PROOF</h2>
    <form action="/manage-transaction/{{ $trDetail->id }}" method="POST" class="ms-5 mt-5 float-center">
        @csrf
        {{-- imgnya gabisa kecenter :)) --}}
        <img src="{{ asset('storage/' . $trDetail->image_path) }}" class="img-fluid rounded-start float-center" alt="...">

        <br>

        <div class="buttton d-flex justify-content-center">
            <button type="submit" class="btn badge text-bg-success me-3" name="submitbutton" value="accept">ACCEPT</button>
            <button type="submit" class="btn badge text-bg-danger" name="submitbutton" value="reject">REJECT</button>
        </div>
    </form>

@endsection

