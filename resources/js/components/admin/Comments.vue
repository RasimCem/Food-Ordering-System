<template>
    <div>
        <h2 class="text-lg px-2 mt-3">All Comments</h2>
        <hr />
        <div class=" my-2 md:p-3 ">
            <div class="overflow-x-auto">
                <table class="content-table m-0 my-1 w-full">
                    <thead class="bg-yellow-400 text-xs">
                        <tr>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Comment Id
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
                                    class="button bg-red-500 hover:bg-red-400 m-1"
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
export default {
    methods: {
        goToOrdersDetails() {
            this.$router.push({ name: "panel-admin-orders-details" });
        }
    }
};
</script>
