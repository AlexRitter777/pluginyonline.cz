<x-layouts.guest-layout title="Login">

    <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
        <div class="flex flex-col overflow-y-auto md:flex-row">
            <div class="h-32 md:h-auto md:w-1/2">
                <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="{{ asset('img/office.jpeg') }}" alt="Office">
            </div>
            <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">

                <div class="w-full">
                    <x-admin.success :message="session('status')" />
                    <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                        Login
                    </h1>

                    <form x-data="formValidation" id="login" @submit.prevent="validate" action="{{route('login')}}" method="post">
                        @csrf
                        <x-admin.input-text
                            type="email"
                            name="email"
                            id="email"
                            validationRules="required|min:3|max:65"
                            placeholder="Enter your email..."
                            value="{{ old('email') }}"
                        >
                            Email
                        </x-admin.input-text>
                        <x-admin.input-text
                            type="password"
                            name="password"
                            id="password"
                            validationRules="required|min:3|max:65"
                            placeholder="Enter password..."

                        >
                            Password
                        </x-admin.input-text>

                        <div class="flex mt-6 text-sm">
                            <label class="flex items-center dark:text-gray-400">
                                <input
                                    type="checkbox"
                                    name="remember"
                                    class="focus:border-purple-400 focus:outline-none focus:shadow-outline-purple border-gray-300 rounded"
                                >
                                <span class="ml-2">
                                    Remember me
                                </span>
                            </label>
                        </div>

                        <button
                            type="submit"
                            class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white
                                   transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg
                                   active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                        >
                            Log in
                        </button>
                    </form>
                    <hr class="my-8">


                    <p class="mt-4">
                        <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline" href="{{ route('password.request') }}">
                            Forgot your password?
                        </a>
                    </p>

                </div>
            </div>
        </div>
    </div>
</x-layouts.guest-layout>
