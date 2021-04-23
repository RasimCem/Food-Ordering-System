/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('layout-component', require('./components/client/LayoutComponent.vue').default);
Vue.component('home-component', require('./components/client/HomeComponent.vue').default);
Vue.component('modal-component', require('./components/client/ModalComponent.vue').default);
Vue.component('restaurant-component', require('./components/client/RestaurantComponent.vue').default);

// Admin Panel Components
Vue.component('panel-layout-component', require('./components/admin-panel/PanelLayoutComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
 import VueRouter from 'vue-router';
 import { routes } from './routes';
 Vue.use(VueRouter);
 const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue({
    el: '#app',
    router
});

const panel = new Vue({
    el: '#panel',
    router
});
