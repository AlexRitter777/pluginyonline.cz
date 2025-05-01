export default  {

    en: {
        field: 'This field',
        validateMin: ':title must contain at least :arg characters.',
        validateMax: ':title must not exceed :arg characters.',
        validateValue: ':title is required.',
        validatePositiveInteger: ':title must be a positive integer.',
        validateEmail: ':title must be a valid email address.',
        validateCheckbox: ':title must be checked.'
    },

    cz: {
        field: 'Toto pole',
        validateMin: ':title musí obsahovat alespoň :arg znaků.',
        validateMax: ':title nesmí překročit :arg znaků.',
        validateValue:':title je povinný údaj.',
        validatePositiveInteger:':title musí být kladné celé číslo.',
        validateEmail: ':title musí být platná e-mailová adresa.',
        validateCheckbox: ':title musí být zaškrtnuto.'
    },

    getErrorMessage (lang, key, title = null, arg = null){

        const dictionary = this[lang] || this['en'];
        let message = dictionary[key];

        if(!message) return 'Invalid field ';

        return message
            .replace(':title', title || dictionary.field)
            .replace(':arg', arg);

    }


}
