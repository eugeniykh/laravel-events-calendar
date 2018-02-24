
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import BootstrapDatepicker from 'bootstrap-datepicker'
import moment from 'moment'
import Fullcalendar from 'fullcalendar'

window.Vue = require('vue');
window.VueResource = require('vue-resource');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.directive('datepicker', {
    components: {
        BootstrapDatepicker
    },
    inserted: (el) => {
        $(el).datepicker({
            format: 'yyyy-mm-dd'
        });
    }
});

Vue.directive('calendar', {
    components: {
        moment,
        Fullcalendar
    },
    inserted: function (el) {
        Vue.http.get('/events').then((response) => {
            let events = response.body;
            // change events structure for fullcalendar
            events.forEach((value) => {
               value.start = value.date;
            });
            $(el).fullCalendar({events});
        });
    }
});

const app = new Vue({
    el: '#app'
});
