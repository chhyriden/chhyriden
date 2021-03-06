
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

window.slug = require('slug');
slug.defaults.mode = "rfc3986";

import Buefy from 'buefy';
Vue.use(Buefy);

Vue.component('slug-widget', require('./components/slugWidget.vue'));

require('./backend');
