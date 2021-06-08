<template>
    <div>
        <h2 class="text-lg px-2 mt-3">Restaurant Details</h2>
        <hr />
        <div class=" my-2 md:p-3 grid grid-cols-2 gap-4 ">
            <div>
                <label for="">Restaurant Name: </label>
                <span class="font-extrabold text-gray-900 text-opacity-50">{{
                    restaurant.name
                }}</span>
            </div>
            <div>
                <label for="">Points: </label>
                <span class="font-extrabold text-gray-900 text-opacity-50"
                    >10 Duzelt!!!!</span
                >
            </div>
            <div class="col-span-2">
                <label for="">Description: </label>
                <span class="font-extrabold text-gray-900 text-opacity-50 ">
                    {{ restaurant.description }}</span
                >
            </div>
            <div>
                <label for="">Chef: </label>
                <span class="font-extrabold text-gray-900 text-opacity-50">{{
                    restaurant.chef
                }}</span>
            </div>
            <div>
                <label for="">Country: </label>
                <span class="font-extrabold text-gray-900 text-opacity-50">{{
                    restaurant.country
                }}</span>
            </div>
            <div>
                <label for="">City: </label>
                <span class="font-extrabold text-gray-900 text-opacity-50">{{
                    restaurant.city
                }}</span>
            </div>
            <div>
                <label for="">District: </label>
                <span class="font-extrabold text-gray-900 text-opacity-50">{{
                    restaurant.district
                }}</span>
            </div>
            <div>
                <label for="">Phone: </label>
                <span class="font-extrabold text-gray-900 text-opacity-50">{{
                    restaurant.restaurant_owner.phone
                }}</span>
            </div>
        </div>
        <div
            class="md:m-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4"
        >
            <div>
                <small>Slider1</small>
                <img
                    width="350"
                    height="100"
                    :src="
                        require('../../../../public/images/slider-img.jpg')
                            .default
                    "
                    alt=""
                />
            </div>
            <div>
                <small>Slider2</small>
                <img
                    width="350"
                    height="100"
                    :src="
                        require('../../../../public/images/slider-img.jpg')
                            .default
                    "
                    alt=""
                />
            </div>
            <div>
                <small>Slider3</small>
                <img
                    width="350"
                    height="100"
                    :src="
                        require('../../../../public/images/slider-img.jpg')
                            .default
                    "
                    alt=""
                />
            </div>
        </div>

        <h2 class="text-lg px-2 mt-5">Owner Of The Restaurant</h2>
        <hr />
        <div class=" my-2 md:p-3 grid grid-cols-1 lg:grid-cols-2 gap-4">
            <div>
                <label for="">Full Name: </label>
                <span class="font-extrabold text-gray-900 text-opacity-50"
                    >{{ restaurant.restaurant_owner.user.name }}
                    {{ restaurant.restaurant_owner.user.surname }}</span
                >
            </div>
            <div>
                <label for="">Mail Address: </label>
                <span class="font-extrabold text-gray-900 text-opacity-50">{{
                    restaurant.restaurant_owner.user.mail
                }}</span>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";
export default {
    data() {
        return {
            restaurant: {
                restaurant_owner: {
                    user: {}
                }
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
        }
    }
};
</script>
