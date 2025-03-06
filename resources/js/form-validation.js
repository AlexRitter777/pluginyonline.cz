import { reCaptcha } from "./ReCaptcha";
import { loaderSpinnerOn } from "./spinner";
import { scrollIntoView } from "seamless-scroll-polyfill";

/**
 * Client-side form validation, based on bootstrap validators
 * Retrieving ReCaptcha token
 */
(function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', async function (event) {
                // Prevent default form submission
                event.preventDefault();
                event.stopPropagation();


                // Remove any server-side rendered error messages
                let errorDiv = document.querySelector('.form-errors');
                if (errorDiv) {
                    errorDiv.remove();
                }

                // Check form validity and stop if the form is not valid
                if (!form.checkValidity()) {
                    form.classList.add('was-validated');
                    return;
                }

                // Add spinner to the submit button and disable all submit buttons
                loaderSpinnerOn(event.submitter);

                // Add Bootstrap validation styles to the form
                form.classList.add('was-validated');

                try {
                    // Retrieve ReCaptcha token
                    let result = await reCaptcha();
                    //console.log('ReCaptcha token:', result);

                    // Add the ReCaptcha token to a hidden input field
                    let hiddenInput = form.querySelector('input[name="recaptcha_token"]');
                    if (!hiddenInput) {
                        hiddenInput = document.createElement('input');
                        hiddenInput.type = 'hidden';
                        hiddenInput.name = 'g-recaptcha-response';
                        form.appendChild(hiddenInput);
                    }
                    hiddenInput.value = result;

                    // Submit the form
                    form.submit();

                } catch (error) {
                    // Handle ReCaptcha error
                    console.error('ReCaptcha error:', error);
                    alert('ReCaptcha validation failed. Please try again.');
                }

            }, false)
        })
})()

/**
 * Scroll page to success or error div message
 */
document.addEventListener('DOMContentLoaded', function () {
    let messageDivs = document.getElementsByClassName('scroll-message');
    if(messageDivs.length > 0) {
        scrollIntoView(messageDivs[0],
{ behavior: "smooth",
                   block: "center",
                   inline: "center" }
        );
    }
});
