@extends('template_boarding.template')

@section('title', 'Login')

@section('container')
    <div class="container-fluid p-5" style="background-color: #1F2833">
        <div class="container d-flex justify-content-center">
            <img src="{{ asset('storage/GamesKu Icon.png') }}" alt="img">
            <h2 class="fw-bolder py-3" style="color: white">Let's Pay and Play</h2>
        </div>
        <div class="container" style="width: 800px; background-color:white; padding:0% 5% 0% 5%">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <h1 class="h1 text-center py-5">LOGIN</h1>

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
                <div class="text-center d-flex justify-content-around">
                    <p>Not have an Account? <a href="/register">Register</a></p>
                    <a href="#">Forget Password?</a>
                </div>

                <!-- Submit button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary rounded-0 my-5 fs-5 btn-block w-50">LOGIN</button>
                </div>
            </form>
        </div>
    </div>

@endsection


