@push('head')
    <x-public.json-ld
        type="ContactPage"
        title="Kontakt"
        :url="request()->fullUrl()"
    />

    <x-public.json-ld
        type="BreadcrumbList"
        :breadcrumbs="$breadCrumbs"
    />
@endpush


<x-public.layouts.base-layout
    title="Kontaktujte nás"
    description="Máte zájem o plugin nebo spolupráci? Ozvěte se nám přes kontaktní formulář nebo přímo e-mailem či telefonicky."
>

    <x-public.sections.contact-form/>
    @push('scripts')
        <script src="https://www.google.com/recaptcha/api.js?render=6LeuuSIrAAAAAI9UFNZRdYTK2oZ8iqSKlvcS9xoQ" async defer></script>
    @endpush
</x-public.layouts.base-layout>
