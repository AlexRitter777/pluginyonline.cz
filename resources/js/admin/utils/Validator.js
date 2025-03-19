export class Validator {

    // Mapping validation rule names to corresponding methods
    methodMap = {
        required: 'validateValue',
        min: 'validateMin',
        max: 'validateMax',
        posInteger: 'validatePositiveInteger'
    }

    // Object to store validation errors
    errors = {};


    /**
     * Validates all fields in a form that contain the `data-rules` attribute.
     * @param {HTMLFormElement} form - The form to validate.
     * @returns {object|null} - Returns an object with errors or null if no errors.
     */
     validateForm(form) {

        const formData = new FormData(form);

        for (const [key, value] of formData.entries()) {

            let inputElement = document.querySelector(`[name="${key}"]`);

            if (!inputElement) continue;

            let rules = inputElement.getAttribute('data-rules');


            if (!rules) continue;

            let title = inputElement.getAttribute('data-title')

            let dispatchedRules = this.dispatchRules(rules);

            this.validateField(key, value, dispatchedRules, title);

        }

        // Return errors if there are any, otherwise return null
        return Object.keys(this.errors).length > 0 ? this.errors : null;

    }



    /**
     * Validates a single field based on the provided rules.
     * @param {string} fieldName - The name of the field.
     * @param {string} fieldValue - The value of the field.
     * @param {array} rules - An array of validation rules.
     * @param {string} title - Field label or default title.
     */
    validateField(fieldName, fieldValue, rules, title){

         title = title || 'This field';

         for (let rule of rules){
            let ruleParts = rule.split(':');
            let ruleName = ruleParts[0];
            let args = ruleParts.slice(1).map(arg => isNaN(arg) ? arg : Number(arg));

            if(!this.methodMap.hasOwnProperty(ruleName)) continue;

            let validationMethodName =  this.methodMap[ruleName];

            let validationMethod = this[validationMethodName];

            if(typeof validationMethod !== 'function'){
                console.error(`Validation method ${validationMethod} is not defined!`);
                continue;
            }

            let validationResult = validationMethod.call(this, fieldValue, title, ...args);

            if(validationResult) {
                this.errors[fieldName] = validationResult;
                break;
            }

        }

        // If no errors were set, ensure the field has a null value
        if (!this.errors.hasOwnProperty(fieldName)) {
            this.errors[fieldName] = null;
        }

    }

    /**
     * Validates minimum length constraint.
     * @param {string} fieldValue - The value of the field.
     * @param {string} title - The field's display name.
     * @param {number} minCount - Minimum character count.
     * @returns {string|null} - Error message or null if valid.
     */
    validateMin(fieldValue, title, minCount ) {

        if(fieldValue && fieldValue.length < minCount){
            return `${title} must contain at least ${minCount} characters.`
        }
    }

    /**
     * Validates maximum length constraint.
     * @param {string} fieldValue - The value of the field.
     * @param {string} title - The field's display name.
     * @param {number} maxCount - Maximum character count.
     * @returns {string|null} - Error message or null if valid.
     */
    validateMax(fieldValue, title, maxCount ) {
        if(fieldValue && fieldValue.length > maxCount){
            return `${title} must not exceed ${maxCount} characters.`
        }
    }

    /**
     * Checks if a field is required.
     * @param {string} fieldValue - The value of the field.
     * @param {string} title - The field's display name.
     * @returns {string|null} - Error message if empty, otherwise null.
     */
    validateValue(fieldValue, title){
        if(!fieldValue) {
            return `${title} is required!`
        }
        return null;
    }

    /**
     * Validates that the field contains a positive integer.
     * @param {string|number} fieldValue - The value of the field.
     * @param {string} title - The field's display name.
     * @returns {string|null} - Error message if invalid, otherwise null.
     */
    validatePositiveInteger(fieldValue, title) {
        if (isNaN(fieldValue) || !Number.isInteger(Number(fieldValue)) || Number(fieldValue) < 0) {
            return `${title} must be a positive integer!`;
        }
        return null;
    }


    /**
     * Splits rule string into an array of rules.
     * @param {string} rules - The validation rules as a string.
     * @returns {array} - An array of validation rules.
     */
    dispatchRules(rules) {
        return rules.split('|');
    }

}
