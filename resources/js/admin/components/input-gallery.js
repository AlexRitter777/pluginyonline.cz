export default function InputGallery(){

    const maxImageSize = 6 * 1024 * 1024;
    const minImagesCount = 1;
    const isFormValidationOn = true;

    return {
        files: {},
        filesToSend:{},
        strings: [],
        positions: {},
        fileName: '',
        errorMessage: '',
        formOnceSubmitted: false,


        init() {
            //observe list changes
            const observer = new MutationObserver(() => {
                this.reOrderingPositions();
            });
            observer.observe(this.$refs.list, {
                childList: true
            });

            // Override form submission
            const form = this.$el.closest('form');
            const originalSubmit = form.submit;

            // Validate gallery when global validation fails
            form.addEventListener('failedValidation', async () => {
                await this.galleryValidation();
            });

            // Fallback: handle form submission manually if no validator is used
            if(!isFormValidationOn){
                form.addEventListener('submit', async (e) => {
                    e.preventDefault();
                    const beforeSubmitResult = await this.beforeSubmit();
                    if (!beforeSubmitResult) return;
                    form.submit();
                });
            } else {
                form.submit = async () => {
                    const beforeSubmitResult = await this.beforeSubmit();
                    if (!beforeSubmitResult) return;
                    originalSubmit.call(form);
                };

            }


        },

        handleFile(e){
           let fileId = Date.now();
           let file = e.target.files[0];
           this.errorMessage = '';

            if(!file) return;

            if(!file.type.startsWith("image/")){
                this.errorMessage = "You can upload only images!";
                console.error(this.errorMessage);
                this.$refs.file.value = ''
                return;
            }

            if(file.size > maxImageSize) {
                this.errorMessage = `The image size must be less then ${maxImageSize/(1024 * 1024)} Mb!`;
                console.error(this.errorMessage);
                this.$refs.file.value = ''
                return;
            }

            this.files[fileId] = file;

            // console.log(this.files);

            this.$refs.file.value = '';

        },

        removeImage(e) {
            let fileId = e.currentTarget.getAttribute('data-id');
            delete this.files[fileId];

        },


        reOrderingPositions() {

            const listItems = Array.from(this.$refs.list.children);

            listItems.shift();

            this.positions = {};

           listItems.forEach((li, index) => {
                const key = li.getAttribute('data-item-id');
                this.positions[key] = index + 1;
            });

        },

        getImageUrl(image) {

            if (image instanceof File){
                return URL.createObjectURL(image);
            }else if (typeof image === 'string'){
                return image;
            }
            return null;
        },

        getFileName(file){

            if (file instanceof File){
                return limitString(file.name, 30);
            } else if(typeof file === "string"){
                return limitString(file.split('/').pop(), 30);
            }
            return null;

        },

        async galleryValidation(){
            if(Object.keys(this.files).length < minImagesCount){
                this.errorMessage = `You should select at least ${minImagesCount} images!`;
                console.error(this.errorMessage);
                return false;
            }
            return true;
        },

        async beforeSubmit(){


            const {files, strings} = this.splitFilesAndStrings(this.files);

            this.filesToSend = files;
            this.strings = strings;


            const galleryValidationResult = await this.galleryValidation();

            if(!galleryValidationResult){
                return false;
            }

            this.createFileInputs(this.filesToSend);
            this.createInputText(this.positions, 'positions');
            this.createInputText(this.strings, 'oldImagesIds');

            // console.log(this.positions);
            // console.log(this.filesToSend);
            // console.log( this.strings);

            return true;
        },

        createFileInputs(files) {

            for (let [id, file] of Object.entries(files)) {
                const dt = new DataTransfer()
                dt.items.add(file)

                const input = document.createElement('input')
                input.type = 'file'
                input.name = `images[${id}]`
                input.className = 'hidden'
                input.files = dt.files

                const form = this.$el.closest('form');

                form.appendChild(input);
            }
        },


        createInputText(value, name) {
            const form = this.$el.closest('form');
            const input = document.createElement('input')
            input.type = 'hidden'
            input.name = name
            input.value = JSON.stringify(value)
            form.appendChild(input)

        },

        splitFilesAndStrings(files) {

            const strings = [];
            const newFiles = {};

            for (const [key, value] of Object.entries(files)) {
                if (typeof value === 'string') {
                    strings.push(key);
                } else {
                    newFiles[key] = value;
                }
            }

            return { files: newFiles, strings };
        },



    }


    function limitString(text, count){
        return text.slice(0, count) + (text.length > count ? " ..." : "");
    }




}
