import {Validator} from "../admin/utils/Validator.js";
import scrollIntoError from "../admin/init-scroll.js";

export default () => ({


    errors: {},


    async validate(event) {
        const form = event.target;
        const validator = new Validator();

        const hasErrors = await this.handleErrors(form, validator);

        if(hasErrors){
            requestAnimationFrame(scrollIntoError);
        }

    },

   async handleErrors(form, validator){

        const validationResult = validator.validateForm(form);

        if(validationResult === null || Object.values(validationResult).every(value => value === null)) {

            form.submit();
            return false;
        }

        this.errors = validationResult;

        form.dispatchEvent(new CustomEvent('failedValidation', {
            bubbles: true,
            detail: {
                errors: validationResult,
                form
            }
        }));

        return true;

    }



});
