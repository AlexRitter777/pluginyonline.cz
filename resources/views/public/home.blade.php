
<x-public.layouts.base-layout title="Home Page">

    {{--Hero Section Start--}}
    <x-public.sections.hero-section />
    {{--Hero Section End--}}

    {{--About Section Start--}}
    <x-public.sections.about-section />
    {{--About Section End--}}

    {{--Services Section Start--}}
    <x-public.sections.services-section
        :backUrl="route('services.index')"
        :services="$services"
        backgroundColor="black"
        titleColor="white"
    />
    {{--Services Section End--}}

    {{--Portfolio Section Start--}}
    <x-public.sections.portfolios-section
        :portfolios="$portfolios"
        :allProjectsUrl="route('portfolio.index')"
    />
    {{--Portfolio Section End--}}

    {{--Team Section Start--}}
    <x-public.sections.team-section/>
    {{--Team Section End--}}

    {{--Pricing Section Start--}}
    <x-public.sections.pricing-section/>
    {{--Pricing Section End--}}

    {{-- Contact Section Start --}}
    <x-public.sections.contact-form/>
    {{-- Contact Section End --}}

@push('scripts')
    <script src="https://www.google.com/recaptcha/api.js?render=6LeuuSIrAAAAAI9UFNZRdYTK2oZ8iqSKlvcS9xoQ" async defer></script>
@endpush
@push('scripts')
    <script>
        // Document Loaded
        document.addEventListener('DOMContentLoaded', () => {
            const pageLink = document.querySelectorAll(".menu-scroll");
            //console.log(pageLink);
            pageLink.forEach((elem) => {
                elem.addEventListener("click", (e) => {
                    e.preventDefault();
                    let href = elem.getAttribute("href");
                    window.history.pushState({}, '', href);
                    document.querySelector(href).scrollIntoView({
                        behavior: "smooth",
                        offsetTop: 1 - 60,
                    });
                });
            });
            // section menu active
            function onScroll(event) {
                const sections = document.querySelectorAll(".menu-scroll");
                const scrollPos = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop;

                for (let i = 0; i < sections.length; i++) {
                    const currLink = sections[i];
                    const val = currLink.getAttribute("href");
                    const refElement = document.querySelector(val);
                    const scrollTopMinus = scrollPos + 73;
                    if (refElement.offsetTop <= scrollTopMinus && refElement.offsetTop + refElement.offsetHeight > scrollTopMinus) {
                        document.querySelector(".menu-scroll").classList.remove("active");
                        currLink.classList.add("active");
                    } else {
                        currLink.classList.remove("active");
                    }
                }
            }

            window.document.addEventListener("scroll", onScroll);
        });
    </script>
@endpush
</x-public.layouts.base-layout>



