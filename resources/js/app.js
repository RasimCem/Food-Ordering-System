/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

window.Vue = require('vue').default;


Vue.component('main-component', require('./components/Main').default);

// CLIENT COMPONENTS
Vue.component('layout-component', require('./components/client/Layout.vue').default);
Vue.component('home-component', require('./components/client/Home.vue').default);
Vue.component('modal-component', require('./components/client/Modal.vue').default);
Vue.component('restaurant-menu-component', require('./components/client/RestaurantMenu.vue').default);
Vue.component('restaurant-comment-component', require('./components/client/RestaurantComment.vue').default);
// RESTAURANT OWNER Components
Vue.component('panel-layout-component', require('./components/panel-common/Layout.vue').default);
Vue.component('home-owner-component', require('./components/owner/Home.vue').default);
Vue.component('my-restaurant-component', require('./components/owner/MyRestaurant.vue').default);
Vue.component('owner-profile-component', require('./components/owner/Profile.vue').default);
Vue.component('menu-component', require('./components/owner/Menu.vue').default);
Vue.component('menu-add-component', require('./components/owner/NewMenu.vue').default);
Vue.component('menu-edit-component', require('./components/owner/MenuEdit.vue').default);
Vue.component('order-history-component', require('./components/owner/OrderHistory.vue').default);
// ADMIN COMPONENTS
Vue.component('admin-home-component', require('./components/admin/Home.vue').default);
Vue.component('admin-profile-component', require('./components/admin/Profile.vue').default);
Vue.component('admin-client-component', require('./components/admin/Clients.vue').default);
Vue.component('admin-restaurants-component', require('./components/admin/Restaurants.vue').default);
Vue.component('admin-restaurant-details-component', require('./components/admin/RestaurantDetails.vue').default);
Vue.component('admin-restaurant-menus-component', require('./components/admin/RestaurantMenus.vue').default);
Vue.component('admin-restaurant-menus-edit-component', require('./components/admin/RestaurantMenusEdit.vue').default);
Vue.component('admin-restaurant-edit-component', require('./components/admin/RestaurantEdit.vue').default);
Vue.component('admin-restaurant-add-component', require('./components/admin/RestaurantAdd.vue').default);
Vue.component('admin-orders-component', require('./components/admin/Orders.vue').default);
Vue.component('admin-orders-details-component', require('./components/admin/OrdersDetails.vue').default);
Vue.component('admin-orders-comments', require('./components/admin/OrdersDetails.vue').default);


import Vuex from 'vuex'
Vue.use(Vuex)
import storeData from "./store/token"
import storeRole from "./store/role"
import VuexPersistence from 'vuex-persist'
const vuexLocal = new VuexPersistence({
    storage: window.localStorage
  })

const store = new Vuex.Store({
    modules:{
        storeData,
        storeRole
    },
   plugins: [vuexLocal.plugin],
})


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
