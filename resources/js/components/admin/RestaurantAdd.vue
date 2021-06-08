<template>
    <div>
        <h2 class="text-lg mt-3">Add New Restaurant</h2>
        <hr />
        <div class=" my-2 md:p-3 overflow-x-auto ">
            <form class=" p-1 text-sm grid md:grid-cols-2 gap-4">
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">Restaurant Name</label>
                    <input class="input py-1" type="text" v-model="restaurant.name"/>
                </div>
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0"
                        >Restaurant Description</label
                    >
                    <textarea class="input py-1" v-model="restaurant.description"></textarea>
                </div>
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">Chef</label>
                    <input class="input py-1" type="text" v-model="restaurant.chef" />
                </div>
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">Country</label>
                    <input class="input py-1" type="text" v-model="restaurant.country" />
                </div>
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">City</label>
                    <input class="input py-1" type="text" v-model="restaurant.city" />
                </div>
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">District</label>
                    <input class="input py-1" type="text" v-model="restaurant.district"/>
                </div>
                <!-- <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">Password</label>
                    <div class="flex">
                        <input class="input py-1" type="text" />
                        <button class="button p-1 mx-1">
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
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"
                                />
                            </svg>
                        </button>
                    </div>
                </div> -->
            </form>
            <button class="button mt-2 text-xs md:text-base w-36" @click="createRestaurant">
                Create
            </button>
        </div>
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
    methods:{
        createRestaurant(){
                axios
                .post("http://localhost:8000/api/restaurant",this.restaurant,{
                    headers: {
                        Accept: "application/json",
                        Authorization: "Bearer " + this.$store.getters.getToken
                    }
                })
                .then(response => {
                     ToastSuccess.fire({
                        icon: "success",
                        title:response.data
                    });
                });
                this.$router.push({name:"panel-admin-restaurants"});
        }
    }
};
</script>
