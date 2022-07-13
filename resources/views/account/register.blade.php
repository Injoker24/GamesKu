@extends('layouts.main')

@section('title', 'Register')

@section('container')
@include('partials.navbar')
    <div class="container-fluid p-5" style="background-color: var(--dark);">
        <div class="container d-flex justify-content-center">
            <h2 class="fw-bolder pb-4" style="color: white">Let's Pay and Play!</h2>
        </div>
        <div class="container" style="width: 800px; background-color: var(--white); padding:0% 5% 0% 5%; border-radius: 40px;">
            <form style="color: var(--dark);" action="{{ route('register') }}" method="post">
                @csrf
                <h1 class="h1 text-center pt-5 pb-3">Register</h1>

                <!-- Name input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example1">Name</label>
                    <input type="text" name="name" id="form2Example1" class="form-control" placeholder="Enter Your Name Here..." value="{{ old('name') }}"/>
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example1">Email address</label>
                    <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Enter Your Email Address Here..." value={{ old('email') }}>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example2">Password</label>
                    <input type="password" name="password" id="form2Example2" class="form-control"  placeholder="Your Password must be at least 8 characters."/>
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example2">Confirm Password</label>
                    <input type="password" name="confirm_password" id="form2Example2" class="form-control"  placeholder="Re-type your password"/>
                </div>

                <div class="form-outline">
                    <div class="d-flex justify-content-between">
                        <!-- Checkbox -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="true" name="terms" id="form2Example2">
                            <label class="form-check-label" for="form2Example31"> I Agree With Terms and Conditions </label>
                        </div>
                        <div class="text-center">
                            <p>Already have an Account? <a href="/login">Login</a></p>
                        </div>
                    </div>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger">
                        {{$errors->first()}}
                    </div>
                @endif

                <!-- Submit button -->
                <div class="text-center">
                    <button type="submit" class="login-page-button">Register</button>
                </div>
            </form>
        </div>
    </div>

    {{-- <div class="container-fluid p-5" style="background-color: var(--dark);">
        <div class="container d-flex justify-content-center">
            <h2 class="fw-bolder pb-4" style="color: white">Let's Pay and Play</h2>
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
    </div> --}}
    @include('partials.footer')
@endsection
