<template>
    <div>
        <div class="container flex p-3 mt-5 ">
            <div>
                <h1 class="text-2xl ml-3">My Cart</h1>
                <hr />
                <table
                    class="border-collapse border-2 border-gray-800  m-3 text-center"
                >
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
                        <tr>
                            <td class="border-2 border-gray-600 p-2">
                                <img
                                    class=" object-contain  w-80 h-20 rounded"
                                    :src="
                                        require('../../../public/images/hamburger.jpg')
                                            .default
                                    "
                                    alt=""
                                />
                            </td>
                            <td class="border-2 border-gray-600 p-2">
                                Hambuger
                            </td>
                            <td class="border-2 border-gray-600 p-2">x3</td>
                            <td class="border-2 border-gray-600 p-2">15$</td>
                            <td class="border-2 border-gray-600 p-2 ">
                                <a href="" class="hover:text-red-500 ">
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

                            <td
                                class="border-2 border-gray-600 p-2 text-primarycolor"
                            >
                                45$
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class=" hidden md:block w-1/3 p-5 text-center">
                <img
                    :src="require('../../../public/images/cart.svg').default"
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
                <table
                    v-if="showOrderHistory"
                    class="border-collapse border-2 border-gray-800  m-3 text-center"
                >
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
                                Complain
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border-2 border-gray-600 p-2">
                                Zumbalamabambup
                            </td>
                            <td class="border-2 border-gray-600 p-2">
                                Hambuger, Kebap, Ayran
                            </td>
                            <td class="border-2 border-gray-600 p-2">153 $</td>
                            <td class="border-2 border-gray-600 p-2">
                                12/03/2020
                            </td>
                            <td class="border-2 border-gray-600 p-2">18:05</td>
                            <td class="border-2 border-gray-600 p-2 ">
                                <a
                                    href="#"
                                    class="hover:text-red-500 "
                                    @click="isComplainOpen = true"
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
                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                        />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </transition>
        </div>
        <!-- Complaint Modal -->
        <div
            class="absolute z-5  top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 container shadow-inner"
            v-show="isComplainOpen"
        >
            <div
                class=" bg-gray-50 border-2 border-primarycolor rounded-lg w-1/1 sm:w-3/4 lg:w-1/2 xl:w-1/3 m-auto  relative"
            >
                <div class=" py-2 px-4">
                    <div class="">
                        <div
                    class="absolute top-1 right-1 cursor-pointer hover:text-yellow-400"
                    @click="isComplainOpen=false"
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
                            Welcome Back!
                        </h2>
                        <form>
                                <div class="mt-2 text-base font-medium">
                                <label for="" class="block mb-0"
                                    >Title</label
                                >
                                <input
                                    class="w-full py-1 px-2 border-2 border-gray-900 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                                    type="text"
                                />
                            </div>
                            <div class="mt-2 text-base font-medium">
                                <label for="" class="block mb-0"
                                    >Description Of Your Complain</label
                                >
                                 <textarea
                                class="w-full py-1 px-2 border-2 border-gray-900 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                                type="text"
                            ></textarea>
                            </div>
                            <div class="my-4 text-base font-medium text-center">
                                <button
                                    class="bg-yellow-400 hover:bg-yellow-500 text-white py-2 px-4 rounded"
                                >
                                    Send
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="my-44"></div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            showOrderHistory: false,
            isComplainOpen: false
        };
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
