@extends('layouts.main')

@section('title', 'Home Page')

@section('container')
    @include('partials.navbar')
    <img src="\storage\Banner 1.png" alt="" width="100%">
    
    @foreach ($games as $game)
        <img src="{{ asset('storage/' . $game->game_img) }}" alt="" width="150">
    @endforeach
@endsection
