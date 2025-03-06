@props(['title' => '' , 'desc' => ''])

<li class="flex lg:flex-wrap xl:flex-nowrap mb-3">
    <span class="max-w-[90px] w-full font-medium text-black text-base flex justify-between">
        {{ $title }}
        <span class="text-body-color">:</span>
    </span>
    <span class="w-full font-medium text-body-color text-base pl-5 lg:pl-0 xl:pl-5"> {{ $desc }} </span>
</li>

