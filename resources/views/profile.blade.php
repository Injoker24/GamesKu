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
        {{-- <select class="form-select col-11 w-25" aria-label="Default select example">
            <option value="english" selected>English</option>
            <option value="indonesia">Indonesian</option>
            <option value="mandarin">Mandarin</option>
          </select> --}}

        <select class="form-select col-11 w-25" name="lang" id="lang">
            <?php
                $lang = request()->session()->get('locale');
            ?>

            <option value="/lang/en"
                {{ $lang != null && $lang == 'en' ? 'selected' : '' }}>English
            </option>
            <option value="/lang/id"
                {{ $lang != null && $lang == 'id' ? 'selected' : '' }}>Indonesia
            </option>
            <option value="/lang/zh_CN"
                {{ $lang != null && $lang == 'zh_CN' ? 'selected' : '' }}>Mandarin
            </option>
        </select>

    </div>
    <div class="box">
        <h3>Change Password</h3>
        <form style="color: var(--dark);" action="/profile" method="post">
            @csrf
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example1">Old Password</label>
                <input type="password" name="old_password" id="form2Example1" class="form-control" placeholder="Input Your Old Password" value="{{ old('name') }}"/>
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example1">New Password</label>
                <input type="password" name="new_password" id="form2Example1" class="form-control" placeholder="Input Your New Password" value="{{ old('name') }}"/>
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example1">Confirm Password</label>
                <input type="password" name="confirm_password" id="form2Example1" class="form-control" placeholder="Input Your New Password" value="{{ old('name') }}"/>
            </div>

            @if($errors->any())
                <div class="alert alert-danger">
                    {{$errors->first()}}
                </div>
            @endif

            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert"> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <button type="submit">Change</button>
        </form>
    </div>
    @include('partials.footer')
@endsection
