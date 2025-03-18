import {Validator} from "../admin/utils/Validator.js";

export default () => ({


    errors: {},

    validate(event){
        const form = event.target;
        const validator = new Validator();
        const validationResult = validator.validateForm(form);

        if(validationResult === null || Object.values(validationResult).every(value => value === null)) {
            form.submit();
            return;
        }

        this.errors = validationResult;
    }

});
