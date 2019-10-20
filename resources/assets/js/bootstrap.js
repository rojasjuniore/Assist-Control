window._ = require('lodash');

try {
    window.$ = window.jQuery = require('jquery');

    window.Popper = Popper;
    require('bootstrap')
    require('datatables.net')
    require('jquery-slimscroll')
    require('jquery-sticky-kit')
    require('metismenu')
    // require('bootstrap-datepicker/js/locales/bootstrap-datepicker.es')
    window.Vue = require('vue');
    window.VueResource = require('vue-resource')
    Vue.use(VueResource)
} catch (e) {}
import Popper from 'popper.js/dist/umd/popper.js';

let token = document.head.querySelector('meta[name="csrf-token"]');
window.Vue.http.headers.common['X-CSRF-TOKEN'] = token.content;
window.Vue.http.headers.common['Content-Type'] = 'application/json'
window.Vue.http.headers.common['Access-Control-Allow-Origin'] = '*'
window.Vue.http.headers.common['Accept'] = 'application/json, text/plain, */*'
window.Vue.http.headers.common['Access-Control-Allow-Headers'] = 'Origin, Accept, Content-Type, Authorization, Access-Control-Allow-Origin'
