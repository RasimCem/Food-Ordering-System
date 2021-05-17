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
Vue.component('admin-home-component', require('./components/admin/Home.vue').default);
Vue.component('admin-client-component', require('./components/admin/Clients.vue').default);
Vue.component('admin-restaurants-component', require('./components/admin/Restaurants.vue').default);
Vue.component('admin-restaurant-details-component', require('./components/admin/RestaurantDetails.vue').default);
Vue.component('admin-restaurant-menus-component', require('./components/admin/RestaurantMenus.vue').default);
Vue.component('admin-restaurant-menus-edit-component', require('./components/admin/RestaurantMenusEdit.vue').default);
Vue.component('admin-restaurant-edit-component', require('./components/admin/RestaurantEdit.vue').default);
Vue.component('admin-restaurant-add-component', require('./components/admin/RestaurantAdd.vue').default);
Vue.component('admin-complaints-component', require('./components/admin/Complaints.vue').default);
Vue.component('admin-orders-component', require('./components/admin/Orders.vue').default);
Vue.component('admin-orders-details-component', require('./components/admin/OrdersDetails.vue').default);
Vue.component('admin-orders-comments', require('./components/admin/OrdersDetails.vue').default);


import Vuex from 'vuex'
Vue.use(Vuex)
import storeData from "./store/token"

const store = new Vuex.Store(
   storeData
)

 import VueRouter from 'vue-router';
 import { routes } from './routes';
 Vue.use(VueRouter);
 const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue({
    el: '#app',
    router,
    store
});

const panel = new Vue({
    el: '#panel',
    router
});
