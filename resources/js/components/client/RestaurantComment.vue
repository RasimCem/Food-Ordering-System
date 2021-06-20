<template>
    <div>
        <div class="w-full h-64">
            <img
                class="w-full h-full object-cover"
                alt=""
                :src="
                    require('../../../../public/images/' + images[currentImgId])
                        .default
                "
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
        <!-- CONTENT -->
        <div class="cotainer  h-full  my-16 p-1 sm:p-5  rounded ">
            <h2 class="text-gray-900 font-bold text-2xl text-center">
                Latest Comments
            </h2>
            <div class="container border-2 my-4 border-primarycolor p-3 ">
                <div
                    class="w-full bg-gray-100 m-2 p-2 flex"
                    v-for="comment in comments"
                    :key="comment.id"
                >
                    <span
                        class="text-primarycolor w-1/6 text-center m-auto font-black sm:text-lg"
                        >{{ comment.point }}</span
                    >
                    <div
                        class="text-right text-gray-800  w-5/6 overflow-auto text-sm"
                    >
                        <p>
                            {{ comment.user.name }} {{ comment.user.surname }}
                        </p>
                        <p class="font-black">
                            {{ comment.comment }}
                        </p>
                        <small v-if="comment.created_at">
                            {{ comment.created_at.substring(0, 10) }}
                            {{ comment.created_at.substring(11, 16) }}</small
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";
export default {
    data() {
        return {
            currentImgId: 0,
            images: ["slider-img.jpg", "hamburger.jpg", "icon.svg"],
            comments: null
        };
    },
    mounted() {
        this.getCommentsOfTheRestaurant();
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
        getCommentsOfTheRestaurant() {
            const restaurantId = this.$route.params.id;
            axios
                .get(
                    "http://localhost:8000/api/comment/restaurant/" +
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
                    this.comments = response.data.data;
                });
        }
    }
};
</script>
