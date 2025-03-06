@props(['href' => '#'])

<li>
    <a href="{{ $href }}" class="inline-block text-base text-body-color mb-3 hover:text-primary"> {{ $slot }} </a>
</li>
