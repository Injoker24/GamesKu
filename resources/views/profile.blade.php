@extends('layouts.main')

@section('title', 'Profile Page')

@section('container')
    @include('partials.navbar')
    <div class="container">
        <h1>My Profile</h1>
        <div class="text-center">
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
        </div>
        <div class="container mt-3">
            <div class="text-center">
                <h3>Change Password</h3>
            </div>
            <div class="card mb-4" style="width: 100%; padding:0% 5% 0% 5%; border-radius: 40px;">
                <div class="card-body">
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

                        <div class="text-center">
                            <button type="submit" class="login-page-button">Change</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <style>
        input[type=password] {
            border: none;
            border-bottom: 2px solid var(--dark);
            border-radius: 0;
        }
    </style>
    @include('partials.footer')
@endsection
