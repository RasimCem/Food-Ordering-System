import HomeComponent from './components/client/HomeComponent.vue';
import RestaurantComponent from './components/client/RestaurantComponent.vue';
import PaymentComponent from './components/client/PaymentComponent.vue';
import CartComponent from './components/client/CartComponent.vue';
import ProfileComponent from './components/client/ProfileComponent.vue';
// Panel Components
import PanelHomeComponent from './components/admin-panel/PanelHomeComponent.vue';
import PanelMyRestaurantComponent from './components/admin-panel/PanelMyRestaurantComponent.vue';
import PanelMenuComponent from './components/admin-panel/PanelMenuComponent.vue';
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
        component: PanelHomeComponent
    },
    {
        name: 'panel-my-restaurant',
        path: '/panel-my-restaurant',
        component: PanelMyRestaurantComponent
    },
    {
        name: 'panel-menu',
        path: '/panel-menu',
        component: PanelMenuComponent
    },

];
