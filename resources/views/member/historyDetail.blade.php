@extends('layouts.main')

@section('title', "History  " . $hsDetail->id)

@section('container')
    @include('partials.navbar')
    @dump($hsDetail)
@endsection
