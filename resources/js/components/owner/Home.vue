<template>
    <div>
        <h2 class="text-lg px-2 mt-3">New Orders</h2>
        <hr />
        <div class=" my-2 md:p-3 ">
            <div class="overflow-x-auto" v-if="newOrders.length">
                <table class="content-table m-0 my-1 w-full ">
                    <thead class="bg-yellow-400 text-xs">
                        <tr>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                By
                            </th>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Mail Address
                            </th>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Address
                            </th>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Date Time
                            </th>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Order
                            </th>

                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Note
                            </th>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Total Price
                            </th>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Approval
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-xs">
                        <tr v-for="newOrder in newOrders" :key="newOrder.id">
                            <td
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                {{ newOrder.user.name }}
                                {{ newOrder.user.surname }}
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                {{ newOrder.user.mail }}
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                {{ newOrder.user.customer.address_description }}
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                {{ newOrder.created_at }}
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                {{ newOrder.content }}
                            </td>

                            <td
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Vel voluptate laudantium
                                facilis fugit praesentium doloremque!
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-primarycolor text-center"
                            >
                                {{ newOrder.total_price }}
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                <button
                                    @click="acceptOrder(newOrder.id)"
                                    class="button bg-red-500 hover:bg-red-600"
                                >
                                    Accept
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="bg-red-500 px-3 md:px-5 py-2 rounded" v-else>
                <ul class="text-xs md:text-md">
                    <li>Orders not found recently.</li>
                </ul>
            </div>
        </div>
        <h2 class="text-lg px-2 mt-3">Latest Comments (in 24 hours)</h2>
        <hr />
        <div class=" my-2 md:p-3">
            <div class=" overflow-x-auto" v-if="comments.length">
                <table class="content-table  m-0 my-1 w-full">
                    <thead class="bg-yellow-400 text-xs">
                        <tr>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Name
                            </th>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Comment
                            </th>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Point
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-xs">
                        <tr v-for="comment in comments" :key="comment.id">
                            <td
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                {{ comment.order.user.mail }}
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-center text-xs"
                            >
                                {{ comment.comment }}
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                               {{comment.point}}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div
                class="w-full h-auto bg-red-500 px-3 md:px-5 py-2 rounded"
                v-else
            >
                <ul class="text-xs md:text-md">
                    <li>
                        There is not found any comments in last 24 hours.
                    </li>
                </ul>
            </div>
        </div>
        <h2 class="text-lg px-2 mt-3">
            Selling Statistics-2021 (last 12 months)
        </h2>
        <hr />
        <div
            class="w-full h-auto bg-red-500 px-3 md:px-5 py-2 rounded sm:hidden"
        >
            <ul class="text-xs md:text-md">
                <li>
                    Please use computer view to display graph.
                </li>
            </ul>
        </div>
        <div class=" my-2 md:p-3 mb-12 hidden sm:block">
            <canvas id="myChart" height="75"></canvas>
        </div>
    </div>
</template>

<script>
import { ToastSuccess } from "../../toasters";
import axios from "axios";
import Chart from "chart.js";
import { sellingChart } from "../charts/selling-chart.js";
export default {
    data() {
        return {
            sellingChart: sellingChart,
            newOrders: [],
            comments: [],
            token: null,
            monthlyOrders: null
        };
    },
    methods: {
        getWaitingOrders() {
            this.token = this.$store.getters.getToken;
            axios
                .get("http://localhost:8000/api/order/show-active-orders", {
                    headers: {
                        Accept: "application/json",
                        Authorization: "Bearer " + this.token
                    }
                })
                .then(response => {
                    this.newOrders = response.data;
                });
        },
        acceptOrder(orderId) {
            axios
                .get(
                    "http://localhost:8000/api/order/status-update/" +
                        orderId +
                        "/accepted",
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
                        title: "Order Accepted!"
                    });
                    this.getWaitingOrders();
                });
        },
        getComments() {
            axios
                .get("http://localhost:8000/api/comment/my-restaurant", {
                    headers: {
                        Accept: "application/json",
                        Authorization: "Bearer " + this.token
                    }
                })
                .then(response => {
                    this.comments = response.data;
                });
        },
        getMonthlyOrders() {
            axios
                .get("http://localhost:8000/api/orders/my-restaurant/monthly", {
                    headers: {
                        Accept: "application/json",
                        Authorization: "Bearer " + this.token
                    }
                })
                .then(response => {
                    this.monthlyOrders = response.data;
                    // console.log(this.monthlyOrders['05']);
                    this.convertMonthlyDataToArray(this.monthlyOrders);
                });
        },
        convertMonthlyDataToArray(monthlyOrders) {
            let months = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
            if (monthlyOrders["01"]) {
                months[0] = monthlyOrders["01"].length;
            }
            if (monthlyOrders["02"]) {
                months[1] = monthlyOrders["02"].length;
            }
            if (monthlyOrders["03"]) {
                months[2] = monthlyOrders["03"].length;
            }
            if (monthlyOrders["04"]) {
                months[3] = monthlyOrders["04"].length;
            }
            if (monthlyOrders["05"]) {
                months[4] = is.monthlyOrders["05"].length;
            }
            if (monthlyOrders["06"]) {
                months[5] = monthlyOrders["06"].length;
            }
            if (monthlyOrders["07"]) {
                months[6] = monthlyOrders["07"].length;
            }
            if (monthlyOrders["08"]) {
                months[7] = monthlyOrders["08"].length;
            }
            if (monthlyOrders["09"]) {
                months[8] = monthlyOrders["09"].length;
            }
            if (monthlyOrders["10"]) {
                months[9] = monthlyOrders["10"].length;
            }
            if (monthlyOrders["11"]) {
                months[10] = monthlyOrders["11"].length;
            }
            if (monthlyOrders["12"]) {
                months[11] = monthlyOrders["12"].length;
            }
            // console.log(months);
            this.monthlyOrders = months;
            //console.log(this.monthlyOrders);
            this.drawTheDiagram();
        },
        drawTheDiagram() {
            // Drawing The Chart
            sellingChart.data.datasets[0].data = this.monthlyOrders;
            var ctx = document.getElementById("myChart").getContext("2d");
            var myChart = new Chart(ctx, this.sellingChart);
        }
    },
    mounted() {
        this.getWaitingOrders();
        this.getComments();
        this.getMonthlyOrders();
    }
};
</script>

<style scoped></style>
