<section id="contact" class="py-[120px]">
    <div class="container">
        <div class="flex flex-wrap mx-[-16px]">
            <div class="w-full px-4">
                <div class="max-w-[600px] mx-auto text-center mb-[50px]">
                    <span class="font-semibold text-lg text-primary block mb-2"> KONTAKT </span>
                    <h2 class="font-bold text-black text-3xl sm:text-4xl md:text-[45px] mb-5 ">Potřebujete probrat nápad na nový WordPress plugin?</h2>
                    <p class="font-medium text-lg text-body-color">Neváhejte nám svůj nápad podrobně popsat. Čím více informací nám poskytnete, tím lépe se v něm dokážeme zorientovat a nabídnout lepší a racionálnější řešení.</p>
                </div>
            </div>
        </div>
        <div class="flex justify-center -mx-4">
            <div class="w-full lg:w-9/12 px-4">
                <form x-data="contactForm" id="contact-form" data-lang="cz" @submit.prevent="sendForm" method="post">
                    <div class="flex flex-wrap -mx-4">

                        <x-public.input-text
                            placeholder="Vaše jméno"
                            name="name"
                            validationRules="required|min:3|max:50"
                        />

                        <x-public.input-text
                            placeholder="Společnost (volitelné)"
                            name="company"
                            validationRules="min:3|max:50"
                        />

                        <x-public.input-text
                            type="email"
                            placeholder="Váš e-mail"
                            name="email"
                            validationRules="required|email|min:3|max:120"

                        />

                        <x-public.input-text
                            placeholder="Telefonní číslo"
                            name="phone"
                            validationRules="required|min:3|max:20"
                        />


                        <div class="w-full px-4">
                            <div class="mb-2">
                                <textarea
                                    rows="4"
                                    placeholder="Popište nám svůj projekt"
                                    class="input-field resize-none"
                                    name="message"
                                    data-rules="required|min:3|max:1000"
                                    x-model="formData.message"
                                    :disabled="isBusy"
                                    :class="{'border-red-500': errors.message}"
                                ></textarea>
                                <span
                                    x-show="errors.message"
                                    x-text="errors.message"
                                    class="text-red-600 dark:text-red-400 text-sm mt-1 block"
                                ></span>
                            </div>
                        </div>

                        <div class="w-full px-4">
                            <div class="flex text-base text-body-color justify-around">
                                <label class="flex items-center dark:text-gray-400">
                                    <input
                                        type="checkbox"
                                        name="privacy"
                                        x-model="formData.privacy"
                                        :checked="formData.privacy"
                                        data-rules="checkbox"
                                        class="w-5 h-5 text-purple-600 bg-white border-gray-300 rounded focus:ring-2
                                         focus:ring-purple-500 focus:ring-offset-2 transition duration-150 ease-in-out"
                                        :class="{'ring-2 ring-red-500 ring-offset-2': errors.privacy}"

                                    >
                                    <span class="ml-2">
                                        Souhlasím se <a href="" class="underline">zásadami ochrany osobních údajů</a>
                                    </span>
                                </label>
                            </div>
                            <span
                                x-show="errors.privacy"
                                x-text="errors.privacy"
                                class="text-red-600 dark:text-red-400 text-sm mt-1 block text-center mt-2"
                            ></span>
                            <span
                                x-show="errors.recaptcha"
                                x-text="errors.recaptcha"
                                class="text-red-600 dark:text-red-400 text-sm mt-1 block text-center mt-2"
                            ></span>
                        </div>

                        <div class="w-full px-4">
                            <div class="pt-4 text-center">
                                <button
                                    type="submit"
                                    :disabled="isBusy"
                                    :class="{
                                        'relative': isBusy,
                                        'cursor-not-allowed opacity-70': isBusy
                                    }"
                                    class="inline-flex justify-center items-center py-4 px-9 rounded-full font-semibold text-white bg-primary mx-auto transition duration-300 ease-in-out hover:shadow-signUp hover:bg-opacity-90"
                                >
                                    <template x-if="isBusy">
                                        <svg class="animate-spin h-5 w-5 mr-3 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                                        </svg>
                                    </template>
                                    <span x-text="isBusy ? 'Odesílání...' : 'Odeslat'"></span>
                                </button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
