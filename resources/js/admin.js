import Alpine from 'alpinejs';
import initAlpine from "./admin/init-alpine.js";
import {initSummernote} from "./admin/init-summernote.js";
import imageUpload from "./admin/components/input-file.js";
import formValidation from "./admin/form-validation.js";
import modal from  "./admin/components/modal.js";
import {sort} from "@alpinejs/sort";
import $ from 'jquery';
import InputGallery from "./admin/components/input-gallery.js";


window.Alpine = Alpine;

Alpine.plugin(sort);
Alpine.data("data", initAlpine);
Alpine.data('imageUpload', imageUpload);
Alpine.data('formValidation', formValidation);
Alpine.data('modal', modal);
Alpine.data('inputGallery', InputGallery);


Alpine.start();

window.$ = $;
window.jQuery = $;

initSummernote('#services #content');
initSummernote('#portfolio #content');
initSummernote('#pages #content', {height: 600});



