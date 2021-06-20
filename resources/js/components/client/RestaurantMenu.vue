<template>
    <div>
        <div class="w-full h-64">
            <img
                class="w-full h-full object-cover"
                alt=""
                v-if="images.length > 0"
                :src="images[currentImgId]"
            />
            <img
                class="w-full h-full object-cover"
                :src="
                    require('../../../../public/images/slider-img.jpg').default
                "
                alt=""
                v-else
            />
        </div>
        <div
            class="ml-auto w-36  h-7  bg-gray-300 flex justify-evenly items-center"
        >
            <div class="cursor-pointer" @click="previousImg">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6 text-yellow-400"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M15 19l-7-7 7-7"
                    />
                </svg>
            </div>
            <div class="cursor-pointer" @click="nextImg">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6 text-yellow-400"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 5l7 7-7 7"
                    />
                </svg>
            </div>
        </div>
        <!-- BASKET -->
        <div class=" container ">
            <div
                class="w-full h-auto text-md p-2 rounded justify-center items-center md:flex"
            >
                You have items in your
                <router-link
                    :to="{ name: 'cart' }"
                    class="text-primarycolor mx-2"
                    style="text-decoration:none"
                >
                    CART!
                </router-link>
                Click button to Order!
                <router-link
                    class="border-2 border-yellow-500 ml-2 rounded px-4 py-1 bg-yellow-300  hover:bg-yellow-500 flex cursor-pointer w-48 md:w-auto text-sm"
                    :to="{ name: 'payment' }"
                    style="text-decoration:none"
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
                            d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"
                        />
                    </svg>
                    Go To Payment
                </router-link>
            </div>
        </div>
        <!-- CONTENT -->
        <div class="cotainer  h-full  my-16 p-1 sm:p-5  rounded ">
            <h2 class="text-gray-900 font-bold text-2xl text-center">
                Most Popular Meals Of The Restaurant
            </h2>
            <div
                class="container border-2 my-4 border-primarycolor p-3 sm:flex "
                v-for="menu in menus"
                :key="menu.id"
            >
                <div class="relative w-full sm:w-64 ">
                    <img
                        class="w-full   object-cover rounded h-44"
                        alt=""
                        v-if="menu.image"
                        :src="menu.image"
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
                </div>
                <div class="w-3/6 p-3 tracking-wide ">
                    <h3 class="text-2xl cursor-pointer hover:text-yellow-400">
                        {{ menu.name }}
                    </h3>
                    <p class="text-md cursor-pointer">{{ menu.description }}</p>
                    <p class="text-md cursor-pointer">{{ menu.ingredient }}</p>
                    <p class="text-md cursor-pointer">
                        <i>Cal: </i>{{ menu.cal }}
                    </p>
                </div>
                <div
                    class="md:w-2/6 flex items-center justify-center font-bold m-1 w-full"
                >
                    <button
                        class="border-2 border-primarycolor py-2 px-4 rounded-lg hover:bg-yellow-300  hover:text-gray-100 flex"
                        @click="addItem(menu.id)"
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
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                            />
                        </svg>
                        Add To Cart
                    </button>
                </div>
            </div>
                       <div
                class="w-full bg-red-500 px-5 p-4 rounded h-48 my-8"
                v-if="menus.length < 1 "
            >
                <p class="text-lg">There is no Menus found...</p>
                <p>
                   This restaurant has not any menus. Please go and order from other restaurants using the home page.
                </p>
            </div>
        </div>
    </div>
</template>
<script>
import { ToastSuccess, ToastError } from "../../toasters";
import axios from "axios";
export default {
    data() {
        return {
            currentImgId: 0,
            images: [],
            menus: [],
            token: null,
            restaurantId:null
        };
    },
    mounted() {
        this.restaurantId = this.$route.params.id;
        this.token = this.$store.getters.getToken;
        this.getSliderImages();
        // console.log(token);
        axios
            .get("http://localhost:8000/api/menu/" + this.restaurantId, {
                headers: {
                    Accept: "application/json",
                    Authorization: "Bearer " + this.token
                }
            })
            .then(response => {
                this.menus = response.data.data;
            });
    },
    methods: {
        nextImg() {
            if (this.currentImgId == this.images.length - 1) {
                this.currentImgId = 0;
            } else {
                this.currentImgId++;
            }
        },
        previousImg() {
            if (this.currentImgId == 0) {
                this.currentImgId = this.images.length - 1;
            } else {
                this.currentImgId--;
            }
        },
        addItem(menuId) {
            axios
                .get("http://localhost:8000/api/cart/" + menuId, {
                    headers: {
                        Accept: "application/json",
                        Authorization: "Bearer " + this.token
                    }
                })
                .then(response => {
                    ToastSuccess.fire({
                        icon: "success",
                        title: response.data
                    });
                })
                .catch(error => {
                    ToastError.fire({
                        icon: "error",
                        title: error.response.data
                    });
                });
        },
        getSliderImages(){
             axios
                .get("http://localhost:8000/api/sliders/" + this.restaurantId, {
                    headers: {
                        Accept: "application/json",
                        Authorization: "Bearer " + this.token
                    }
                })
                .then(response => {
                    let imageData = response.data.data;
                    imageData.forEach(element => {
                            this.images.push(element.image)
                    });

                });

        }
    }
};
</script>
<style scoped></style>
