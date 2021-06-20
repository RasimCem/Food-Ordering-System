<template>
    <div>
        <h2 class="text-lg px-2 mt-3">Customers</h2>
        <hr />
        <div class=" my-2 md:p-3 ">
            <div class="overflow-y-auto">
                <table class="content-table m-0 w-full ">
                    <thead class="bg-yellow-400 text-xs my-2">
                        <tr>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                #Id
                            </th>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Mail Address
                            </th>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Full Name
                            </th>

                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Phone Number
                            </th>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                City
                            </th>

                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Operations
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-xs">
                        <tr v-for="client in clients" :key="client.id">
                            <td
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                {{ client.id }}
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                {{ client.mail }}
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                {{ client.name }} {{ client.surname }}
                            </td>

                            <td
                                class="border-2 border-gray-600 p-2 text-center"
                                v-if="client.customer"
                            >
                                {{ client.customer.phone }}
                            </td>
                            <td
                                v-else
                                class="border-2 border-gray-600 p-2 text-primarycolor text-center"
                            >
                                -
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-red-500 text-center"
                                v-if="client.customer"
                            >
                                {{ client.customer.city }}
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-primarycolor text-center"
                                v-else
                            >
                                -
                            </td>

                            <td
                                class=" p-2 text-center whitespace-nowrap border-2 border-gray-600"
                            >
                                <button
                                    class="button bg-blue-500 hover:bg-blue-400 m-1 group relative"
                                    @click="updateCustomer(client.id)"
                                >
                                     <span class='opacity-0 group-hover:opacity-100 z-50 rounded shadow-lg p-1 bg-gray-800 text-gray-50 absolute right-5 top-5'>Edit Clients</span>
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
                                        />
                                    </svg>

                                </button>

                                <button
                                    class="button bg-red-500 hover:bg-red-400 m-1 group relative"
                                    @click="deleteCustomer(client.id)"
                                >
                                   <span class='opacity-0 group-hover:opacity-100 z-50 rounded shadow-lg p-1 bg-gray-800 text-gray-50 absolute right-5 top-5'>Delete Client</span>
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                        />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
import { ToastSuccess } from "../../toasters";
import axios from "axios";
export default {
    data() {
        return {
            clients: null
        };
    },
    methods: {
        getAllClients() {
            axios
                .get("http://localhost:8000/api/customers", {
                    headers: {
                        Accept: "application/json",
                        Authorization: "Bearer " + this.$store.getters.getToken
                    }
                })
                .then(response => {
                    this.clients = response.data.data;
                });
        },
        updateCustomer(customerId) {
            this.$router.push({
                name: "panel-admin-edit-clients",
                params: { id: customerId }
            });
        },
        deleteCustomer(customerId) {
            axios
                .get(
                    "http://localhost:8000/api/customer-delete/" + customerId,
                    {
                        headers: {
                            Accept: "application/json",
                            Authorization:
                                "Bearer " + this.$store.getters.getToken
                        }
                    }
                )
                .then(response => {
                    ToastSuccess.fire({
                        icon: "success",
                        title: response.data
                    });
                    this.getAllClients();
                });
        }
    },
    mounted() {
        this.getAllClients();
    }
};
</script>
