@extends('layouts.main')

@section('title', 'Login')

@section('container')
    @include('partials.navbar')
    <div class="container-fluid p-5" style="background-color: var(--dark);">
        <div class="container d-flex justify-content-center">
            <h2 class="fw-bolder pb-4" style="color: white">Welcome Back!</h2>
        </div>
        <div class="container" style="width: 800px; background-color: var(--white); padding:0% 5% 0% 5%; border-radius: 40px;">
            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert"> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form style="color: var(--dark);" action="{{ route('login') }}" method="post">
                @csrf
                <h1 class="h1 text-center pt-5 pb-3">Login</h1>

                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example1">Email address</label>
                    <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Enter Your Email Address Here..." value={{ old('email') }}>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example2">Password</label>
                    <input type="password" name="password" id="form2Example2" class="form-control" placeholder="Your Password must be at least 8 characters."/>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger">
                        {{$errors->first()}}
                    </div>
                @endif

                <!-- Register buttons -->
                <div class="text-center d-flex justify-content-between">
                    <p>Don't have an account? <a href="/register">Register</a></p>
                    <a href="#">Forget Password?</a>
                </div>

                <!-- Submit button -->
                <div class="text-center">
                    <button type="submit" class="login-page-button">Login</button>
                </div>
            </form>
        </div>
    </div>
    @include('partials.footer')
@endsection


