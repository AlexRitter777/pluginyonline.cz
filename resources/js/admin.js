//import './bootstrap.js';
import Alpine from 'alpinejs';
//import data from './admin/init-alpine.js';
import initAlpine from "./admin/init-alpine.js";

window.Alpine = Alpine;

console.log(window.Alpine);

console.log("Exported function", initAlpine);


Alpine.data("data", initAlpine);



Alpine.start();






/*import './admin/charts-bars.js';
import './admin/charts-lines.js';
import './admin/focus-trap.js';
import './admin/charts-pie.js';*/

