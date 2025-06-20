import axios from "axios";

export default function slugManager(currentSlug = '', hasErrors = false, isEditForm = false)
{

    return {

        slug: '',

        // Displays a pencil icon to the right of the slug field
        is_generated: false,

        // Displays: Check slug buton, Generate slug button
        is_editing: false,

        // Displays: Check slug buton, Reset slug button
        is_editing_from_db: false,

        // Set whether the slug input field is disabled
        is_disabled: true,

        error_message: '',

        success_message: '',

        // Indicates whether the form is in edit mode (loading an existing project)
        is_edit_form: false,

        // Keeps the current slug in case the form is in edit mode (loading an existing project)
        current_slug: '',

        init(){

            if(!isEditForm){
                const titleEl = document.getElementById('title');
                titleEl.addEventListener('focusout', async () => {
                    if(!titleEl.value){
                        this.resetSlugField();
                    }else{
                        await this.generateSlug();
                    }
                })
            }else {
                this.is_edit_form = true;
                this.current_slug = this.$refs.old_slug.value;
            }

            if(currentSlug){
                this.slug = currentSlug;
                this.is_generated = true;
                return;
            }

            if(hasErrors) {
                this.is_disabled = false;
                if(this.is_edit_form){
                    this.is_editing_from_db = true;
                }else {
                    this.is_editing = true;
                }
            }

        },

        async generateSlug(){

            this.clearMessages();

            const title = document.getElementById('title').value;

            if(!title){
                this.error_message = 'The title field is required.';
                return;
            }

            try{
                let response = await axios.post('/rw-admin/slug-generator', {title: title});
                this.slug = response.data.slug;
                this.is_generated = true;
                this.is_editing = false;
                this.is_editing_from_db = false;
                if(!this.is_disabled) {
                    this.is_disabled = true;
                }
                // console.log(response);
            }catch (e){
                console.error(e);
                alert('Something were wrong! Refresh the page and try again!');
            }
        },

        changeSlug() {

            if(this.is_edit_form){
                this.is_editing_from_db = true;
            }else {
                this.is_editing = true;
            }

            this.is_disabled = false;
            this.is_generated = false;
            this.$nextTick(() => {
                this.focusOnInput()
            })
        },


        focusOnInput() {
            const slugInput = this.$refs.slug;
            slugInput.focus();
            slugInput.select();
        },


        async checkSlug() {

            this.clearMessages();

            const slug = this.$refs.slug.value;

            if(!slug){
                this.error_message = 'The slug field is required.';
                return;
            }

            if(slug === this.current_slug) {
                this.success_message = 'Success! You\'re still using your original slug — and it\'s free.';
                return;
            }

            try {
                let response = await axios.post('/rw-admin/check-slug', {slug: slug});
                this.success_message = response.data.message;
            }catch (e){
                if(e.response.status === 422) {
                    this.error_message = e.response.data.errors.slug[0];
                } else {
                    console.error(e);
                    alert('Something were wrong! Refresh the page and try again!');
                }
            }
        },

        resetSlug(){
            this.clearMessages();
            this.slug = this.current_slug;
        },

        resetSlugField(){
            this.clearMessages();
            this.is_editing = false;
            this.is_generated = false;
            this.is_disabled = true;
            this.slug = '';
        },

        clearMessages() {
            this.error_message = '';
            this.success_message = '';
        },

    }

}
