<template>
    <div>
        <h2 class="text-lg mt-3">Edit Restaurant</h2>
        <hr />
        <div class=" my-2 md:p-3 overflow-x-auto ">
            <form class=" p-1 text-sm grid md:grid-cols-2 gap-4">
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">Restaurant Name</label>
                    <input
                        class="input py-1"
                        type="text"
                        v-model="restaurant.name"
                    />
                </div>
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">Points</label>
                    <input class="input py-1" type="text" disabled />
                </div>

                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">Chef</label>
                    <input
                        class="input py-1"
                        type="text"
                        v-model="restaurant.chef"
                    />
                </div>
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0"
                        >Restaurant Description</label
                    >
                    <textarea
                        class="input py-1"
                        v-model="restaurant.description"
                    ></textarea>
                </div>
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">Country</label>
                    <input
                        class="input py-1"
                        type="text"
                        v-model="restaurant.country"
                    />
                </div>
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">City</label>
                    <input
                        class="input py-1"
                        type="text"
                        v-model="restaurant.city"
                    />
                </div>
            </form>
            <button
                class="button mt-2 text-xs md:text-base w-36"
                @click="updateRestaurant(restaurant.id)"
            >
                Update
            </button>
        </div>
        <!-- <h2 class="text-lg mt-3">Edit Owner</h2>
        <hr />
        <div class=" my-2 md:p-3 overflow-x-auto ">
            <form class=" p-1 text-sm grid md:grid-cols-2 gap-4">
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">Name</label>
                    <input class="input py-1" type="text" />
                </div>
                     <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">Surname</label>
                    <input class="input py-1" type="text" />
                </div>
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">Phone Number</label>
                   <input class="input py-1" type="text" />
                </div>
            </form>
            <button class="button mt-2 text-xs md:text-base w-36">
                Update
            </button>
        </div> -->
    </div>
</template>

<script>
import { ToastSuccess } from "../../toasters";
import axios from "axios";
export default {
    data() {
        return {
            restaurant: {
                name: null,
                description: null,
                chef: null,
                country: null,
                city: null,
                district: null
            }
        };
    },
    mounted() {
        this.getRestaurantDetails();
    },
    methods: {
        getRestaurantDetails() {
            const restaurantId = this.$route.params.id;
            axios
                .get(
                    "http://localhost:8000/api/restaurant/show/" + restaurantId,
                    {
                        headers: {
                            Accept: "application/json",
                            Authorization:
                                "Bearer " + this.$store.getters.getToken
                        }
                    }
                )
                .then(response => {
                    this.restaurant = response.data.data;
                });
        },
        updateRestaurant(restaurantId) {
            axios
                .post(
                    "http://localhost:8000/api/restaurant/update/" + restaurantId,
                    this.restaurant,
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
                    this.$router.push({ name: "panel-admin-restaurants" });
                });
        }
    }
};
</script>
