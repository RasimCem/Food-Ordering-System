<template>
    <div>
        <h2 class="text-lg px-2 mt-5">Order Details</h2>
        <hr />
        <div class=" my-2 md:p-3 grid grid-cols-1 lg:grid-cols-2 gap-4">
            <div>
                <label for="">Order Id: </label>
                <span class="font-extrabold text-gray-900 text-opacity-50">{{
                    order.id
                }}</span>
            </div>
            <div>
                <label for="">Status: </label>
                <span class="font-extrabold text-gray-900 text-opacity-50">{{
                    order.status
                }}</span>
            </div>
            <div>
                <label for="">From: </label>
                <span class="font-extrabold text-gray-900 text-opacity-50"
                    >{{ order.user.name }} {{ order.user.surname }}</span
                >
            </div>
            <div>
                <label for="">Order Owner Mail: </label>
                <span class="font-extrabold text-gray-900 text-opacity-50">{{
                    order.user.mail
                }}</span>
            </div>
            <div>
                <label for="">Meals: </label>
                <span class="font-extrabold text-gray-900 text-opacity-50">{{
                    order.content
                }}</span>
            </div>
            <div>
                <label for="">Price: </label>
                <span class="font-extrabold text-gray-900 text-opacity-50">{{
                    order.total_price
                }}</span>
            </div>
            <div>
                <label for="">Date: </label>
                <span class="font-extrabold text-gray-900 text-opacity-50">{{
                    order.created_at
                }}</span>
            </div>
        </div>
        <h2 class="text-lg px-2 mt-5">Restaurant Details</h2>
        <hr />
        <div class=" my-2 md:p-3 grid grid-cols-1 lg:grid-cols-2 gap-4">
            <div>
                <label for="">Restaurant Id: </label>
                <span class="font-extrabold text-gray-900 text-opacity-50">{{
                    order.restaurant_id
                }}</span>
            </div>
            <div>
                <label for="">Restaurant Id: </label>
                <span class="font-extrabold text-gray-900 text-opacity-50">{{
                    order.restaurant.name
                }}</span>
            </div>
            <div>
                <label for="">Country: </label>
                <span class="font-extrabold text-gray-900 text-opacity-50">{{
                    order.restaurant.country
                }}</span>
            </div>
            <div>
                <label for="">City: </label>
                <span class="font-extrabold text-gray-900 text-opacity-50">{{
                    order.restaurant.city
                }}</span>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";
export default {
    data() {
        return {
            order:{
                user:{},
                restaurant:{}
            }
        };
    },
    mounted() {
        this.getOrderDetails();
    },
    methods: {
        getOrderDetails() {
            const orderId = this.$route.params.id;
            axios
                .get("http://localhost:8000/api/order/show/" + orderId, {
                    headers: {
                        Accept: "application/json",
                        Authorization: "Bearer " + this.$store.getters.getToken
                    }
                })
                .then(response => {
                    this.order = response.data;
                });
        }
    }
};
</script>
