@extends('layouts.guest')

@section('auth-content')

        <div class="row see-content-on-background w-100 mx-0">
            <div class="auth-content-panel mx-auto">
                <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                    <div class="brand-logo d-flex align-items-center">
                        <img class="logo-image" src="{{ Vite::asset('resources/images/keys.png') }}" alt="logo">
                        <h2 class="ps-3 logo-title">{{ config('app.name') }}</h2>
                    </div>
                    <h4 class="text-uppercase text-center">{{ __('Reset password') }}</h4>

                    <form method="POST" action="{{ route('password.store') }}" class="pt-3 needs-validation" novalidate>
                        @csrf

                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

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

                        <div class="form-group input-group has-validation">
                            <input type="password" class="form-control form-control-sm @if($errors->first('password')) is-invalid-custom @endif" id="validationCustomConfirmPassword" name="password_confirmation" required placeholder="Heslo ještě jednou" aria-describedby="inputGroupPrepend">
                            <div class="invalid-feedback">
                                {{__('Enter your password again.') }}
                            </div>
                        </div>


                        @include('components.error_list')

                        @include('components.success-status')

                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary btn-sm font-weight-medium" >
                                {{__('Změnit heslo') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection






