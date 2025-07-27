@props([
    'title' => '',
    'backUrl' => '',
    'thumbnail' => ''
])

{{--Blog Section Start--}}
<section class="pt-[150px]">
    <div class="container">
        <div class="pb-[120px] border-b border-[#E9ECF8]">
            <div class="flex flex-wrap justify-center mx-[-16px]">
                <div class="w-full lg:w-8/12 px-4">
                    {{--Bread Crumbs Strart--}}
                    <div class="w-full pb-3 ">
                        <div class="text-start">
                            <ul class="flex items-center md:justify-start">
                                <li class="flex items-center">
                                    <a href="{{ $backUrl }}" class="font-medium text-base text-body-color pr-1 hover:text-primary"> Naše služby </a>
                                    <span class="block w-2 h-2 border-t-2 border-r-2 border-body-color rotate-45 mr-3"></span>
                                </li>
                                <li class="font-medium text-base text-primary">{{ $title }}</li>
                            </ul>
                        </div>
                    </div>
                    {{--Bread Crumbs End--}}
                    <div>
                        <div class="w-full rounded overflow-hidden mb-10">
                            <x-db-image :url="$thumbnail" class="object-center"/>
                        </div>

                        <h2 class="font-bold text-black text-3xl sm:text-4xl leading-tight sm:leading-tight mb-8">{{ $title }}</h2>
                        <div class="summernote-public-content">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{--Blog Section End--}}
