//import './bootstrap.js';
import Alpine from 'alpinejs';
//import data from './admin/init-alpine.js';
import initAlpine from "./admin/init-alpine.js";
import {initSummernote} from "./admin/init-summernote.js";
import imageUpload from "./admin/components/input-file.js"

window.Alpine = Alpine;
Alpine.data("data", initAlpine);
Alpine.data('imageUpload', imageUpload);
Alpine.start();


import $ from 'jquery';
window.$ = $;
window.jQuery = $;

initSummernote('#service_content');


/*import './admin/charts-bars.js';
import './admin/charts-lines.js';
import './admin/focus-trap.js';
import './admin/charts-pie.js';*/

