<x-admin.layouts.admin-layout title="Services">


    <main class="h-full pb-16 overflow-y-auto">
        <div class="container grid px-6 mx-auto">

            <x-admin.success :message="session('success')" />

            <h2
                class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
                Portfolio
            </h2>


            <!-- With actions -->
            <h4
                class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
            >
                Portfolio management section
            </h4>
            @if(count($portfolios))
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                            >
                                <th class="px-4 py-3">Project title</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3 text-center">Position</th>
                                <th class="px-4 py-3">Date</th>
                                <th class="px-4 py-3">Actions</th>
                            </tr>
                            </thead>
                            <tbody
                                class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                            >

                            @foreach($portfolios as $portfolio)
                                <x-admin.table-row
                                    thumbnailUrl="{{ $portfolio->thumbnail }}"
                                    title="{{$portfolio->title}}"
                                    status="{{ $portfolio->is_published ? 'Published' : 'Draft'}}"
                                    position="{{ $portfolio->position }}"
                                    created_at="{{ \Carbon\Carbon::parse($portfolio->created_at)->format('d.m.Y')  }}"
                                    editHref="{{ route('admin.portfolio.edit', ['portfolio' => $portfolio]) }}"
                                    itemId="{{$portfolio->id}}"
                                />
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{ $portfolios->onEachSide(4)->links() }}


                </div>

            @else
                <h3
                    class="mb-4 mx-auto text-lg font-semibold text-gray-600 dark:text-gray-300"
                >
                    There is no projects yet.
                </h3>
            @endif
            <a
                class="w-60 px-4 py-2 mx-auto mt-4 text-sm text-center font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple dark:bg-gray-600 dark:hover:bg-gray-500 dark:active:bg-gray-600 dark:text-gray-200"
                href="{{route('admin.portfolio.create')}}"
            >
                Create project
            </a>
        </div>
    </main>


</x-admin.layouts.admin-layout>
