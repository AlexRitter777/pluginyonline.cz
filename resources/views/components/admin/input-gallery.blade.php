

<div x-data="inputGallery" class="mb-4">
    <label class="block text-sm text-gray-700 dark:text-gray-400">
        {{ $slot }}
    </label>
    <ul  x-show="Object.keys(files).length > 0" x-ref="list" x-sort class="mb-10 mt-10 text-gray-700 dark:text-gray-400 flex flex-wrap">
        <template x-for = "(file, key) in files">
            <li x-sort:item :data-item-id="key" :key="key" >
                <div class="relative mr-5 mb-10">
                    <a href="" @click.prevent="removeImage" :data-id="key" class="absolute left-[143px] bottom-[142px]">
                        <svg class="w-4 h-4 text-gray-800 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                        </svg>
                    </a>
                    <div class="relative w-36 h-36 md:block">
                        <img
                            class="object-cover w-full h-full "
                            :src="getImageUrl(file)"
                            alt=""
                            loading="lazy"
                        />
                        <span x-text="fileName" class="text-sm leading-[1rem] inline-block"></span>
                    </div>
                </div>
            </li>
        </template>
    </ul>

    <div
        class="bg-white mt-1 w-full relative p-4 text-gray-400 border border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:border-gray-600 @error('images*') custom-invalid @enderror"
        :class="{
            'border-red-500 dark:border-red-400 border-2': errorMessage
        }"
    >
        <div x-ref="dnd" class="relative text-gray-400 border-2 border-gray-200 border-dashed rounded cursor-pointer dark:border-gray-600">
            <input accept="*" type="file" title="" x-ref="file" @change="handleFile"
                   class="absolute inset-0 z-50 w-full h-full p-0 m-0 outline-none opacity-0 cursor-pointer"
                   @dragover="
                        $refs.dnd.classList.add(document.documentElement.classList.contains('dark') ? 'bg-gray-500' : 'bg-indigo-50')
                    "
                   @dragleave="
                        $refs.dnd.classList.remove('bg-gray-500', 'bg-indigo-50')
                    "
                   @drop="
                        $refs.dnd.classList.remove('bg-gray-500', 'bg-indigo-50')
                    "
            />
            <div class="flex flex-col items-center justify-center py-10 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m 16,17 h 3 a -2,-2 0 0 0 2,-2 V 6 A -2,-2 0 0 0 19,4 H 5 A -2,-2 0 0 0 3,6 v 9 a -2,-2 0 0 0 2,2 h 3 m 1,-4 3,-3 m 0,0 3,3 m -3,-3 v 10" />
                </svg>
                <p class="mt-1">Drag your file here or click in this area.</p>
            </div>
        </div>
    </div>
    <span x-show="errorMessage" x-text="errorMessage" class="text-sm text-red-600 dark:text-red-400"></span>
    @foreach ($errors->getMessages() as $key => $messages)
        @if (Str::startsWith($key, 'images.'))
                <div class="text-sm text-red-600 dark:text-red-400 mt-2">{{ $messages[0] }}</div>
        @break
        @endif
    @endforeach
</div>
