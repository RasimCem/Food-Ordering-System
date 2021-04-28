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
// CLIENT COMPONENTS
Vue.component('layout-component', require('./components/client/Layout.vue').default);
Vue.component('home-component', require('./components/client/Home.vue').default);
Vue.component('modal-component', require('./components/client/Modal.vue').default);
Vue.component('restaurant-component', require('./components/client/Restaurant.vue').default);

// RESTAURANT OWNER Components
Vue.component('panel-layout-component', require('./components/panel-common/Layout.vue').default);
Vue.component('home-owner-component', require('./components/owner/Home.vue').default);
Vue.component('my-restaurant-component', require('./components/owner/MyRestaurant.vue').default);
Vue.component('menu-component', require('./components/owner/Menu.vue').default);
Vue.component('menu-add-component', require('./components/owner/NewMenu.vue').default);
Vue.component('menu-edit-component', require('./components/owner/MenuEdit.vue').default);
Vue.component('order-history-component', require('./components/owner/OrderHistory.vue').default);

// ADMIN COMPONENTS
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
