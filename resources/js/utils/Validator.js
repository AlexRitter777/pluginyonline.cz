
import Errors from './errors.js';

export class Validator {

    // Mapping validation rule names to corresponding methods
    methodMap = {
        required: 'validateValue',
        min: 'validateMin',
        max: 'validateMax',
        posInteger: 'validatePositiveInteger',
        summernoteContent: 'validateSummernoteContent',
        email: 'validateEmail',
        checkbox: 'validateCheckbox'
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

        const lang = form.getAttribute('data-lang');

        const checkboxes = form.querySelectorAll('input[type="checkbox"]');

        if (checkboxes.length > 0){
            checkboxes.forEach((value) => {
                let name = value.getAttribute('name');
                let checked = value.checked;
                formData.set(name, checked ? '1' : '');
            });
        }

        for (const [key, value] of formData.entries()) {

            let inputElement = document.querySelector(`[name="${key}"]`);

            if (!inputElement) continue;

            let rules = inputElement.getAttribute('data-rules');

            if (!rules) continue;

            let title = inputElement.getAttribute('data-title')

            let dispatchedRules = this.dispatchRules(rules);

            this.validateField(key, value, dispatchedRules, title, lang);

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
     * @param {string} lang - Error messages language.
     */
    validateField(fieldName, fieldValue, rules, title, lang){


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

            let validationResult = validationMethod.call(this, fieldValue, title, lang, ...args, fieldName);

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
     * @param {string} lang - Error messages language.
     * @returns {string|null} - Error message or null if valid.
     */
    validateMin(fieldValue, title, lang, minCount ) {

        if(fieldValue && fieldValue.length < minCount){
            return Errors.getErrorMessage(lang, 'validateMin', title, minCount)
        }
        return null;
    }

    /**
     * Validates maximum length constraint.
     * @param {string} fieldValue - The value of the field.
     * @param {string} title - The field's display name.
     * @param {number} maxCount - Maximum character count.
     * @param {string} lang - Error messages language.
     * @returns {string|null} - Error message or null if valid.
     */
    validateMax(fieldValue, title, lang, maxCount ) {
        if(fieldValue && fieldValue.length > maxCount){
            return Errors.getErrorMessage(lang, 'validateMax', title, minCount)
        }
        return null;
    }

    /**
     * Checks if a field is required.
     * @param {string} fieldValue - The value of the field.
     * @param {string} title - The field's display name.
     * @param {string} lang - Error messages language.
     * @returns {string|null} - Error message if empty, otherwise null.
     */
    validateValue(fieldValue, title, lang){
        if(!fieldValue) {
            return Errors.getErrorMessage(lang, 'validateValue', title)

        }
        return null;
    }

    /**
     * Validates that the field contains a positive integer.
     * @param {string|number} fieldValue - The value of the field.
     * @param {string} title - The field's display name.
     * @param {string} lang - Error messages language.
     * @returns {string|null} - Error message if invalid, otherwise null.
     */
    validatePositiveInteger(fieldValue, title, lang) {
        if (isNaN(fieldValue) || !Number.isInteger(Number(fieldValue)) || Number(fieldValue) < 0) {
            return Errors.getErrorMessage(lang, 'validatePositiveInteger', title)
        }
        return null;
    }

    /**
     * Validates Summernote content by stripping HTML tags
     * and checking that some meaningful text is present.
     * Also adds or removes a visual invalid class from the Summernote container.
     *
     * @param {string} fieldValue - The raw HTML content from Summernote.
     * @param {string} title - The field's display name for error messages.
     * @param {string} fieldName - The input name used to locate the Summernote wrapper.
     * @param {string} lang - Error messages language.
     * @returns {string|null} - Error message if content is empty, otherwise null.
     */
    validateSummernoteContent(fieldValue, title, lang, fieldName) {

        const plainText = this.stripTags(fieldValue);

        if (plainText.trim().length === 0) {
            this.addSummernoteClass(fieldName);
            return Errors.getErrorMessage(lang, 'validateValue', title)
        }
        this.removeSummernoteClass(fieldName);
        return null;
    }

    /**
     *
     * @param fieldValue
     * @param title
     * @param lang
     * @returns {string|null}
     */
    validateEmail(fieldValue, title, lang) {
        const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

        if (fieldValue && !emailRegex.test(fieldValue)) {
            return Errors.getErrorMessage(lang, 'validateEmail', title);
        }

        return null;
    }

    validateCheckbox(fieldValue, title, lang) {
        if (!fieldValue) {
            return Errors.getErrorMessage(lang, 'validateCheckbox', title);
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

    /**
     * Removes all HTML tags from a string to extract plain text.
     * Used for validating rich text input (like Summernote).
     *
     * @param {string} html - The HTML string to clean.
     * @returns {string} - Plain text with no HTML tags.
     */
    stripTags(html) {
        const div = document.createElement('div')
        div.innerHTML = html
        return div.textContent || div.innerText || ''
    }


    /**
     * Adds a CSS class to the Summernote wrapper div.
     *
     * @param {string} name - The name attribute of the Summernote input.
     */
    addSummernoteClass(name){
        const summernoteInput = document.querySelector(`[name="${name}"]`);
        const nextDiv = summernoteInput?.nextElementSibling;
        nextDiv?.classList.add('custom-invalid');
    }

    /**
     * Remove a CSS class to the Summernote wrapper div.
     *
     * @param {string} name - The name attribute of the Summernote input.
     */
    removeSummernoteClass(name) {
        const summernoteInput = document.querySelector(`[name="${name}"]`);
        const nextDiv = summernoteInput?.nextElementSibling;
        nextDiv?.classList.remove('custom-invalid');
    }


}
