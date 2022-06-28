@extends('template.template')

@section('title', 'Boarding Page')

@section('container')
    <div class="container h-100">
        <div class="row">
            <h1 class="text-center">TopUp Store</h1>
        </div>
        <div class="d-flex justify-content-around">
            <button type="button" class="btn btn-outline-dark" onclick="location.href='{{ route('login_page') }}'">Login</button>
            <button type="button" class="btn btn-outline-dark" onclick="location.href='{{ route('register_page') }}'">Register</button>
        </div>
    </div>
@endsection
