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
                <h2 class="text-yellow-400 text-xl sm:text-2xl ">
                    Control Panel
                </h2>
            </div>
            <div class="w-full my-16 text-white text-lg px-3  h-screen ">
                <ul v-show="sideBarOpen">
                    <!-- Restaurant Owner  -->
                    <div v-if="role == 'restaurantOwner'">
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
                                :to="{ name: 'panel-home' }"
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
                                :to="{ name: 'panel-my-restaurant' }"
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
                                :to="{ name: 'panel-menu' }"
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
                            <router-link
                                :to="{ name: 'panel-order-history' }"
                                style="text-decoration:none"
                                class=" hover:text-yellow-400"
                                >Order History</router-link
                            >
                        </li>
                    </div>
                    <!-- Admin Panel -->
                    <div v-else-if="role=='admin'">
                        <li
                            class="flex m-3  justify-left items-center cursor-pointer  relative hover:text-yellow-400 px-3 py-1 border-b-2  border-gray-500"
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
                                :to="{ name: 'panel-admin-home' }"
                                style="text-decoration:none"
                                class=" hover:text-yellow-400"
                                >Home</router-link
                            >
                        </li>
                        <li
                            class="flex m-3  justify-left items-center cursor-pointer  relative hover:text-yellow-400 px-3 py-1 border-b-2  border-gray-500"
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
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
                                    />
                                </svg>
                            </div>
                            <router-link
                                :to="{ name: 'panel-admin-clients' }"
                                style="text-decoration:none"
                                class=" hover:text-yellow-400"
                                >Clients</router-link
                            >
                        </li>
                        <li
                            class="flex m-3  justify-left items-center cursor-pointer  relative hover:text-yellow-400 px-3 py-1 border-b-2  border-gray-500"
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
                                        d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"
                                    />
                                </svg>
                            </div>
                            <router-link
                                :to="{ name: 'panel-admin-restaurants' }"
                                style="text-decoration:none"
                                class=" hover:text-yellow-400 whitespace-nowrap"
                                >Restaurants</router-link
                            >
                        </li>
                        <li
                            class="flex m-3  justify-left items-center cursor-pointer  relative hover:text-yellow-400 px-3 py-1 border-b-2  border-gray-500"
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
                                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"
                                    />
                                </svg>
                            </div>
                            <router-link
                                :to="{ name: 'panel-admin-complaints' }"
                                style="text-decoration:none"
                                class=" hover:text-yellow-400"
                                >Complaints</router-link
                            >
                        </li>
                        <li
                            class="flex m-3  justify-left items-center cursor-pointer  relative hover:text-yellow-400 px-3 py-1 border-b-2  border-gray-500"
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
                                        d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"
                                    />
                                </svg>
                            </div>
                            <router-link
                                :to="{ name: 'panel-admin-orders' }"
                                style="text-decoration:none"
                                class=" hover:text-yellow-400"
                                >Orders</router-link
                            >
                        </li>
                        <li
                            class="flex m-3  justify-left items-center cursor-pointer  relative hover:text-yellow-400 px-3 py-1 border-b-2  border-gray-500"
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
                                        d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"
                                    />
                                </svg>
                            </div>
                            <router-link
                                :to="{ name: 'panel-admin-comments' }"
                                style="text-decoration:none"
                                class=" hover:text-yellow-400"
                                >Comments</router-link
                            >
                        </li>
                    </div>
                    <li
                        class="flex m-3  justify-left items-center cursor-pointer  relative hover:text-yellow-400 px-3 py-1 border-b-2  border-gray-500"
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
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                                />
                            </svg>
                        </div>
                        <a
                            style="text-decoration:none"
                            class=" hover:text-yellow-400"
                            @click="logOut"
                            >LogOut</a
                        >
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
                            class="ml-3 text-white block text-sm sm:text-md font-bold text-center whitespace-nowrap"
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
import { ToastSuccess } from "../../toasters";
import axios from "axios";
export default {
    data() {
        return {
            sideBarOpen: true,
            role:null
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
        },
        logOut(){
              axios
                .post(
                    "http://localhost:8000/api/logout",
                    {},
                    {
                        headers: {
                            Accept: "application/json",
                            Authorization: "Bearer " + this.$store.getters.getToken
                        }
                    }
                )
                .then(response => {
                    this.$store.commit("updateToken", null);
                    // console.log("logging Out successfull!");
                    ToastSuccess.fire({
                        icon: "success",
                        title: "Logged out successfully"
                    });
                       this.$store.commit("updateRole",null);
                });

        }
    },
    mounted() {
        this.role =   this.$store.getters.getRole;
        if (this.role == 'restaurantOwner') {
            this.$router.push({ name: "panel-home" });
        } else if(this.role == 'admin'){
            this.$router.push({ name: "panel-admin-home" });
        }else{
            this.logOut();
        }
    }
};
</script>

<style scoped></style>
