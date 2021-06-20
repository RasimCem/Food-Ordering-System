<template>
    <div>
        <h2 class="text-lg mt-3">Assign Restaurant Owner</h2>
        <hr />
        <div class=" my-2 md:p-3 overflow-x-auto ">
            <div
                class="w-full h-auto bg-red-500 px-5 py-2 rounded"
                v-if="errors.length > 0"
            >
                <p v-for="error in errors" :key="error[0]">{{ error[0] }}</p>
            </div>
            <form class=" p-1 text-sm grid md:grid-cols-2 gap-4">
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">Name</label>
                    <input class="input py-1" type="text" v-model="user.name" />
                </div>
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">Surname</label>
                    <input
                        class="input py-1"
                        type="text"
                        v-model="user.surname"
                    />
                </div>
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">Mail</label>
                    <input class="input py-1" type="mail" v-model="user.mail" />
                </div>
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">Password</label>
                    <div class="flex">
                        <input
                            class="input py-1"
                            type="password"
                            v-model="user.password"
                        />
                        <button
                            class="button p-1 mx-1"
                            @click="generateRandomPassword"
                        >
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
                </div>
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">Phone</label>
                    <input
                        class="input py-1"
                        type="number"
                        v-model="user.phone"
                    />
                </div>
            </form>
            <button
                class="button mt-2 text-xs md:text-base w-36"
                @click="createOwner"
            >
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
            user: {
                name: null,
                surname: null,
                mail: null,
                password: null,
                phone: null
            },
            restaurantId: null,
            errors: []
        };
    },
    mounted() {
        this.restaurantId = this.$route.params.id;
    },
    methods: {
        createOwner(e) {
            e.preventDefault();
            this.errors = [];
            axios
                .put(
                    "http://localhost:8000/api/restaurant-owner/" +
                        this.restaurantId,
                    this.user,
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
                })
                .catch(error => {
                    this.errors = error.response.data.errors;

                    this.errors = Object.values(this.errors);
                });
        },
        generateRandomPassword(e) {
            e.preventDefault();
            let r = Math.random().toString(36).substring(2);
            console.log( r);
            this.user.password = r;
        }
    }
};
</script>
