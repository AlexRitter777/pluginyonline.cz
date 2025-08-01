
import {focusTrap} from "../focus-trap.js";

export default () => ({

    isModalOpen: false,
    trapCleanup: null,


    openModal() {
        this.isModalOpen = true
        this.trapCleanup = focusTrap(document.querySelector('#modal'))
    },

    closeModal() {
        this.isModalOpen = false
        this.trapCleanup()
    }

});
