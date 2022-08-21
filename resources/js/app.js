import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

import Vue from 'vue'

//aktifin.vueRouter
import VueRouter from 'vue-router';
Vue.use(VueRouter);


//plugin.notif.vuejs
import Toasted from 'vue-toasted';
Vue.use(Toasted)

Vue.component('pagination', require('laravel-vue-pagination'));

import routes from './router'



const app = new Vue({
    el: '#parsinta',
    router: new VueRouter(routes),
});
