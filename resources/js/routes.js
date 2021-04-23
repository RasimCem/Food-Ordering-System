import HomeComponent from './components/client/HomeComponent.vue';
import RestaurantComponent from './components/client/RestaurantComponent.vue';
import PaymentComponent from './components/client/PaymentComponent.vue';
import CartComponent from './components/client/CartComponent.vue';
import ProfileComponent from './components/client/ProfileComponent.vue';
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

];
