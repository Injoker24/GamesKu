@extends('template_boarding.template')

@section('title', 'Boarding Page')

@section('container')
    <div class="container-fluid d-flex justify-container-center pt-5">
        <div class="container" style="width: 800px">
            <form action="{{ route('register')}}" method="post">
                @csrf
                <h1 class="h1 text-center mt-5 mb-3">Register</h1>

                <!-- Name input -->
                <div class="form-outline mb-3">
                    <label class="form-label" for="form2Example1">Name</label>
                    <input type="text" name="name" id="form2Example1" class="form-control form-custom" placeholder="Enter Your Name Here..." value="{{ old('name') }}"/>
                </div>

                <!-- Email input -->
                <div class="form-outline mb-3">
                    <label class="form-label" for="form2Example1">Email address</label>
                    <input type="email" name="email" id="form2Example1" class="form-control form-custom" placeholder="Enter Your Email Address Here..." value="{{ old('email') }}"/>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-3">
                    <label class="form-label" for="form2Example2">Password</label>
                    <input type="password" name="password" id="form2Example2" class="form-control form-custom"  placeholder="Your Password must be at least 8 characters."/>
                </div>

                <div class="form-outline mb-3">
                    <label class="form-label" for="form2Example2">Confirm Password</label>
                    <input type="password" name="confirm_password" id="form2Example2" class="form-control form-custom"  placeholder="Re-type your password"/>
                </div>

                <div class="form-outline mb-3">
                    <div class="col d-flex justify-content-center">
                        <!-- Checkbox -->
                        <div class="form-check">
                            <input class="form-check-input form-custom" type="checkbox" value="true" name="terms" id="form2Example2">
                            <label class="form-check-label" for="form2Example31"> I Agree With Terms and Conditions </label>
                        </div>
                    </div>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger">
                        {{$errors->first()}}
                    </div>
                @endif

                <!-- Register buttons -->
                <div class="text-center">
                    <p>Already have an Account? <a href="/login">Login</a></p>
                </div>

                <!-- Submit button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block mb-4 w-100">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection
