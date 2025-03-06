@extends('layouts.guest')

@section('auth-content')

            <div class="row see-content-on-background w-100 mx-0">
                <div class="auth-content-panel mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <div class="brand-logo d-flex align-items-center">
                            <img class="logo-image" src="{{ Vite::asset('resources/images/keys.png') }}" alt="logo">
                            <h2 class="ps-3 logo-title">{{ config('app.name') }}</h2>
                        </div>
                        <h4 class="text-uppercase text-center">{{ __('Forgot password') }}</h4>

                        <form method="POST" action="{{ route('password.email') }}" class="pt-3 needs-validation" novalidate>
                            @csrf

                            <div class="form-group input-group has-validation">
                                <input type="email" class="form-control form-control-sm initialColorValidation @if($errors->first('email')) is-invalid-custom @endif" id="validationCustomEmail" name="email" value="{{ old('email') }}" required placeholder="E-mail" aria-describedby="inputGroupPrepend">
                                <div class="invalid-feedback">
                                    {{ __('Enter your email address.') }}
                                </div>
                            </div>

                            @include('components.error_list')

                            @include('components.success-status')

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary btn-sm font-weight-medium text-uppercase" >
                                    {{ __('Send to email') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


@endsection















{{--<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>--}}


