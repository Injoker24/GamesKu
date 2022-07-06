@extends('template_web.template')

@section('title', 'Home Page')

@section('container')
    @foreach ($games as $game)
        <img src="{{ asset('storage/' . $game->game_img) }}" alt="">
    @endforeach
@endsection
