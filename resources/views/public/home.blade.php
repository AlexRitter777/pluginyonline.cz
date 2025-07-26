@push('head')
    <x-public.json-ld
        type="Organization"
        title="PluginyOnline.cz"
        :url="request()->fullUrl()"
    />

    <x-public.json-ld
        type="WebSite"
        title="PluginyOnline.cz"
        :url="request()->fullUrl()"
    />
@endpush


<x-public.layouts.base-layout
    title="Pluginy na míru pro WordPress a WooCommerce"
    description="Vyvíjíme pluginy pro WordPress a WooCommerce na zakázku. Spolehlivě, bezpečně a efektivně. Podívejte se na naše služby a realizované projekty."
>

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
{{--    <script src="https://www.google.com/recaptcha/api.js?render=6LeuuSIrAAAAAI9UFNZRdYTK2oZ8iqSKlvcS9xoQ" async defer></script>--}}
        <script>
            window.addEventListener('DOMContentLoaded', () => {
                setTimeout(() => {
                    const script = document.createElement('script');
                    script.src = "https://www.google.com/recaptcha/api.js?render=6LeuuSIrAAAAAI9UFNZRdYTK2oZ8iqSKlvcS9xoQ";
                    script.async = true;
                    script.defer = true;
                    document.head.appendChild(script);
                }, 1000);
            });
        </script>

    @endpush
@push('scripts')
    <script>
        // Document Loaded
        document.addEventListener('DOMContentLoaded', () => {
            const pageLink = document.querySelectorAll(".menu-scroll");
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

            const sections = document.querySelectorAll('section[id]');

            const menuLinks = document.querySelectorAll(".menu-scroll-active");

            const observer = new IntersectionObserver(
                ([entry]) => {
                    if(entry.isIntersecting){
                        const id = entry.target.getAttribute('id');
                        menuLinks.forEach(link => {
                            link.classList.remove('active');
                            let href = link.getAttribute('href');
                            if(href === `#${id}`) {
                                link.classList.add('active');
                                window.history.pushState({}, '', href);
                            }
                        })
                    }
            },
            {
                threshold: 0.2
            }
            );

            sections.forEach(section => {
                observer.observe(section);
            })

        });
    </script>
@endpush
</x-public.layouts.base-layout>



