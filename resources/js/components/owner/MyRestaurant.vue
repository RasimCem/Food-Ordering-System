<template>
    <div>
        <h2 class="text-lg mt-3">Restaurant Details</h2>
        <hr />
        <div class=" my-2 md:p-3 overflow-x-auto ">
            <form class=" p-1 text-sm grid md:grid-cols-2 gap-4">
                <div class=" font-medium">
                    <label for="" class="block mb-0 "
                        >Image (Click On The Image to Change)</label
                    >
                    <label for="restaurantImage" class="cursor-pointer">
                        <img
                            class="shadow-md rounded h-44 object-cover"
                            width="350"
                            height="100"
                            v-if="myRestaurantDetail.image"
                            :src="myRestaurantDetail.image"
                            alt=""
                        />
                        <img
                            class="shadow-md rounded h-44"
                            width="350"
                            height="100"
                            v-else
                            :src="
                                require('../../../../public/images/no-image.png')
                                    .default
                            "
                            alt=""
                        />
                    </label>
                    <input
                        type="file"
                        id="restaurantImage"
                        class="hidden"
                        @change="restaurantImageFileChanged"
                    />
                </div>
                <div class=" text-md  font-bold ">
                    <span for="">Average Point: </span>
                    <span class="text-yellow-500">{{ averagePoint }}</span>
                </div>
                <div class="mt-2 font-medium ">
                    <label for="" class="block mb-0">Name</label>
                    <input
                        class="input py-1"
                        type="mail"
                        v-model="myRestaurantDetail.name"
                    />
                </div>
                <div class="mt-2  font-medium ">
                    <label for="" class="block mb-0">Chef</label>
                    <input
                        class="input py-1"
                        type="mail"
                        v-model="myRestaurantDetail.chef"
                    />
                </div>
                <div class="mt-2 font-medium">
                    <label for="" class="block mb-0">Description</label>
                    <textarea
                        rows="4"
                        class="input py-1"
                        placeholder="max:50"
                        v-model="myRestaurantDetail.description"
                    ></textarea>
                </div>
                <div class="mt-2  font-medium ">
                    <label for="" class="block mb-0">Country</label>
                    <input
                        class="input py-1"
                        type="mail"
                        v-model="myRestaurantDetail.country"
                    />
                </div>
                <div class="mt-2  font-medium ">
                    <label for="" class="block mb-0">City</label>
                    <input
                        class="input py-1"
                        type="mail"
                        v-model="myRestaurantDetail.city"
                    />
                </div>
                <div class="mt-2  font-medium ">
                    <label for="" class="block mb-0">District</label>
                    <input
                        class="input py-1"
                        type="mail"
                        v-model="myRestaurantDetail.district"
                    />
                </div>
            </form>
            <button
                class="button mt-2 text-xs md:text-base w-36"
                @click="updateMyRestaurantDetails"
            >
                Update
            </button>
        </div>
        <h2 class="text-lg px-2 mt-3">Restaurant Sliders</h2>
        <hr />
        <div class=" my-2 md:p-3 overflow-x-auto ">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                <div v-for="(n, i) in 3" :key="i" class="m-3">
                    <small
                        >Slider {{ i + 1 }} (Click On The Image to Upload</small
                    >
                    <label :for="fileInputs[i]" class="block cursor-pointer ">
                        <img
                            class="shadow-md rounded h-44 object-cover"
                            v-if="sliders[i] && sliders[i].image"
                            width="350"
                            height="100"
                            :src="sliders[i].image"
                            alt=""
                        />
                        <img
                            class="shadow-md rounded h-44 object-cover"
                            v-else
                            width="350"
                            height="100"
                            :src="
                                require('../../../../public/images/no-image.png')
                                    .default
                            "
                            alt=""
                        />
                    </label>
                    <input
                        :id="fileInputs[i]"
                        class="hidden"
                        type="file"
                        @change="fileChanged"
                    />

                    <button
                        class="button mt-2 text-xs md:text-base"
                        @click="saveImageChanges(sliders[i].id, $event)"
                    >
                        Update
                    </button>
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
            fileInputs: ["fileInput1", "fileInput2", "fileInput3"],
            sliders: [],
            slider1: {
                image: null
            },
            slider2: {
                image: null
            },
            slider3: {
                image: null
            },
            myRestaurantDetail: {
                name: null,
                chef: null,
                description: null,
                country: null,
                city: null,
                district: null,
                image: null
            },
            token: null,
            file: null,
            restaurantImageFile: null,
            averagePoint: null
        };
    },
    mounted() {
        this.getMyRestaurantDetails();
    },
    methods: {
        restaurantImageFileChanged(e) {
            this.restaurantImageFile = e.target.files[0];
            let reader = new FileReader();
            reader.onloadend = file => {
                this.myRestaurantDetail.image = reader.result;
            };
            reader.readAsDataURL(this.restaurantImageFile);
            e.target.value = "";
        },
        fileChanged(e) {
            this.file = e.target.files[0];
            let reader = new FileReader();
            reader.onloadend = file => {
                switch (e.target.id) {
                    case "fileInput1":
                        this.sliders[0].image = reader.result;
                        break;
                    case "fileInput2":
                        this.sliders[1].image = reader.result;
                        break;
                    case "fileInput3":
                        this.sliders[2].image = reader.result;
                        break;
                }
            };
            reader.readAsDataURL(this.file);
            e.target.value = "";
        },
        getMyRestaurantDetails() {
            this.token = this.$store.getters.getToken;
            axios
                .get("http://localhost:8000/api/my-restaurant/details", {
                    headers: {
                        Accept: "application/json",
                        Authorization: "Bearer " + this.token
                    }
                })
                .then(response => {
                    this.myRestaurantDetail = response.data;
                    this.getMyRestaurantSliders(this.myRestaurantDetail.id);
                    this.getAveragePointOfTheRestaurant(this.myRestaurantDetail.id);
                });
        },
        updateMyRestaurantDetails() {
            let formData = new FormData();
            formData.append("name", this.myRestaurantDetail.name);
            formData.append("description", this.myRestaurantDetail.description);
            formData.append("chef", this.myRestaurantDetail.chef);
            formData.append("country", this.myRestaurantDetail.country);
            formData.append("city", this.myRestaurantDetail.city);
            formData.append("district", this.myRestaurantDetail.district);
            formData.append("restaurantImage", this.restaurantImageFile);
            axios
                .post(
                    "http://localhost:8000/api/my-restaurant/update",
                    formData,
                    {
                        headers: {
                            Accept: "application/json",
                            Authorization: "Bearer " + this.token,
                            "Content-Type": "multipart/form-data"
                        }
                    }
                )
                .then(response => {
                    ToastSuccess.fire({
                        icon: "success",
                        title: response.data
                    });
                });
        },
        getMyRestaurantSliders(restaurantId) {
            axios
                .get("http://localhost:8000/api/sliders/" + restaurantId, {
                    headers: {
                        Accept: "application/json",
                        Authorization: "Bearer " + this.token
                    }
                })
                .then(response => {
                    this.sliders = response.data.data;
                    if (typeof this.sliders[0] == "undefined") {
                        this.sliders[0] = this.slider1;
                    }
                    if (typeof this.sliders[1] == "undefined") {
                        this.sliders[1] = this.slider2;
                    }
                    if (typeof this.sliders[2] == "undefined") {
                        this.sliders[2] = this.slider3;
                    }
                });
        },
        saveImageChanges(sliderId, event) {
            let formData = new FormData();
            formData.append("image", this.file);
            if (typeof sliderId != "undefined") {
                //updating existing slider
                axios
                    .post(
                        "http://localhost:8000/api/my-slider/update/" +
                            sliderId +
                            "?_method=PUT",
                        formData,
                        {
                            headers: {
                                Accept: "application/json",
                                Authorization: "Bearer " + this.token,
                                "Content-Type": "multipart/form-data"
                            }
                        }
                    )
                    .then(response => {
                        ToastSuccess.fire({
                            icon: "success",
                            title: "Slider Updated"
                        });
                        this.getMyRestaurantSliders(this.myRestaurantDetail.id);
                    });
            } else {
                //creating a new slider

                axios
                    .post(
                        "http://localhost:8000/api/my-slider/upload",
                        formData,
                        {
                            headers: {
                                Accept: "application/json",
                                Authorization: "Bearer " + this.token,
                                "Content-Type": "multipart/form-data"
                            }
                        }
                    )
                    .then(response => {
                        ToastSuccess.fire({
                            icon: "success",
                            title: "Slider Uploaded"
                        });
                        this.getMyRestaurantSliders(this.myRestaurantDetail.id);
                    });
            }
        },
        getAveragePointOfTheRestaurant(id) {
            axios
                .get(
                    "http://localhost:8000/api/comment/average-point/" +
                       id,
                    {
                        headers: {
                            Accept: "application/json",
                            Authorization: "Bearer " + this.token
                        }
                    }
                )
                .then(response => {
                    this.averagePoint = response.data;
                });
        }
    }
};
</script>
