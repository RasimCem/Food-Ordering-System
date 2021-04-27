<template>
    <div>
        <h2 class="text-lg px-2 mt-3">Menu</h2>
        <hr />
        <div class=" my-2 md:p-3 ">
            <div class="overflow-x-auto">
                <table class="content-table m-0 my-1 ">
                    <thead class="bg-yellow-400 text-xs">
                        <tr>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Image
                            </th>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Name
                            </th>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Ingredients
                            </th>

                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Chef
                            </th>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Price
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
                                <img
                                    class=" object-contain mx-auto h-20 rounded"
                                    :src="
                                        require('../../../../public/images/hamburger.jpg')
                                            .default
                                    "
                                    alt=""
                                />
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Hamburger
                            </td>

                            <td
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Pickle, beef, onion
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                RasimCem
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-red-500 text-center"
                            >
                                75 $
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                <button
                                    class="button bg-green-300 hover:bg-green-500 m-1"
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
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
                                        />
                                    </svg>
                                </button>
                                <button
                                    class="button bg-red-500 hover:bg-red-600 m-1"
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
export default {};
</script>
