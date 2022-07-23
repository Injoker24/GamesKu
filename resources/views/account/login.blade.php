@extends('layouts.main')

@section('title', trans('boarding.login'))

@section('container')
    @include('partials.navbar')
    <div class="modal fade" id="popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">@lang('boarding.default_language')</h5>
            </div>
            <div class="modal-body row d-flex justify-content-center align-items-center my-auto">
                <div class="label-lang col-4">
                    <p>@lang('boarding.choose_language') :</p>
                </div>
                <select class="form-select col-4 w-50" name="lang" id="langHome">
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
                    {{-- <option value="/lang/en">English</option>
                    <option value="/lang/id">Indonesia</option>
                    <option value="/lang/zh_CN">Mandarin</option> --}}
                </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="popup-button">@lang('boarding.save_changes')</button>
            </div>
          </div>
        </div>
    </div>
    <div class="container-fluid p-5" style="background-color: var(--dark);">
        <div class="container d-flex justify-content-center">
            <h2 class="fw-bolder pb-4" style="color: white">@lang('account.title_login')</h2>
        </div>
        <div class="container" style="width: 800px; background-color: var(--white); padding:0% 5% 0% 5%; border-radius: 40px;">
            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert"> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form style="color: var(--dark);" action="{{ route('login') }}" method="post">
                @csrf
                <h1 class="h1 text-center pt-5 pb-3">@lang('account.login')</h1>

                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example1">@lang('account.email')</label>
                    <input type="email" name="email" id="form2Example1" class="form-control" placeholder="@lang('account.email_placeholder')" value={{ old('email') }}>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example2">@lang('account.password')</label>
                    <input type="password" name="password" id="form2Example2" class="form-control" placeholder="@lang('account.password_placeholder')"/>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger">
                        {{$errors->first()}}
                    </div>
                @endif

                <!-- Register buttons -->
                <div class="text-center d-flex justify-content-between">
                    <p>@lang('account.href_register') <a href="/register">@lang('account.register')</a></p>
                    <a href="#">@lang('account.forget_password')</a>
                </div>

                <!-- Submit button -->
                <div class="text-center">
                    <button type="submit" class="login-page-button">@lang('account.login')</button>
                </div>
            </form>
        </div>
    </div>
    @include('partials.footer')
@endsection


