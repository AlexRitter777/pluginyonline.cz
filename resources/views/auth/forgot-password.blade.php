<x-layouts.guest-layout title="Forgot password">

    <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
        <div class="flex flex-col overflow-y-auto md:flex-row">
            <div class="h-32 md:h-auto md:w-1/2">
                <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="{{ Vite::asset('resources/images/public/office.jpeg') }}" alt="Office">
            </div>
            <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                <div class="w-full">
                    <x-admin.success :message="session('status')" />
                    <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                        Forgot password
                    </h1>
                    <form x-data="formValidation" id="login" @submit.prevent="validate" action="{{route('password.email')}}" method="post">
                        @csrf
                        <x-admin.input-text
                            type="email"
                            name="email"
                            id="email"
                            validationRules="required|email|min:3|max:65"
                            placeholder="Enter your email..."
                            value="{{ old('email') }}"
                        >
                            Email
                        </x-admin.input-text>

                        <button
                            type="submit"
                            class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white
                                   transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg
                                   active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                        >
                            Recover password
                        </button>
                    </form>
                    <p class="mt-4">
                        <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline" href="{{ route('login') }}">
                            Go to login
                        </a>
                    </p>

                </div>
            </div>
        </div>
    </div>


</x-layouts.guest-layout>
