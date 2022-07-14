@extends('layouts.main')

@section('title', "Transaction ". $trDetail->id)

@section('container')
    <img src="{{ asset('storage' . $trDetail->topup->game->game_logo) }}" class="img-fluid rounded-start" alt="...">
    <p>{{ $trDetail->topup->game->name }}</p>
    <p>{{ $trDetail->id }}</p>
    <p>{{ Auth::user()->email }}</p>
    <p>{{ $trDetail->created_at }}</p>
    <p>{{ $trDetail->status }}</p>
    <p>virtual acc blom bkin </p>



    <form action="/manage-transaction/{{ $trDetail->id }}" method="POST">
        @csrf
        <img src="{{ asset('storage/' . $trDetail->image_path) }}" class="img-fluid rounded-start" alt="...">

        <button type="submit" class="btn badge text-bg-success" name="submitbutton" value="accept">ACCEPT</button>
        <button type="submit" class="btn badge text-bg-danger" name="submitbutton" value="reject">REJECT</button>
    </form>

@endsection

