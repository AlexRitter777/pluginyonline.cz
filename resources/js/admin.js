//import './bootstrap.js';
import Alpine from 'alpinejs';
import initAlpine from "./admin/init-alpine.js";
import {initSummernote} from "./admin/init-summernote.js";
import imageUpload from "./admin/components/input-file.js";
import formValidation from "./admin/form-validation.js";
import modal from  "./admin/components/modal.js";


window.Alpine = Alpine;

Alpine.data("data", initAlpine);
Alpine.data('imageUpload', imageUpload);
Alpine.data('formValidation', formValidation);
Alpine.data('modal', modal);

Alpine.start();


import $ from 'jquery';
window.$ = $;
window.jQuery = $;

initSummernote('#services #content');


/*import './admin/charts-bars.js';
import './admin/charts-lines.js';
import './admin/focus-trap.js';
import './admin/charts-pie.js';*/

