export default function imageUpload(){

    const maxImageSize = 6 * 1024 * 1024;

    return {
        imageName: '',
        imagePreview: '',
        imageValid: true,
        errorMessage: '',
        tempImageUrl: '',


        handleInputChange(e) {

            console.log('Handled!')

            const file = e.target.files[0];

            if(!file) return;

            if(!file.type.startsWith("image/")){
                this.imageValid = false;
                this.errorMessage = "You can upload only images!";
                console.log(this.errorMessage);
                return;
            }

            if(file.size > maxImageSize) {
                this.imageValid = false;
                this.errorMessage = `The image size must be less then ${maxImageSize}`;
                console.log(this.errorMessage);
                return;
            }

            this.imageName = file.name;

            this.tempImageUrl = URL.createObjectURL(file);

        },

        removeImage() {
            this.tempImageUrl = '';
            this.imageName = '';
            this.$refs.inputFile.value = '';
        }


    }

}
