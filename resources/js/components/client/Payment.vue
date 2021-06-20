<template>
    <div class="container mx-auto sm:p-5 mt-10">
        <h1 class="text-2xl mb-1 ml-2">Payment</h1>
        <hr />
        <div class="w-full p-2">
            <select
                class="my-2 input w-1/2 p-1 "
                @change="updatePaymentMethod($event)"
                v-model="selectedPaymentMethod"
            >
                <option value="online" class="input"
                    >Credit Card (Online)
                </option>
                <option value="door" class="input"
                    >Cash Or Credit Card (Pay At The Door)</option
                >
            </select>
            <div class="mt-2 text-base font-medium flex">
                <div
                    class="w-full md:w-1/2"
                    v-if="selectedPaymentMethod == 'online'"
                >
                    <div class="w-full my-3">
                        <label for="" class="block mb-0">Name</label>
                        <input class="input" type="text" />
                    </div>

                    <div class="w-full my-3">
                        <label for="" class="block mb-0">Card Number</label>
                        <input class="input" type="text" />
                    </div>
                    <div class="w-1/2 my-3">
                        <label for="" class="block mb-0"
                            >Expiration Date(mm/yy)</label
                        >
                        <input class="input" type="text" />
                    </div>
                    <div class="w-1/2 my-3">
                        <label for="" class="block mb-0">Security Code</label>
                        <input class="input" type="text" />
                    </div>
                    <div class="my-8 text-base font-medium">
                        <button class="button" @click="createMyOrder">
                            Confirm
                        </button>
                    </div>
                    <small class="text-sm my-1"
                        >You can track your orders status from the "Order
                        History" page.
                    </small>
                </div>
                <div class="w-full md:w-1/2" v-else>
                    <small class="text-sm my-1"
                        >You selected Pay At The Door Method. You can pay it
                        when you get your service. You can use your credit cart
                        or cash, its up to you..
                    </small>
                    <div class="my-8 text-base font-medium">
                        <button class="button" @click="createMyOrder">
                            Confirm
                        </button>
                    </div>
                </div>

                <div class=" hidden md:block w-1/3 p-5 text-center">
                    <img
                        :src="
                            require('../../../../public/images/lock.svg')
                                .default
                        "
                        alt=""
                        class="w-64 float-right"
                    />
                </div>
            </div>
        </div>
        <h1 class="text-2xl mt-3 ml-3">My Cart</h1>
        <hr />
        <table class="content-table">
            <thead class="bg-yellow-400">
                <tr>
                    <th class="border-2 border-gray-600 p-2">Product</th>
                    <th class="border-2 border-gray-600 p-2">Number</th>
                    <th class="border-2 border-gray-600 p-2">Price</th>
                    <th class="border-2 border-gray-600 p-2">Remove</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="menu in menus" :key="menu.id">
                    <td class="border-2 border-gray-600 p-2">
                        {{ menu.menus.name }}
                    </td>
                    <td class="border-2 border-gray-600 p-2">x1</td>
                    <td class="border-2 border-gray-600 p-2">
                        {{ menu.menus.price }}
                    </td>
                    <td class="border-2 border-gray-600 p-2 pl-3">
                        <a
                            href="#"
                            class="hover:text-red-500 "
                            @click="removeItem(menu.id)"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
                                />
                            </svg>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td class="p-2">TOTAL:</td>
                    <td></td>
                    <td></td>
                    <td class="border-2 border-gray-600 p-2 text-primarycolor">
                        {{ Math.round(totalPrice * 100) / 100 }} $
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from "axios";
import { ToastSuccess, ToastError } from "../../toasters";
export default {
    data() {
        return {
            menus: null,
            totalPrice: 0,
            token: null,
            selectedPaymentMethod: "online"
        };
    },
    mounted() {
        this.getMyCart();
    },
    methods: {
        getMyCart() {
            this.totalPrice = 0;
            this.token = this.$store.getters.getToken;
            axios
                .get("http://localhost:8000/api/cart", {
                    headers: {
                        Accept: "application/json",
                        Authorization: "Bearer " + this.token
                    }
                })
                .then(response => {
                    this.menus = response.data;
                    this.menus.forEach(price => {
                        this.totalPrice += price.menus.price;
                    });
                });
        },
        removeItem(menuId) {
            axios
                .get("http://localhost:8000/api/cart-delete/" + menuId, {
                    headers: {
                        Accept: "application/json",
                        Authorization: "Bearer " + this.token
                    }
                })
                .then(response => {
                    ToastSuccess.fire({
                        icon: "success",
                        title: response.data
                    });
                    this.getMyCart();
                });
        },
        updatePaymentMethod(event) {
            this.selectedPaymentMethod = event.target.value;
        },
        createMyOrder() {
            axios
                .get("http://localhost:8000/api/order/create", {
                    headers: {
                        Accept: "application/json",
                        Authorization: "Bearer " + this.token
                    }
                })
                .then(response => {
                    ToastSuccess.fire({
                        icon: "success",
                        title: response.data
                    });
                    this.getMyCart();
                })
                .catch(error => {
                    ToastError.fire({
                        icon: "error",
                        title: error.response.data
                    });
                });
        }
    }
};
</script>

<style scoped></style>
