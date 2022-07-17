@extends('layouts.main')

@section('title', 'Profile Page')

@section('container')
    @include('partials.navbar')
    <h1>My Profile</h1>
    <p>Name : {{ $user->name }}</p>
    <p>Email : {{ $user->email }}</p>
    <div class="d-flex col-12">
        <div class="label-lang col-1">
            <p>Language :</p>
        </div>
        <select class="form-select col-11 w-25" aria-label="Default select example">
            <option selected>Open this select menu</option>
            <option value="english">English</option>
            <option value="indonesia">Indonesian</option>
            <option value="mandarin">Mandarin</option>
          </select>
    </div>
    <div class="box">
        <h3>Change Password</h3>

        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">Old Password</label>
            <input type="text" name="name" id="form2Example1" class="form-control" placeholder="Input Your Old Password" value="{{ old('name') }}"/>
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">New Password</label>
            <input type="text" name="name" id="form2Example1" class="form-control" placeholder="Input Your New Password" value="{{ old('name') }}"/>
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">Confirm Password</label>
            <input type="text" name="name" id="form2Example1" class="form-control" placeholder="Input Your New Password" value="{{ old('name') }}"/>
        </div>
    </div>
    @include('partials.footer')
@endsection
