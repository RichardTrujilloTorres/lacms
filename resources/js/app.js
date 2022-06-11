/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import mitt from "mitt";

require('./bootstrap');

window.Vue = require('vue').default;

import VueRouter from "vue-router";
import Toasted from 'vue-toasted';
import routes from './routes.js';

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Common
 */
Vue.component('common_navbar', require('./components/Common/Navbar.vue').default);
Vue.component('common_sidebar', require('./components/Common/Sidebar.vue').default);
Vue.component('common_footer', require('./components/Common/Footer.vue').default);

/**
 * Pages
 */
Vue.component('pages_posts', require('./components/Pages/Posts.vue').default);
Vue.component('pages_page-not-found', require('./components/Pages/PageNotFound.vue').default);
Vue.component('pages_user', require('./components/Pages/User.vue').default);


Vue.component('app', require('./components/App.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const router = new VueRouter({
    mode: 'history',
    routes,
})
Vue.use(VueRouter)

Vue.use(Toasted)


export const emitter = mitt()

const app = new Vue({
    router,
    // el: '#app',
});

app.$mount('#app')
