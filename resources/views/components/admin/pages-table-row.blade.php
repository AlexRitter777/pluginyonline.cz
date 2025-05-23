@props([
    'thumbnailUrl' => '',
    'title' => '',
    'name' =>'',
    'status'=>'',
    'routeName' => '',
    'position' => '',
    'updatedAt'=>'',
    'visibleInFooter' => '',
    'editRoute' => '',
    'itemId' => '',
    'item' => '',
    'deleteRoute' => ''
    ])

<tr class="text-gray-700 dark:text-gray-400">
    <td class="px-4 py-3">
        <div class="flex items-center text-sm">
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
    <td class="px-4 py-3 text-sm">
        {{ $routeName }}
    </td>
    <td class="px-4 py-3 text-sm">
        {{ $updatedAt }}
    </td>
    <td class="px-4 py-3 text-sm">
        {{ $visibleInFooter }}
    </td>
    <td class="px-4 py-3 text-sm">
        {{ $position }}
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
