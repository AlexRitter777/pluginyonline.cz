
@extends('layouts.account')

@section('dashboard')

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Nastavení uživatele</h4>
            <form class="forms-sample needs-validation" method="POST" action="{{ route('profile.update') }}" class="needs-validation" novalidate>
                @csrf
                @method('patch')

                <div class="form-group">
                    <label>Email/Login</label>
                    <p class="card-description">{{ $user->email }}</p>
                </div>

                <div class="form-group has-validation">
                    <label for="name" class="labels mb-1">Jméno uživatele</label>
                    <input name="name" type="text" class="form-control form-control-sm initialColorValidation @if($errors->first('name')) is-invalid-custom @endif" {{--id="validationCustomName"--}} required {{--aria-describedby="inputGroupPrepend"--}} value="{{ $user->name }}">
                    <div class="invalid-feedback">
                        Zadejte prosím jméno.
                    </div>
                </div>

                @include('components.error_list')

                @include('components.success-status')

                <button class="btn btn-primary me-2" type="submit">Uložit změny</button>
            </form>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-body">
            <h4 class="card-title">Změnit heslo</h4>
            <form method="POST" action="{{ route('password.update') }}" class="forms-sample needs-validation" novalidate>
            @csrf
            @method('put')

                <div class="form-group has-validation">
                    <label for="current_password" class="labels mb-1">Stávající heslo</label>
                    <input type="password" name="current_password" class="form-control form-control-sm initialColorValidation" required  value="">
                    <div class="invalid-feedback">
                        Zadejte prosím stávající heslo.
                    </div>
                </div>
                <div class="form-group has-validation">
                    <label for="password" class="labels mb-1">Nové heslo</label>
                    <input type="password" name="password" class="form-control form-control-sm initialColorValidation" required  value="">
                    <div class="invalid-feedback">
                        Zadejte prosím nové heslo.
                    </div>
                </div>
                <div class="form-group has-validation">
                    <label for="password_confirmation" class="labels mb-1">Zadejte prosím nové heslo ještě jednou</label>
                    <input type="password" name="password_confirmation" class="form-control form-control-sm initialColorValidation"  required value="">
                    <div class="invalid-feedback">
                        Zadejte prosím nové heslo ještě jednou.
                    </div>
                </div>

                @if ($errors->updatePassword->any())

                    <div class="alert alert-danger rounded-0 form-errors scroll-message">
                        <ul class="list-unstyled">
                            @foreach ($errors->updatePassword->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session()->has('status-password-updated'))
                    <div class="alert alert-success scroll-message">
                        {{ session('status-password-updated') }}
                    </div>
                @endif


                <button class="btn btn-primary me-2" type="submit">Změnit heslo</button>

            </form>

        </div>

    </div>

@endsection



