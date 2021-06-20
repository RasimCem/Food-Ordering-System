<template>
    <div>
        <div class="flex justify-between">
            <h2 class="text-lg px-2 mt-3">Restaurants</h2>

            <button
                class="button flex mb-1 mt-3 text-xs bg-green-500 hover:bg-green-400"
                @click="goToAddRestaurant"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4 mr-2"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                    />
                </svg>
                Add
            </button>
        </div>
        <hr />
        <div class=" my-2 md:p-3 ">
            <div class="overflow-x-auto">
                <table class="content-table m-0 my-1 w-full">
                    <thead class="bg-yellow-400 text-xs">
                        <tr>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                #Id
                            </th>

                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Restaurant Name
                            </th>

                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                City
                            </th>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Country
                            </th>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Operations
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-xs">
                        <tr
                            v-for="restaurant in restaurants"
                            :key="restaurant.id"
                        >
                            <td
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                {{ restaurant.id }}
                            </td>

                            <td
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                {{ restaurant.name }}
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-red-500 text-center"
                            >
                                {{ restaurant.city }}
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-red-500 text-center"
                            >
                                {{ restaurant.country }}
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-center whitespace-nowrap"
                            >
                                <button
                                    class="button bg-purple-500 hover:bg-purple-400 m-1 group relative"
                                    @click="goToMenu(restaurant.id)"
                                >
                                       <span class='opacity-0 group-hover:opacity-100 z-50 rounded shadow-lg p-1 bg-gray-800 text-gray-50 absolute  right-7 top-6'>Show Menus</span>
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
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                                        />
                                    </svg>
                                </button>
                                <button
                                @click="goToCreateOwner(restaurant.id,restaurant.restaurant_owner)"
                                    class="button bg-pink-500 hover:bg-pink-400 m-1 relative group"
                                >
                                   <span class='opacity-0 group-hover:opacity-100 z-50 rounded shadow-lg p-1 bg-gray-800 text-gray-50 absolute  right-7 top-6'>Create Owner</span>
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
                                            d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"
                                        />
                                    </svg>
                                </button>
                                <button
                                    class="button bg-yellow-500 hover:bg-yellow-400 m-1 relative group"
                                    @click="
                                        goToRestaurantDetails(restaurant.id)
                                    "
                                >
                                   <span class='opacity-0 group-hover:opacity-100 z-50 rounded shadow-lg p-1 bg-gray-800 text-gray-50 absolute  right-7 top-6'>Restaurant Details</span>
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
                                <button
                                    class="button bg-blue-500 hover:bg-blue-400 m-1 relative group"
                                    @click="goToEditRestaurant(restaurant.id)"
                                >
                                   <span class='opacity-0 group-hover:opacity-100 z-50 rounded shadow-lg p-1 bg-gray-800 text-gray-50 absolute  right-7 top-6'>Edit</span>
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
                                    class="button bg-red-500 hover:bg-red-400 m-1 relative group"
                                    @click="deleteRestaurant(restaurant.id)"
                                >
                                   <span class='opacity-0 group-hover:opacity-100 z-50 rounded shadow-lg p-1 bg-gray-800 text-gray-50 absolute right-7 top-6'>Delete</span>
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
import Swal from "sweetalert2";
import { ToastSuccess } from "../../toasters";
import axios from "axios";
export default {
    data() {
        return {
            restaurants: null
        };
    },
    methods: {
        goToAddMenu() {
            this.$router.push("panel-menu-add");
        },
        goToCreateOwner(restaurantId,owner){
            if(owner==null){
                 this.$router.push({name:"panel-admin-restaurant-assign-owner", params:{id:restaurantId}});
            }else{
                  Swal.fire({
                    text: "This restaurant already has an Owner!",
                    confirmButtonColor: 'orange',
                });
            }

        },
        goToRestaurantDetails(restaurantId) {
            this.$router.push({
                name: "panel-admin-restaurant-details",
                params: { id: restaurantId }
            });
        },
        goToMenu(restaurantId) {
            this.$router.push({
                name: "panel-admin-restaurant-menus",
                params: { id: restaurantId }
            });
        },
        goToEditRestaurant(restaurantId) {
            this.$router.push({
                name: "panel-admin-restaurant-edit",
                params: { id: restaurantId }
            });
        },
        goToAddRestaurant() {
            this.$router.push({ name: "panel-admin-restaurant-add" });
        },
        getAllRestaurants() {
            axios
                .get("http://localhost:8000/api/restaurants", {
                    headers: {
                        Accept: "application/json",
                        Authorization: "Bearer " + this.$store.getters.getToken
                    }
                })
                .then(response => {
                    this.restaurants = response.data.data;
                });
        },
        deleteRestaurant(restaurantId) {
            axios
                .get(
                    "http://localhost:8000/api/restaurant/delete/" +
                        restaurantId,
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
                    this.getAllRestaurants();
                });
        }
    },
    mounted() {
        this.getAllRestaurants();
    }
};
</script>
