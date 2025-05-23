<x-admin.layouts.admin-layout title="Admin dashboard" :userName="$user->name">

    <main class="h-full overflow-y-auto">
    <div class="container px-6 pb-6 mx-auto grid">
        @if(request()->has('verified'))
            <x-admin.success message="Your email address has been verified!" />
        @endif

        <h2
            class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
        >
            Dashboard
        </h2>


        {{--Cards--}}
        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">

            <x-admin.dashboard-card
                title="Services"
                :count="$servicesCount"
                bgColorLight="bg-orange-100"
                iconColorLight="text-orange-500"
                bgColorDark="bg-orange-500"
                iconColorDark="text-orange-100"
            >
                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                </svg>

            </x-admin.dashboard-card>

            <x-admin.dashboard-card
                title="Projects"
                :count="$portfoliosCount"
                bgColorLight="bg-blue-100"
                iconColorLight="text-blue-500"
                bgColorDark="bg-blue-500"
                iconColorDark="text-blue-100"
            >
                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
            </x-admin.dashboard-card>

            <x-admin.dashboard-card
                title="Messages"
                :count="$messagesCount"
                bgColorLight="bg-teal-100"
                iconColorLight="text-teal-500"
                bgColorDark="bg-teal-500"
                iconColorDark="text-teal-100"
            >
                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <rect x="3" y="5" width="18" height="14" rx="2" ry="2"></rect>
                    <path d="M3 7l9 6 9-6"></path>
                </svg>
            </x-admin.dashboard-card>

            <x-admin.dashboard-card
                title="Pages"
                :count="$pagesCount"
                bgColorLight="bg-green-100"
                iconColorLight="text-green-500"
                bgColorDark="bg-green-500"
                iconColorDark="text-green-100"
            >
                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                </svg>
            </x-admin.dashboard-card>

        </div>
        {{--End Cards--}}


        {{-- Tables --}}
            {{-- Recent Messages --}}
            <h4
                class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
            >
                Recent Messages
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
                                <th class="px-4 py-3 w-[15%]">Date</th>
                                <th class="px-4 py-3 w-[5%]">Actions</th>
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
                                                <p class="">{{ \Carbon\Carbon::parse($message->created_at)->format('d.m.Y') }}</p>
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
                    <div
                        class="flex justify-center items-center px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
                    >
                        <x-admin.button-link
                            class="w-40 text-center"
                            :href="route('admin.messages.index')"
                        >
                            All Messages
                        </x-admin.button-link>
                    </div>


                </div>

            @else
                <h3
                    class="mb-8 mx-auto text-lg font-semibold text-gray-600 dark:text-gray-300"
                >
                    There is no messages yet.
                </h3>
            @endif
            {{-- End Recent Messages --}}

            {{-- Recent servises --}}
            <h4
                class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
            >
                Recent Changed Services
            </h4>
            @if(count($services))
                <div class="w-full overflow-hidden rounded-lg shadow-xs mb-8">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                            >
                                <th class="px-4 py-3 w-[50%]">Service title</th>
                                <th class="px-4 py-3 w-[15%]">Status</th>
                                <th class="px-4 py-3 text-center w-[15%]">Position</th>
                                <th class="px-4 py-3 w-[15%]">Changed</th>
                                <th class="px-4 py-3 w-[5%]">Actions</th>
                            </tr>
                            </thead>
                            <tbody
                                class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                            >

                            @foreach($services as $service)
                                <x-admin.table-row
                                    :thumbnailUrl="$service->thumbnail"
                                    :title="$service->title"
                                    :status="$service->is_published ? 'Published' : 'Draft'"
                                    :position="$service->position"
                                    :created_at="\Carbon\Carbon::parse($service->updated_at)->format('d.m.Y')"
                                    :editRoute="route('admin.services.edit', ['service' => $service])"
                                    :itemId="$service->id"
                                />
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div
                        class="flex justify-center items-center px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
                    >
                        <x-admin.button-link
                            class="w-40 text-center"
                            :href="route('admin.services.index')"
                        >
                            All services
                        </x-admin.button-link>
                    </div>

                </div>

            @else
                <h3
                    class="mb-8 mx-auto text-lg font-semibold text-gray-600 dark:text-gray-300"
                >
                    There is no services yet.
                </h3>
            @endif
            {{-- End Recent servises --}}

            {{-- Recent projects --}}
            <h4
                class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
            >
                Recent Changed Projects
            </h4>
            @if(count($portfolios))
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b
                                       dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                            >
                                <th class="px-4 py-3 w-[50%]">Project title</th>
                                <th class="px-4 py-3 w-[15%]">Status</th>
                                <th class="px-4 py-3 text-center w-[15%]">Position</th>
                                <th class="px-4 py-3 w-[15%]">Changed</th>
                                <th class="px-4 py-3 w-[5%]">Actions</th>
                            </tr>
                            </thead>
                            <tbody
                                class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                            >

                            @foreach($portfolios as $portfolio)
                                <x-admin.table-row
                                    :thumbnailUrl="$portfolio->thumbnail"
                                    :title="$portfolio->title"
                                    :status="$portfolio->is_published ? 'Published' : 'Draft'"
                                    :position="$portfolio->position"
                                    :created_at="\Carbon\Carbon::parse($portfolio->updated_at)->format('d.m.Y')"
                                    :editRoute="route('admin.portfolio.edit', ['portfolio' => $portfolio])"
                                    :itemId="$portfolio->id"
                                    :deleteRoute="route('admin.portfolio.destroy', ['portfolio' => $portfolio->id])"
                                />
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div
                        class="flex justify-center items-center px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
                    >
                        <x-admin.button-link
                            class="w-40 text-center"
                            :href="route('admin.portfolio.index')"
                        >
                            All projects
                        </x-admin.button-link>
                    </div>


                </div>

            @else
                <h3
                    class="mb-4 mx-auto text-lg font-semibold text-gray-600 dark:text-gray-300"
                >
                    There is no projects yet.
                </h3>
            @endif
            {{-- End Recent projects --}}

        {{-- End Tables --}}

    </div>
</main>

</x-admin.layouts.admin-layout>

