<x-admin.layouts.admin-layout title="Messages">

    <main class="h-full pb-16 overflow-y-auto">
        <div class="container grid px-6 mx-auto">

            <x-admin.success :message="session('success')" />

            <h2
                class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
                Messages
            </h2>


           <h4
                class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
            >
                Messages from contact form
            </h4>
            @if(count($messages))
                <div class="w-full overflow-hidden rounded-lg shadow-xs mb-8">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                            >
                                <th class="px-4 py-3 min-w-[140px]">From</th>
                                <th class="px-4 py-3">Email</th>
                                <th class="px-4 py-3">Message</th>
                                <th class="px-4 py-3">Date</th>
                                <th class="px-4 py-3">Actions</th>
                            </tr>
                            </thead>
                            <tbody
                                class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                            >

                            @foreach($messages as $message)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            <div>
                                                <p class="font-semibold">{{ $message->name }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            <div>
                                                <p class="font-semibold">{{ $message->email }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            <div>
                                                <p class="font-semibold">{{ Illuminate\Support\Str::limit($message->message, 200) }}</p>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-4 py-3 text-sm">
                                        <div class="flex items-center text-sm">
                                            <div>
                                                <p class="font-semibold">{{ \Carbon\Carbon::parse($message->created_at)->format('d.m.Y') }}</p>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-4 py-3">
                                        <div class="relative flex items-center space-x-4 text-sm">
                                            <x-admin.svg-show-button :href="route('admin.messages.show', ['message' => $message])"/>
                                            <x-admin.svg-delete-button
                                                :itemId="$message->id"
                                                :deleteRoute="route('admin.messages.destroy', ['message' => $message])"
                                            />
                                        </div>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{ $messages->onEachSide(4)->links() }}

                </div>

            @else
                <h3
                    class="mb-8 mx-auto text-lg font-semibold text-gray-600 dark:text-gray-300"
                >
                    There is no messages yet.
                </h3>
            @endif

        </div>
    </main>


</x-admin.layouts.admin-layout>

