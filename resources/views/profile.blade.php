@extends('layouts.main')

@section('title', 'Profile Page')

@section('container')
    @include('partials.navbar')
    <div class="container">
        <div class="mt-3">
            <h1>My Profile</h1>
        </div>
        <div class="card-body mt-4 mb-5 mx-auto" style="padding-left: 30%">
            <div class="row">
                <div class="col-2">
                    <p>Name</p>
                </div>
                <div class="col-10">
                    : {{ $user->name }}
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <p>Email</p>
                </div>
                <div class="col-10">
                    <p>: {{ $user->email }}</p>
                </div>
            </div>
            <div class="row">
                <div class="label-lang col-2">
                    <p>Language</p>
                </div>
                <select class="form-select col-10 w-50" name="lang" id="lang">
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
