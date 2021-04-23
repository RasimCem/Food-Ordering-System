<template>
    <div class="container mx-auto sm:p-5 mt-10">
        <h1 class="text-2xl mb-1 ml-2">Payment</h1>
        <hr />
        <div class="w-full p-2">
            <div class="mt-2 text-base font-medium flex">
                <div class="w-full md:w-1/2">
                    <div class="w-full my-3">
                        <label for="" class="block mb-0">Name</label>
                        <input
                            class="input"
                            type="text"
                        />
                    </div>

                    <div class="w-full my-3">
                        <label for="" class="block mb-0">Card Number</label>
                        <input
                            class="input"
                            type="text"
                        />
                    </div>
                    <div class="w-1/2 my-3">
                        <label for="" class="block mb-0"
                            >Expiration Date(mm/yy)</label
                        >
                        <input
                            class="input"
                            type="text"
                        />
                    </div>
                    <div class="w-1/2 my-3">
                        <label for="" class="block mb-0">Security Code</label>
                        <input
                            class="input"
                            type="text"
                        />
                    </div>
                    <div class="my-8 text-base font-medium">
                        <button
                            class="button"
                        >
                            Confirm
                        </button>
                    </div>
                    <small class="text-sm my-1"
                        >You can track your orders status from the "Order
                        History" page.
                    </small>
                </div>

                <div class=" hidden md:block w-1/3 p-5 text-center">
                    <img
                        :src="
                            require('../../../../public/images/lock.svg').default
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
                <tr>
                    <td class="border-2 border-gray-600 p-2">Hambuger</td>
                    <td class="border-2 border-gray-600 p-2">x3</td>
                    <td class="border-2 border-gray-600 p-2">15$</td>
                    <td class="border-2 border-gray-600 p-2 pl-3">
                        <a href="" class="hover:text-red-500 ">
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
                        45$
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {};
</script>

<style scoped></style>
