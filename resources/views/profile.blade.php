@extends('layouts.main')

@section('title', trans('profile.title'))

@section('container')
    @include('partials.navbar')
    <div class="container">
        <div class="mt-5">
            <h1 style="color: var(--dark);">@lang('profile.my_profile')</h1>
        </div>
        <div class="card-body mt-4 mb-5 p-4" style="background-color: var(--dark); color: var(--white); border-radius: 10px;">
            <div class="row">
                <div class="col-2">
                    <p>@lang('profile.name')</p>
                </div>
                <div class="col-10">
                    : {{ $user->name }}
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <p>@lang('profile.email')</p>
                </div>
                <div class="col-10">
                    <p>: {{ $user->email }}</p>
                </div>
            </div>
            <div class="row">
                <div class="label-lang col-2">
                    <p>@lang('profile.lang')</p>
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
            <div class="mb-3">
                <h3>@lang('profile.change_pass')</h3>
            </div>
            <div class="card mb-4" style="width: 100%; padding:5% 5% 0% 5%; border-radius: 40px; border: 3px solid var(--dark);">
                <div class="card-body">
                    <form style="color: var(--dark);" action="/profile" method="post">
                        @csrf
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form2Example1">@lang('profile.old_pass')</label>
                            <input type="password" name="old_password" id="form2Example1" class="form-control" placeholder="@lang('profile.old_pass_ph')" value="{{ old('name') }}"/>
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form2Example1">@lang('profile.new_pass')</label>
                            <input type="password" name="new_password" id="form2Example1" class="form-control" placeholder="@lang('profile.new_pass_ph')" value="{{ old('name') }}"/>
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form2Example1">@lang('profile.confirm_pass')</label>
                            <input type="password" name="confirm_password" id="form2Example1" class="form-control" placeholder="@lang('profile.confirm_pass_ph')" value="{{ old('name') }}"/>
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
                            <button type="submit" class="login-page-button">@lang('profile.change_btn')</button>
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
