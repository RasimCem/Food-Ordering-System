// Clients Routes
import HomeComponent from "./components/client/Home.vue";
import RestaurantComponent from "./components/client/Restaurant.vue";
import PaymentComponent from "./components/client/Payment.vue";
import CartComponent from "./components/client/Cart.vue";
import ProfileComponent from "./components/client/Profile.vue";

// Admin and Owner Panel 
import PanelComponent from "./components/panel-common/Layout.vue";

// Restaurant Owner Routes
import OwnerHomeComponent from "./components/owner/Home.vue";
import OwnerMyRestaurantComponent from "./components/owner/MyRestaurant.vue";
import OwnerMenuComponent from "./components/owner/Menu.vue";
import OwnerMenuAddComponent from "./components/owner/NewMenu.vue";
import OwnerMenuEditComponent from "./components/owner/MenuEdit.vue";
import OwnerOrderHistoryComponent from "./components/owner/OrderHistory.vue";
// Admin Routes
import AdminHomeComponent from "./components/admin/Home.vue";
import AdminClientsComponent from "./components/admin/Clients.vue";
import AdminEditClientsComponent from "./components/admin/EditClients.vue";
import AdminRestaurantsComponent from "./components/admin/Restaurants.vue";
import AdminRestaurantDetailsComponent from "./components/admin/RestaurantDetails.vue";
import AdminRestaurantMenusComponent from "./components/admin/RestaurantMenus.vue";
import AdminRestaurantMenusEditComponent from "./components/admin/RestaurantMenusEdit.vue";
import AdminRestaurantEditComponent from "./components/admin/RestaurantEdit.vue";
import AdminRestaurantAddComponent from "./components/admin/RestaurantAdd.vue";
import AdminComplaintsComponent from "./components/admin/Complaints.vue";
import AdminOrdersComponent from "./components/admin/Orders.vue";
import AdminOrdersDetailsComponent from "./components/admin/OrdersDetails.vue";
import AdminCommentsComponent from "./components/admin/Comments.vue";
export const routes = [
    {
        name: "home",
        path: "/home",
        component: HomeComponent
    },
    {
        name: "restaurant",
        path: "/restaurant",
        component: RestaurantComponent
    },
    {
        name: "payment",
        path: "/payment",
        component: PaymentComponent
    },
    {
        name: "cart",
        path: "/cart",
        component: CartComponent
    },
    {
        name: "profile",
        path: "/profile",
        component: ProfileComponent
    },
    {
        name: "panel",
        path: "/panel",
        component: PanelComponent
    },
    {
        name: "panel-home",
        path: "/panel/home",
        component: OwnerHomeComponent
    },
    {
        name: "panel-my-restaurant",
        path: "/panel/my-restaurant",
        component: OwnerMyRestaurantComponent
    },
    {
        name: "panel-menu",
        path: "/panel/menu",
        component: OwnerMenuComponent
    },
    {
        name: "panel-menu-add",
        path: "/panel/menu-add",
        component: OwnerMenuAddComponent
    },
    {
        name: "panel-menu-edit",
        path: "/panel/menu-edit",
        component: OwnerMenuEditComponent
    },
    {
        name: "panel-order-history",
        path: "/panel/order-history",
        component: OwnerOrderHistoryComponent
    },
    {
        name: "panel-admin-home",
        path: "/panel/admin/home",
        component: AdminHomeComponent
    },
    {
        name: "panel-admin-clients",
        path: "/panel/admin/clients",
        component: AdminClientsComponent
    },
    {
        name: "panel-admin-edit-clients",
        path: "/panel/admin/edit-clients",
        component: AdminEditClientsComponent
    },
    {
        name: "panel-admin-restaurants",
        path: "/panel/admin/restaurants",
        component: AdminRestaurantsComponent
    },
    {
        name: "panel-admin-restaurant-details",
        path: "/restaurant-details",
        component: AdminRestaurantDetailsComponent
    },
    {
        name: "panel-admin-restaurant-menus",
        path: "/restaurant-menus",
        component: AdminRestaurantMenusComponent
    },
    {
        name: "panel-admin-restaurant-menus-edit",
        path: "/restaurant-menus-edit",
        component: AdminRestaurantMenusEditComponent
    },
    {
        name: "panel-admin-restaurant-edit",
        path: "/restaurant-edit",
        component: AdminRestaurantEditComponent
    },
    {
        name: "panel-admin-restaurant-add",
        path: "/restaurant-add",
        component: AdminRestaurantAddComponent
    },
    {
        name: "panel-admin-complaints",
        path: "/panel/admin/complaints",
        component: AdminComplaintsComponent
    },
    {
        name: "panel-admin-orders",
        path: "/panel/admin/orders",
        component: AdminOrdersComponent
    },
    {
        name: "panel-admin-orders-details",
        path: "/panel/admin/orders-details",
        component: AdminOrdersDetailsComponent
    },
    {
        name: "panel-admin-comments",
        path: "/panel/admin/comments",
        component: AdminCommentsComponent
    }
];
