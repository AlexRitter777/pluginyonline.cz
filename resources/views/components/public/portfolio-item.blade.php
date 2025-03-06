@props(['url' => '', 'alt' => '', 'id' => ''])

<div class="w-full md:w-1/2 px-4 item">
    <div class="mb-12">
        <div class="relative group mb-8 overflow-hidden shadow-service rounded-md">
            <img src="{{ Vite::asset("$url") }}" alt="{{$alt}}" class="w-full" />

        </div>
        <h3 class="mt-6">
            <a href="{{ route('portfolio.show', ['id'=> $id ]) }}" class="font-semibold text-black hover:text-primary text-xl inline-block mb-3"> {{ $title }} </a>
        </h3>
        <p class="font-medium text-base text-body-color">
            {{ $slot }}
        </p>
    </div>
</div>
