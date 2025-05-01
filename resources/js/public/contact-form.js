import {Validator} from "../utils/Validator.js";
import axios from "axios";
import { Notyf } from "notyf";


export default () => ({

    formData: {
        name: '',
        email: '',
        phone: '',
        company: '',
        message: '',
        privacy: ''
    },
    errors: {},
    isBusy: false,
    token: '',

    async sendForm(event) {

        this.errors = {};
        this.isBusy = true;
        let token = '';

        const form = event.target;
        const validator = new Validator();
        const validationResult = validator.validateForm(form);

        if(!(validationResult === null || Object.values(validationResult).every(value => value === null))){
            this.errors = validationResult;
            this.isBusy = false;
            return;
        }

        try {
            token = await grecaptcha.execute('6LeuuSIrAAAAAI9UFNZRdYTK2oZ8iqSKlvcS9xoQ', {action: 'submit'});
        } catch (e){
            alert('Please check your internet connection.');
            this.isBusy = false;
            return;
        }


        try {
            // Laravel handles CSRF automatically via the XSRF-TOKEN cookie sent by Axios
            let response = await axios.post('/verify',{token: token});

            // console.log(response);
            if(!response.data) {
                console.error('It looks you are bot.')
                this.errors.recaptcha = 'ReCaptcha validation failed. Please try again.';
                this.isBusy = false;
                return;
            }
        }catch(e){
            alert('Something were wrong. Please try again later.');
            this.isBusy = false;
            return;
        }



        try {
            const messageSend = await axios.post('/send-message',{data: this.formData});
            this.clearForm(this.formData);

            const notyf = new Notyf({
                duration: 3000,
                position: {
                    x: 'right',
                    y: 'top',
                },
                dismissible: true
            });
            notyf.success('Zpráva byla odeslána!')



        }catch (e){
            console.error(e);
            if(e.response.status === 422) {
                this.errors = e.response.data.errors;
            }else{
                alert('Something were wrong. Please try again later.');
            }
        }finally {
            this.isBusy = false;
        }


    },


    clearForm(form){
        for (let key in form){
            form[key] = '';
        }
    }



})
