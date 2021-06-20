<template>
    <div>
        <h2 class="text-lg px-2 mt-3">Previous Orders</h2>
        <hr />
        <div class=" my-2 md:p-3 ">
            <div class="overflow-x-auto">
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
                                Address
                            </th>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Date
                            </th>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Time
                            </th>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Order
                            </th>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Status
                            </th>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Total Price
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-xs">
                        <tr v-for="order in orders" :key="order.id">
                            <td
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                               {{order.user.name}} {{order.user.surname}}
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                              {{order.user.customer.address_description}}
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                {{order.created_at.substring(0,10)}}
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                {{order.created_at.substring(11,16)}}
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                {{order.content}}
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-red-500 text-center"
                            >
                                {{order.status}}
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-primarycolor text-center"
                            >
                              {{order.total_price}} $
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";
export default {
    data() {
        return{
            orders:null
        }
    },
    methods:{
        getMyOrderHistory(){
              axios
                .get("http://localhost:8000/api/orders/my-restaurant",{
                    headers: {
                        Accept: "application/json",
                        Authorization: "Bearer " + this.$store.getters.getToken
                    }
                })
                .then(response => {
                    console.log(response.data);
                    this.orders=response.data;
                });
        }
    },
    mounted(){
        this.getMyOrderHistory();
    }
}
</script>
