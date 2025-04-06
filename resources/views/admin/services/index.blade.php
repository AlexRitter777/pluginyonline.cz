<x-admin.layouts.admin-layout title="Services">


    <main class="h-full pb-16 overflow-y-auto">
        <div class="container grid px-6 mx-auto">

            <x-admin.success :message="session('success')" />

            <h2
                class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
                Services
            </h2>


            <!-- With actions -->
            <h4
                class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
            >
                Services management section
            </h4>
            @if(count($services))
            <div class="w-full overflow-hidden rounded-lg shadow-xs mb-8">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                        >
                            <th class="px-4 py-3">Service title</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3 text-center">Position</th>
                            <th class="px-4 py-3">Date</th>
                            <th class="px-4 py-3">Actions</th>
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
                                :created_at="\Carbon\Carbon::parse($service->created_at)->format('d.m.Y')"
                                :editHref="route('admin.services.edit', ['service' => $service])"
                                :itemId="$service->id"
                            />
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div
                    class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
                >
                </div>

            </div>

            @else
                <h3
                    class="mb-8 mx-auto text-lg font-semibold text-gray-600 dark:text-gray-300"
                >
                    There is no services yet.
                </h3>
            @endif

            <x-admin.button-link
                class="mx-auto w-60 text-center"
                :href="route('admin.services.create')"
            >
                Create service
            </x-admin.button-link>
        </div>
    </main>


</x-admin.layouts.admin-layout>
