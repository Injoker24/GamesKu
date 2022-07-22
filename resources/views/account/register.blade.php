@extends('layouts.main')

@section('title', 'Register')

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
            <h2 class="fw-bolder pb-4" style="color: white">@lang('account.title_register')</h2>
        </div>
        <div class="container" style="width: 800px; background-color: var(--white); padding:0% 5% 0% 5%; border-radius: 40px;">
            <form style="color: var(--dark);" action="{{ route('register') }}" method="post">
                @csrf
                <h1 class="h1 text-center pt-5 pb-3">@lang('account.register')</h1>

                <!-- Name input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example1">@lang('account.name')</label>
                    <input type="text" name="name" id="form2Example1" class="form-control" placeholder="@lang('account.name_placeholder')" value="{{ old('name') }}"/>
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example1">@lang('account.email')</label>
                    <input type="email" name="email" id="form2Example1" class="form-control" placeholder="@lang('account.email_placeholder')" value={{ old('email') }}>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example2">@lang('account.password')</label>
                    <input type="password" name="password" id="form2Example2" class="form-control"  placeholder="@lang('account.password_placeholder')"/>
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example2">@lang('account.confirm_password')</label>
                    <input type="password" name="confirm_password" id="form2Example2" class="form-control"  placeholder="@lang('account.confirm_password_placeholder')"/>
                </div>

                <div class="form-outline">
                    <div class="d-flex justify-content-between">
                        <!-- Checkbox -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="true" name="terms" id="form2Example2">
                            <label class="form-check-label" for="form2Example31"> @lang('account.checkbox') </label>
                        </div>
                        <div class="text-center">
                            <p>@lang('account.href_login') <a href="/login">@lang('account.login')</a></p>
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
                    <button type="submit" class="login-page-button">@lang('account.register')</button>
                </div>
            </form>
        </div>
    </div>
    @include('partials.footer')
@endsection
