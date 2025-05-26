<x-public.layouts.base-layout title="Kontaktujte nas">

    <x-public.sections.contact-form/>
    @push('scripts')
        <script src="https://www.google.com/recaptcha/api.js?render=6LeuuSIrAAAAAI9UFNZRdYTK2oZ8iqSKlvcS9xoQ" async defer></script>
    @endpush
</x-public.layouts.base-layout>
