@extends('template.template')

@section('title', 'Home Page')

@section('container')
    @include('partials.navbar')
    @foreach ($games as $game)
        <img src="{{ asset('storage/' . $game->game_img) }}" alt="" width="150">
    @endforeach
@endsection
