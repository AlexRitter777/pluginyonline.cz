@extends('layouts.guest')

@section('auth-content')

        <div class="row see-content-on-background w-100 mx-0">
            <div class="auth-content-panel mx-auto">
                <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                    <div class="brand-logo d-flex align-items-center">
                        <img class="logo-image" src="{{ Vite::asset('resources/images/keys.png') }}" alt="logo">
                        <h2 class="ps-3 logo-title">{{ config('app.name') }}</h2>
                    </div>
                    <h4 class="text-uppercase text-center">{{ __('Login') }}</h4>

                    <form method="POST" action="{{ route('login') }}" class="pt-3 needs-validation" novalidate>
                        @csrf

                         <div class="form-group input-group has-validation">
                            <input type="email" class="form-control form-control-sm initialColorValidation @if($errors->first('email')) is-invalid-custom @endif" id="validationCustomEmail" name="email" value="{{ old('email') }}" required placeholder="E-mail" aria-describedby="inputGroupPrepend">
                            <div class="invalid-feedback">
                                {{__('Enter your email address.') }}
                            </div>
                        </div>

                        <div class="form-group input-group has-validation">
                            <input type="password" class="form-control form-control-sm @if($errors->first('password')) is-invalid-custom @endif" id="validationCustomPassword" name="password" required placeholder="Heslo" aria-describedby="inputGroupPrepend">
                            <div class="invalid-feedback">
                                {{__('Enter your password.') }}
                            </div>
                        </div>

                        @include('components.error_list')

                        @include('components.success-status')


                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary btn-sm font-weight-medium text-uppercase" >
                                {{ __('Sign In') }}
                            </button>
                        </div>

                        <div class="my-2 d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <label class="form-check-label text-muted">
                                    <input type="checkbox" name="remember" id="remember_me" class="form-check-input">
                                    {{ __('Remember me') }}
                                    <i class="input-helper"></i></label>
                            </div>
                            <a href="{{ route('password.request') }}" class="auth-link text-black">{{ __('Forgot your password?') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection



