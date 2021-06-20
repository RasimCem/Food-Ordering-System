<template>
    <div>
        <h2 class="text-lg mt-3">Edit Meal</h2>
        <hr />
        <div class=" my-2 md:p-3 overflow-x-auto ">
            <form class=" p-1 text-sm grid md:grid-cols-2 gap-4">
                <div class="mt-1 font-medium md:col-span-2">
                    <label for="" class="block mb-0 "
                        >Image (Click On The Image to Change)</label
                    >
                    <label for="image" class="cursor-pointer">
                        <img
                            class="shadow-md  object-contain h-40 rounded"
                            v-if="menu.image"
                            width="350"
                            height="100"
                            :src="menu.image"
                            alt=""
                        />
                        <img
                            class="shadow-md rounded"
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
                        type="file"
                        id="image"
                        class="hidden"
                        @change="fileChanged"
                    />
                </div>
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">Name</label>
                    <input class="input py-1" type="text" v-model="menu.name" />
                </div>
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">Ingredients</label>
                    <input
                        class="input py-1"
                        type="text"
                        v-model="menu.ingredient"
                    />
                    <small
                        >Plese Add Items with comma (e.g onion, beef,
                        tomato...)</small
                    >
                </div>
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">Description</label>
                    <input
                        class="input py-1"
                        type="text"
                        v-model="menu.description"
                    />
                </div>
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">Price ($) </label>
                    <input
                        class="input py-1"
                        type="number"
                        v-model="menu.price"
                    />
                </div>
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">Cal </label>
                    <input
                        class="input py-1"
                        type="number"
                        v-model="menu.cal"
                    />
                </div>
            </form>
            <button
                class="button mt-2 text-xs md:text-base w-36"
                @click="updateMyMenu(menu.id)"
            >
                Update
            </button>
        </div>
    </div>
</template>
<script>
import axios from "axios";
import { ToastSuccess } from "../../toasters";
export default {
    data() {
        return {
            file: null,
            menu: {
                name: null,
                ingredient: null,
                description: null,
                price: null,
                cal: null,
                image: null
            }
        };
    },
    methods: {
        fileChanged(e) {
            this.file = e.target.files[0];
            let reader = new FileReader();
            reader.onloadend = file => {
                this.menu.image = reader.result;
            };
            reader.readAsDataURL(this.file);
            e.target.value = "";
        },
        getMenu() {
            const id = this.$route.params.id;
            axios
                .get("http://localhost:8000/api/my-menu/get/" + id, {
                    headers: {
                        Accept: "application/json",
                        Authorization: "Bearer " + this.$store.getters.getToken
                    }
                })
                .then(response => {
                    this.menu = response.data;
                });
        },
        updateMyMenu(menuId) {
            let formData = new FormData();
            formData.append("image", this.file);
            formData.append("name", this.menu.name);
            formData.append("ingredient", this.menu.ingredient);
            formData.append("description", this.menu.description);
            formData.append("price", this.menu.price);
            formData.append("cal", this.menu.cal);
            axios
                .post(
                    "http://localhost:8000/api/my-menu/update/" +
                        menuId +
                        "?_method=PUT",
                    formData,
                    {
                        headers: {
                            Accept: "application/json",
                            Authorization:
                                "Bearer " + this.$store.getters.getToken,
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
            this.$router.push({ name: "panel-menu" });
        }
    },
    mounted() {
        this.getMenu();
    }
};
</script>
