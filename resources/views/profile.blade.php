@extends('layouts.main')

@section('title', 'Profile Page')

@section('container')
    @include('partials.navbar')
    <h1>{{ $user->id }}</h1>

    @include('partials.footer')
@endsection
