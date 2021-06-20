<template>
    <div class="w-full">
        <!-- SLIDER -->
        <div class="relative">
            <img
                class="w-full h-64 object-cover "
                :src="
                    require('../../../../public/images/slider-img.jpg').default
                "
                alt=""
            />
            <div
                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 "
            >
                <div
                    class=" bg-yellow-300 rounded-full h-11 mt-5 w-64 hover:shadow-2xl z-1 "
                >
                    <svg
                        class="h-10 w-10 float-left align-middle m-1"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"
                        />
                    </svg>
                    <input
                        type="text"
                        class="h-full w-52 pl-2 text-base focus:outline-none rounded-r shadow-lg  "
                        v-model="search"
                        placeholder="Search For Restaurants"
                    />
                </div>
            </div>
        </div>
        <!-- CONTENT -->
        <div class="cotainer  h-full  my-16 p-1 sm:p-5  rounded ">
            <h2 class="text-gray-900 font-bold text-2xl text-center">
                Restaurants Near To You
            </h2>
            <div v-if="filterOn">
                <div
                    v-for="restaurant in filteredRestaurants"
                    :key="restaurant.id"
                    class="container border-2 my-4 border-yellow-300 p-3 sm:flex "
                >
                    <div class="relative w-full sm:w-64">
                        <img
                            class="w-full  object-cover rounded  h-44"
                            alt=""
                            v-if="restaurant.image"
                            :src="restaurant.image"
                        />
                        <img
                            class="w-full  object-cover rounded  h-44"
                            alt=""
                            v-else
                            :src="
                                require('../../../../public/images/no-image.png')
                                    .default
                            "
                        />
                    </div>
                    <div class="w-3/6 p-3 tracking-wide ">
                        <h3
                            class="text-2xl cursor-pointer hover:text-yellow-400"
                            @click="giveAnOrder"
                        >
                            {{ restaurant.name }}
                        </h3>
                        <p class="text-md cursor-pointer">
                            {{ restaurant.description }}
                        </p>
                        <p class="text-md cursor-pointer">
                            <i>Chef: </i>{{ restaurant.chef }}
                        </p>
                        <small
                            @click="goToComments(restaurant.id)"
                            class="text-sm cursor-pointer hover:text-yellow-400"
                            >Go To Comments</small
                        >
                    </div>
                    <div
                        class="md:w-2/6 flex items-center justify-center font-bold m-1 w-full"
                    >
                        <button
                            class="border-2 border-yellow-400 py-2 px-4 rounded-lg hover:bg-yellow-300  hover:text-gray-100 flex"
                            @click="giveAnOrder"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 mr-2"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
                                />
                            </svg>
                            Order Now!
                        </button>
                    </div>
                </div>
            </div>
            <div v-else>
                <div
                    v-for="(restaurant, index) in restaurants"
                    :key="restaurant.id"
                    class="container border-2 my-4 border-yellow-300 p-3 sm:flex "
                >
                    <div class="relative w-full sm:w-64">
                        <img
                            class="w-full  object-cover rounded h-44"
                            alt=""
                            v-if="restaurant.image"
                            :src="restaurant.image"
                        />
                        <img
                            class="w-full  object-cover rounded  h-44 "
                            alt=""
                            v-else
                            :src="
                                require('../../../../public/images/no-image.png')
                                    .default
                            "
                        />
                        <div class=" p-1 absolute top-1 right-0">
                            <a
                                class="text bg-green-300 px-2 py-1 rounded-full hover:no-underline cursor-default hover:text-gray-100 m-1"
                                title="Average Point"
                                >{{ averagePoints[index] }}</a
                            >
                        </div>
                    </div>
                    <div class="w-3/6 p-3 tracking-wide ">
                        <h3
                            class="text-2xl cursor-pointer hover:text-yellow-400"
                            @click="giveAnOrder(restaurant.id)"
                        >
                            {{ restaurant.name }}
                        </h3>
                        <p class="text-md cursor-pointer">
                            {{ restaurant.description }}
                        </p>
                        <p class="text-md cursor-pointer">
                            <i>Chef: </i>{{ restaurant.chef }}
                        </p>
                        <small
                            class="text-sm cursor-pointer hover:text-yellow-400"
                            @click="goToComments(restaurant.id)"
                            >Go To Comments</small
                        >
                    </div>
                    <div
                        class="md:w-2/6 flex items-center justify-center font-bold m-1 w-full"
                    >
                        <button
                            class="border-2 border-yellow-400 py-2 px-4 rounded-lg hover:bg-yellow-300  hover:text-gray-100 flex"
                            @click="giveAnOrder(restaurant.id)"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 mr-2"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
                                />
                            </svg>
                            Order Now!
                        </button>
                    </div>
                </div>
            </div>
            <div
                class="w-full bg-red-500 px-5 p-4 rounded h-48 my-8"
                v-if="restaurants.length < 1 && !filterOn"
            >
                <p class="text-lg">
                    There is no restaurants in your location...
                </p>
                <p>
                    Please make sure you select correct location information.
                    Otherwise Food Ordering System in not active in your
                    location. We are very sorry about that. :((
                </p>
                <p>
                    We hope see you soon...
                </p>
            </div>
            <div
                class="w-full bg-red-500 px-5 p-4 rounded h-48 my-8"
                v-if="filteredRestaurants.length < 1 && filterOn"
            >
                <p class="text-lg">There is no restaurants found...</p>
                <p>
                    We couldn't find any restaurants according to your seacrhing
                    results...
                </p>
            </div>
        </div>
    </div>
</template>

<script>
import Swal from "sweetalert2";
import axios from "axios";
export default {
    data() {
        return {
            restaurants: [],
            search: null,
            filterOn: false,
            filteredRestaurants: [],
            averagePoints: []
        };
    },
    mounted() {
        //Get All Restaurants\
        axios.get("http://localhost:8000/api/restaurant").then(response => {
            this.restaurants = response.data.data;
            this.restaurants.forEach(restaurant => {
                axios
                    .get(
                        "http://localhost:8000/api/comment/average-point/" +
                            restaurant.id
                    )
                    .then(response => {
                        this.averagePoints.push(response.data);
                    });
            });
        });
    },
    methods: {
        giveAnOrder(restaurantId) {
            if (this.$store.getters.getToken != null) {
                this.$router.push({
                    name: "restaurant",
                    params: { id: restaurantId }
                });
            } else {
                Swal.fire({
                    text: "You have to login for give an order!",
                    confirmButtonColor: "orange"
                });
            }
        },
        goToComments(restaurantId) {
            if (this.$store.getters.getToken != null) {
                this.$router.push({
                    name: "restaurant-menu",
                    params: { id: restaurantId }
                });
            } else {
                Swal.fire({
                    text: "You have to login for display comments!",
                    confirmButtonColor: "orange"
                });
            }
        }
        // getAveragePoint() {
        //     axios.get("http://localhost:8000/api/comment/average-point"+restaurantId).then(response => {
        //         this.averagePoint = response.data;
        //     });
        // }
    },
    watch: {
        search: function(newValue) {
            if (newValue.length > 1) {
                this.filteredRestaurants = [];
                this.restaurants.forEach(restaurant => {
                    if (
                        restaurant.name
                            .toLowerCase()
                            .includes(newValue.toLowerCase())
                    ) {
                        this.filteredRestaurants.push(restaurant);
                    }
                });
                this.filterOn = true;
            } else {
                this.filterOn = false;
            }
        }
    }
};
</script>
