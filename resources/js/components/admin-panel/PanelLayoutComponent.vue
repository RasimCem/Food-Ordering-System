<template>
    <div class="flex overflow-x-hidden h-full">
        <!-- Side Bar -->
        <div id="sidebar" class="w-auto  bg-gray-800 ">
            <div class="text-white float-right p-2 text-lg cursor-pointer">
                <svg
                    v-show="sideBarOpen"
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6 hover:text-yellow-400"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    @click="sideBarOperation"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"
                    />
                </svg>
                <svg
                    v-show="!sideBarOpen"
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6  hover:text-yellow-400"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    @click="sideBarOperation"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"
                    />
                </svg>
            </div>
            <div
                class="w-full text-center my-2  clear-right "
                v-show="sideBarOpen"
            >
                <h2 class="text-yellow-400 text-xl sm:text-2xl">Panel</h2>
            </div>
            <div class="w-full my-16 text-white text-lg px-3  h-screen ">
                <ul v-show="sideBarOpen">
                    <li
                        class="flex m-3 justify-left items-center cursor-pointer  relative hover:text-yellow-400 px-3 py-1 border-b-2  border-gray-500"
                    >
                        <div class="icon mr-3 ">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                                />
                            </svg>
                        </div>
                        <router-link
                            to="panel-home"
                            style="text-decoration:none"
                            class=" hover:text-yellow-400"
                            >Home</router-link
                        >
                    </li>
                    <li
                        class="flex m-3 whitespace-nowrap justify-left items-center cursor-pointer  relative hover:text-yellow-400  px-3 py-1 border-b-2 border-gray-500"
                    >
                        <div class="icon mr-3">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"
                                />
                            </svg>
                        </div>
                        <router-link
                            to="panel-my-restaurant"
                            style="text-decoration:none"
                            class=" hover:text-yellow-400"
                            >My Restaurant</router-link
                        >
                    </li>
                    <li
                        class="flex m-3 whitespace-nowrap justify-left items-center cursor-pointer  relative hover:text-yellow-400  px-3 py-1 border-b-2 border-gray-500"
                    >
                        <div class="icon mr-3">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                                />
                            </svg>
                        </div>
                        <router-link
                            to="panel-menu"
                            style="text-decoration:none"
                            class=" hover:text-yellow-400"
                            >Menu</router-link
                        >
                    </li>
                    <li
                        class="flex m-3 justify-left items-center cursor-pointer relative hover:text-yellow-400  px-3 py-1 border-b-2 border-gray-500"
                    >
                        <div class="icon mr-3">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"
                                />
                            </svg>
                        </div>
                        <a>Order History</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="w-full ">
            <header
                class="w-full  bg-gray-700 flex justify-end p-6 items-center"
            >
                <div class="">
                    <div
                        class="flex items-center px-5 w-2/3 sm:w-full cursor-pointer justify-center"
                    >
                        <img
                            :src="
                                require('../../../../public/images/icon.svg')
                                    .default
                            "
                            class="w-8"
                            alt="icon"
                        />
                        <span
                            class="ml-3 text-white block text-sm sm:text-lg font-bold text-center whitespace-nowrap"
                            >FOOD ORDERING SYSTEM</span
                        >
                    </div>
                </div>
            </header>
            <div class="w-11/12 p-1 md:p-4 md:m-5">
                <div class=" bg-white py-4 px-6 rounded-md">
                    <router-view></router-view>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            sideBarOpen: true
        };
    },
    methods: {
        sideBarOperation() {
            // const sidebar = document.querySelector("#sidebar");
            if (this.sideBarOpen == true) {
                this.sideBarOpen = false;
                // sidebar.classList.add("w-1/2");
            } else {
                this.sideBarOpen = true;
                // sidebar.classList.remove("w-1/2");
            }
        }
    },
    mounted() {
        this.$router.push("panel-home");
    }
};
</script>

<style scoped></style>
