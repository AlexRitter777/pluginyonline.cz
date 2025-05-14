<x-admin.layouts.admin-layout title="Verify your email">

    <div class="px-4">
        <x-admin.success :message="session('status')" />
    </div>
    <div class="flex justify-center">
        <div class="min-w-0 p-4 max-w-xl bg-white rounded-lg shadow-xs dark:bg-gray-800 mx-6 mt-16">
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300 text-center">
                Please verify your email address
            </h4>
            <p class="text-gray-600 dark:text-gray-400 text-center">
                A verification link has been sent to your email address. Please check your inbox.
            </p>
            <div class="max-w-xl mt-6 mx-auto flex justify-around items-center">
                <form method="post" action="{{route('verification.send')}}">
                    @csrf
                    <x-admin.button-submit>
                        Resend Email
                    </x-admin.button-submit>
                </form>
                <x-admin.button-link href="{{route('profile.edit')}}">View Profile</x-admin.button-link>
            </div>
        </div>
    </div>

</x-admin.layouts.admin-layout>
