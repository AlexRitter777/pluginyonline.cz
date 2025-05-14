<x-admin.layouts.admin-layout title="{{$user->name}} profile">
    <main class="h-full pb-6 overflow-y-auto">

        <div class="container px-6 mx-auto grid space-y-6 mt-3">
            @if(!$user->hasVerifiedEmail())
            <x-admin.warning>
                <p class="mb-3">Because you have changed your email address, you must verify the new one. A verification link has been sent to your new email address.</p>
                <form method="post" action="{{route('verification.send')}}">
                    @csrf
                    <x-admin.button-submit>
                        Resend Email
                    </x-admin.button-submit>
                </form>

            </x-admin.warning>
            @endif
            <x-admin.success :message="session('status')" />
            <x-admin.error :message="session('error')" />

            <div
                class="px-4 py-3 bg-white rounded-lg shadow-md dark:bg-gray-800 "
            >

                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Edit profile - {{ $user->name }}
                </h2>

                <form x-data="formValidation" id="user_data" @submit.prevent="validate" action="{{route('profile.update', $user)}}" method="post">
                @csrf
                @method('PUT')
                    <x-admin.input-text
                        type="email"
                        name="email"
                        id="email"
                        validationRules="required|email|min:3|max:50|"
                        placeholder="Enter email..."
                        value="{{ old('email', $user->email) }}"
                    >
                        Email
                    </x-admin.input-text>
                    <div class="mb-6 mt-[-10px] flex">
                        <svg
                            class="w-4 h-4 text-yellow-500 mr-1"
                            viewBox="0 0 24 24"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" />
                            <path
                                d="M11 6 L13 6 L12.5 13 L11.5 13 Z"
                                fill="currentColor"
                            />
                            <circle cx="12" cy="16.5" r="1" fill="currentColor" />
                        </svg>
                        <p class="text-xs text-gray-700 dark:text-gray-400">After changing your email, you will be required to verify the new address.</p>
                    </div>

                    <x-admin.input-text
                        type="name"
                        name="name"
                        id="name"
                        validationRules="required|min:3|max:50|"
                        placeholder="Enter name..."
                        value="{{ old('name', $user->name) }}"
                    >
                        Name
                    </x-admin.input-text>
                    <div class="w-1/2 mt-6 mx-auto flex justify-around items-center">
                        <x-admin.button-submit>Save</x-admin.button-submit>
                        <x-admin.cancel-btn-link href="{{ url()->current() }}">Cancel</x-admin.cancel-btn-link>
                    </div>

                </form>

                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Change password
                </h2>

                <form x-data="formValidation" id="change_password" @submit.prevent="validate" action="{{route('password.update')}}" method="post">
                    @csrf
                    @method('PUT')
                    <x-admin.input-text
                        type="password"
                        name="current_password"
                        id="current_password"
                        validationRules="required"
                        placeholder="Enter your current password..."
                    >
                        Current password
                    </x-admin.input-text>

                    <x-admin.input-text
                        type="password"
                        name="password"
                        id="password"
                        validationRules="required"
                        placeholder="Enter new password..."
                    >
                        New password
                    </x-admin.input-text>

                    <x-admin.input-text
                        type="password"
                        name="password_confirmation"
                        id="password_confirmation"
                        validationRules="required"
                        placeholder="Confirm new password..."
                    >
                        Confirm new password
                    </x-admin.input-text>

                    <div class="w-1/2 mt-6 mx-auto flex justify-around items-center">
                        <x-admin.button-submit>Save</x-admin.button-submit>
                        <x-admin.cancel-btn-link href="{{ url()->current() }}">Cancel</x-admin.cancel-btn-link>
                    </div>
                </form>
            </div>
        </div>

    </main>
</x-admin.layouts.admin-layout>
