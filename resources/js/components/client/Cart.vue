<template>
    <div>
        <div class="container flex p-3 mt-5 overflow-auto ">
            <div>
                <h1 class="text-2xl ml-3">My Cart</h1>
                <hr />
                <table class="content-table">
                    <thead class="bg-yellow-400">
                        <tr>
                            <th class="border-2 border-gray-600 p-2">Image</th>
                            <th class="border-2 border-gray-600 p-2">
                                Product
                            </th>
                            <th class="border-2 border-gray-600 p-2">Number</th>
                            <th class="border-2 border-gray-600 p-2">Price</th>
                            <th class="border-2 border-gray-600 p-2">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="menu in menus" :key="menu.id">
                            <td class="border-2 border-gray-600 p-2">
                                <img
                                    class=" object-contain  w-80 h-20 rounded"
                                    v-if="menu.menus.image"
                                    :src="menu.menus.image"
                                    alt=""
                                />
                                <img
                                    class=" object-contain  w-80 h-20 rounded"
                                    v-else
                                    :src="
                                        require('../../../../public/images/no-image.png')
                                            .default
                                    "
                                    alt=""
                                />
                            </td>
                            <td class="border-2 border-gray-600 p-2">
                                {{ menu.menus.name }}
                            </td>
                            <td class="border-2 border-gray-600 p-2">1</td>
                            <td class="border-2 border-gray-600 p-2">
                                {{ menu.menus.price }}
                            </td>
                            <td class="border-2 border-gray-600 p-2 ">
                                <a
                                    class="hover:text-red-500 "
                                    @click="removeItem(menu.id)"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6 m-auto "
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

                            <td class=" p-2 text-lg text-primarycolor">
                                {{ Math.round(totalPrice * 100) / 100 }} $
                            </td>
                            <td class="border-2 border-gray-600 p-2">
                                <router-link
                                    :to="{ name: 'payment' }"
                                    class="cursor-pointer text-md hover:text-yellow-400 "
                                    ><svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6 m-auto"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"
                                        /></svg
                                ></router-link>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class=" hidden md:block w-1/3 p-5 text-center">
                <img
                    :src="require('../../../../public/images/cart.svg').default"
                    alt=""
                    class="w-64 float-right"
                />
            </div>
        </div>
        <div class="container m-auto p-3  overflow-auto">
            <a
                class="cursor-pointer hover:text-yellow-400 ml-3"
                style="text-decoration:none; "
                @click="showOrderHistory = !showOrderHistory"
                >Click Here To
                <span v-if="!showOrderHistory"> Display</span>
                <span v-if="showOrderHistory"> Hide</span>
                <strong>Order History</strong></a
            >
            <transition name="fade">
                <table v-if="showOrderHistory" class="content-table">
                    <thead class="bg-yellow-400">
                        <tr>
                            <th class="border-2 border-gray-600 p-2">
                                Restaurant Name
                            </th>
                            <th class="border-2 border-gray-600 p-2">
                                Products
                            </th>
                            <th class="border-2 border-gray-600 p-2">
                                Total Price
                            </th>
                            <th class="border-2 border-gray-600 p-2">Date</th>
                            <th class="border-2 border-gray-600 p-2">Time</th>
                            <th class="border-2 border-gray-600 p-2">
                                Comment
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="oldOrder in oldOrders" :key="oldOrder.id">
                            <td class="border-2 border-gray-600 p-2">
                                {{ oldOrder.restaurant.name }}
                            </td>
                            <td class="border-2 border-gray-600 p-2">
                                {{ oldOrder.content }}
                            </td>
                            <td class="border-2 border-gray-600 p-2">
                                {{ oldOrder.total_price }} $
                            </td>
                            <td class="border-2 border-gray-600 p-2">
                                {{ oldOrder.created_at.substring(0, 10) }}
                            </td>
                            <td class="border-2 border-gray-600 p-2">
                                {{ oldOrder.created_at.substring(11, 16) }}
                            </td>

                            <td class="border-2 border-gray-600 p-2 ">
                                <a
                                    href="#"
                                    class="hover:text-red-500 "
                                    @click="openCommentModal(oldOrder.id)"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6 m-auto"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"
                                        />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </transition>
        </div>

        <!-- Comment Modal -->
        <div
            class="absolute z-5  top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 container shadow-inner"
            v-show="isCommentOpen"
        >
            <div
                class=" bg-gray-50 border-2 border-primarycolor rounded-lg w-1/1 sm:w-3/4 lg:w-1/2 xl:w-1/3 m-auto  relative"
            >
                <div class=" py-2 px-4">
                    <div class="">
                        <div
                            class="absolute top-1 right-1 cursor-pointer hover:text-yellow-400"
                            @click="isCommentOpen = false"
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
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
                        </div>
                        <h2 class="text-center text-xl font-semibold mt-2">
                            Send Your Comment
                        </h2>
                        <div
                            class="w-full h-auto bg-red-500 px-5 py-2 rounded"
                            v-if="commentErrors != null"
                        >
                            <p v-for="error in commentErrors" :key="error[0]">
                                {{ error[0] }}
                            </p>
                        </div>
                        <div class="mt-2 text-base font-medium">
                            <label for="" class="block mb-0">Point</label>
                            <input
                                class="w-full py-1 px-2 border-2 border-gray-900 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                                type="number"
                                v-model="comment.point"
                                min="1"
                                max="10"
                            />
                            <small>Between 1 and 10</small>
                        </div>
                        <div class="mt-2 text-base font-medium">
                            <label for="" class="block mb-0">Comment</label>
                            <textarea
                                class="w-full py-1 px-2 border-2 border-gray-900 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                                type="text"
                                v-model="comment.comment"
                            ></textarea>
                        </div>
                        <div class="my-4 text-base font-medium text-center">
                            <button
                                class="bg-yellow-400 hover:bg-yellow-500 text-white py-2 px-4 rounded"
                                @click="sendMyComment()"
                            >
                                Send
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-44"></div>
    </div>
