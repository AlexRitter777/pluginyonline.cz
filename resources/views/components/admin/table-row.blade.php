@props([
    'thumbnailUrl' => '',
    'title' => '',
    'name' =>'',
    'status'=>'',
    'created_at'=>'',
    'position' => '',
    'editRoute' => '',
    'itemId' => '',
    'item' => '',
    'deleteRoute' => ''
    ])

<tr class="text-gray-700 dark:text-gray-400">
    <td class="px-4 py-3">
        <div class="flex items-center text-sm">
            <!--Thumbnail-->
            <div
                class="relative hidden w-8 h-8 mr-3 md:block"
            >
                <x-db-image url="{{  $thumbnailUrl }}"/>
                <div
                    class="absolute inset-0 rounded-full shadow-inner"
                    aria-hidden="true"
                ></div>
            </div>
            <div>
                <p class="font-semibold">{{ $title }}</p>
            </div>
        </div>
    </td>
    <td class="px-4 py-3 text-xs">
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                        >
                          {{ $status }}
                        </span>
    </td>
    <td class="px-4 py-3 text-sm text-center">
        {{ $position }}
    </td>
    <td class="px-4 py-3 text-sm">
        {{ $created_at }}
    </td>
    <td class="px-4 py-3">
        <div class="relative flex items-center space-x-4 text-sm">
            <x-admin.svg-edit-button :href="$editRoute"/>
            <x-admin.svg-delete-button
                :itemId="$itemId"
                :deleteRoute="$deleteRoute"
            />
        </div>
    </td>
</tr>
