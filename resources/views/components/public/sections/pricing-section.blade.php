<section id="pricing" class="bg-white pt-20 lg:pt-[120px] relative z-20 overflow-hidden">
    <div class="container">
        <div class="flex flex-wrap -mx-4">
            <div class="w-full px-4">
                <div class="text-center mx-auto mb-[60px] lg:mb-20 max-w-[510px]">
                    <span class="font-semibold text-lg text-primary mb-2 block"> CENY </span>
                    <h2 class="font-bold text-3xl sm:text-4xl md:text-[40px] text-dark mb-4">Ceny za vývoj pluginů pro WordPress</h2>
                    <p class="text-base text-body-color">Představujeme orientační ceny za vývoj vzorových pluginů různé velikosti. Přesnou cenu vám můžeme stanovit až po prostudování technického zadání.</p>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap justify-center -mx-4">

            <x-public.pricing-item
                title="Malý plugin"
                price="3.000 - 6.000 Kč"
            >
                <x-slot:description>
                    Jednoduchý plugin s minimálním zásahem do funkcionality
                </x-slot:description>
                <x-slot:sample>
                    Plugin pro WooCommerce, který zajišťuje, že některé zboží nelze prodat fyzické osobě, ale pouze firmě.
                </x-slot:sample>

                <p class="text-base text-body-color font-bold mb-2">Funkcionalita:</p>
                <p class="text-base text-body-color mb-3 leading-5">Přidání checkboxu v kartě zboží (resp. variantě), který určuje, zda zboží smí být prodáno pouze firmě</p>
                <p class="text-base text-body-color mb-3 leading-5">Přidání varovného oznámení pro zákazníky na stránce zboží</p>
                <p class="text-base text-body-color mb-3 leading-5">Přidání varovného oznámení na stránce Checkout s uvedením restrikčního zboží</p>
                <p class="text-base text-body-color mb-1 leading-5">Úprava formuláře Checkout pro nákup firmou v případě restrikčního zboží</p>

            </x-public.pricing-item>

            <x-public.pricing-item
                title="Střední plugin"
                price="8.000 - 12.000 Kč"
            >
                <x-slot:description>
                    Středně velký plugin s větším zásahem do funkcionality webu, využitím API a interaktivity.
                </x-slot:description>
                <x-slot:sample>
                    Plugin pro WooCommerce pro zadávání a správu sledovacích čísel zásilek.
                </x-slot:sample>
                <p class="text-base text-body-color font-bold mb-2">Funkcionalita:</p>
                <p class="text-base text-body-color mb-3 leading-5">Možnost zadat sledovací číslo a přepravce v kartě objednávky</p>
                <p class="text-base text-body-color mb-3 leading-5">Uložení sledovacího čísla, data odeslání a poskytovatele služeb</p>
                <p class="text-base text-body-color mb-3 leading-5">Záznam v admin notes, možnost odstranění údajů jedním kliknutím</p>
                <p class="text-base text-body-color mb-3 leading-5">Automatická změna statusu objednávky po zadání údajů</p>
                <p class="text-base text-body-color mb-1 leading-5">Přidání sledovacích informací do e-mailu klientovi, do osobních stránek klienta, včetně přímého odkazu pro sledování zásilky</p>

            </x-public.pricing-item>

            <x-public.pricing-item
                title="Velký plugin"
                price="od 15.000 Kč"
            >
                <x-slot:description>
                    Komplexní pluginy s větším zásahem do funkcionality webu nebo širokým rozsahem vlastní funkcionality, včetně komunikace s externími systémy a API.                </x-slot:description>
                <x-slot:sample>
                    Vícemodulový plugin pro export dat z objednávek WooCommerce.
                </x-slot:sample>
                <p class="text-base text-body-color font-bold mb-2">Funkcionalita:</p>
                <p class="text-base text-body-color mb-3 leading-5">Generace, editace a uložení PDF faktur, zálohových faktur nebo dobropisů</p>
                <p class="text-base text-body-color mb-3 leading-5">Možnost odeslání vygenerovaných dokumentů zákazníkovi e-mailem</p>
                <p class="text-base text-body-color mb-3 leading-5">Podpora prodeje v EU v režimu OSS s použitím DPH cílové země</p>
                <p class="text-base text-body-color mb-3 leading-5">Individuální kurz pro faktury a objednávky v cizí měně</p>
                <p class="text-base text-body-color mb-3 leading-5">Export a generace XML reportů pro specializovaný účetní software na základě vybraného seznamu objednávek (samostatný modul)</p>
                <p class="text-base text-body-color mb-3 leading-5">Export a generace CSV reportů pro přípravu EU OSS VAT reportu (samostatný modul)</p>

                <p class="text-base text-body-color mb-1 leading-5">Úprava formuláře Checkout pro nákup firmou v případě restrikčního zboží</p>

            </x-public.pricing-item>

        </div>
    </div>
</section>
