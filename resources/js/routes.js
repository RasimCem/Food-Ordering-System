import HomeComponent from './components/client/Home.vue';
import RestaurantComponent from './components/client/Restaurant.vue';
import PaymentComponent from './components/client/Payment.vue';
import CartComponent from './components/client/Cart.vue';
import ProfileComponent from './components/client/Profile.vue';
// Restaurant Owner Components
import OwnerHomeComponent from './components/owner/Home.vue';
import OwnerMyRestaurantComponent from './components/owner/MyRestaurant.vue';
import OwnerMenuComponent from './components/owner/Menu.vue';
import OwnerMenuAddComponent from './components/owner/NewMenu.vue';
import OwnerMenuEditComponent from './components/owner/MenuEdit.vue';
import  OwnerOrderHistoryComponent from './components/owner/OrderHistory.vue';
export const routes = [
    {
        name: 'home',
        path: '/',
        component: HomeComponent
    },
    {
        name: 'restaurant',
        path: '/restaurant',
        component: RestaurantComponent
    },
    {
        name: 'payment',
        path: '/payment',
        component: PaymentComponent
    },
    {
        name: 'cart',
        path: '/cart',
        component: CartComponent
    },
    {
        name: 'profile',
        path: '/profile',
        component: ProfileComponent
    },
    {
        name: 'panel-home',
        path: '/panel-home',
        component: OwnerHomeComponent
    },
    {
        name: 'panel-my-restaurant',
        path: '/panel-my-restaurant',
        component: OwnerMyRestaurantComponent
    },
    {
        name: 'panel-menu',
        path: '/panel-menu',
        component: OwnerMenuComponent
    },
    {
        name: 'panel-menu-add',
        path: '/panel-menu-add',
        component: OwnerMenuAddComponent
    },
    {
        name: 'panel-menu-edit',
        path: '/panel-menu-edit',
        component: OwnerMenuEditComponent
    },
    {
        name: 'panel-order-history',
        path: '/panel-order-history',
        component: OwnerOrderHistoryComponent
    },

];
