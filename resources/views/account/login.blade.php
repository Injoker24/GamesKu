@extends('template/template')

@section('title', 'Login')

@section('container')
    <div class="container-fluid d-flex justify-container-center pt-5">
        <div class="container" style="width: 800px">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <h1 class="h1 text-center mb-5">Login</h1>

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
                <button type="submit" class="btn btn-primary mb-4 btn-block w-100">Sign in</button>

            </form>
        </div>
    </div>

@endsection