</template>
<script>
import Swal from "sweetalert2";
import axios from "axios";
import { ToastSuccess } from "../../toasters";
export default {
    data() {
        return {
            showOrderHistory: false,
            menus: null,
            token: null,
            totalPrice: 0,
            oldOrders: null,
            isCommentOpen: false,
            comment: {
                point: 0,
                comment: null
            },
            selectedOrder: null,
            commentErrors: null
        };
    },
    mounted() {
        this.getMyCart();
        this.getMyOrderHistory();
    },
    methods: {
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
        getMyOrderHistory() {
            axios
                .get("http://localhost:8000/api/order/history-client", {
                    headers: {
                        Accept: "application/json",
                        Authorization: "Bearer " + this.token
                    }
                })
                .then(response => {
                    this.oldOrders = response.data;
                });
        },
        openCommentModal(orderId) {
            (this.isCommentOpen = true), (this.selectedOrder = orderId);
        },
        sendMyComment() {
            this.commentErrors = null;
            axios
                .put(
                    "http://localhost:8000/api/comment/" + this.selectedOrder,
                    this.comment,
                    {
                        headers: {
                            Accept: "application/json",
                            Authorization: "Bearer " + this.token
                        }
                    }
                )
                .then(response => {
                    ToastSuccess.fire({
                        icon: "success",
                        title: response.data
                    });
                    this.isCommentOpen = false;
                    this.comment.point = 0;
                    this.comment.comment = null;
                })
                .catch(error => {
                    if (typeof error.response.data.errors !== "undefined") {
                        this.commentErrors = error.response.data.errors;
                        this.commentErrors = Object.values(this.commentErrors);
                    } else {
                        Swal.fire({
                            text: error.response.data,
                            confirmButtonColor: "orange"
                        });
                        this.comment.point = 0;
                        this.comment.comment = null;
                    }
                });
        }
    }
};
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0;
}
</style>
