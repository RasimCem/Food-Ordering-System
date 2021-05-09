<template>
    <div>
        <h2 class="text-lg px-2 mt-3">Orders</h2>
        <hr />
        <div class=" my-2 md:p-3 ">
            <div class="overflow-x-auto">
                <table class="content-table m-0 my-1 w-full">
                    <thead class="bg-yellow-400 text-xs">
                        <tr>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Order Id
                            </th>

                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                From
                            </th>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Restaurant
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
                                Operations
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-xs">
                        <tr>
                            <td
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                1
                            </td>

                            <td
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                RasimCem
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Zimbalazup Restorant
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-red-500 text-center"
                            >
                                12.01.2020
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-red-500 text-center"
                            >
                                16.32
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-center whitespace-nowrap"
                            >
                                <button
                                    class="button bg-green-500 hover:bg-green-400 m-1"
                                    @click="goToOrdersDetails"
                                >
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
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                        />
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
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
export default {
    methods:{
        goToOrdersDetails(){
               this.$router.push({ name: "panel-admin-orders-details" });
        }
    }
}
</script>
