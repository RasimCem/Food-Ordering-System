import HomeComponent from './components/HomeComponent.vue';
import RestaurantComponent from './components/RestaurantComponent.vue';
import PaymentComponent from './components/PaymentComponent.vue';
import CartComponent from './components/CartComponent.vue';
import ProfileComponent from './components/ProfileComponent.vue';
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
