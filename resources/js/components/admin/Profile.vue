<template>
    <div>
        <h2 class="text-lg mt-3">Profile</h2>
        <hr />
        <div class=" my-2 md:p-3 overflow-x-auto ">
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
                    <label for="" class="block mb-0">Mail Address</label>
                    <input
                        disabled
                        class="input py-1"
                        type="text"
                        v-model="user.mail"
                    />
                </div>
            </form>
            <button
                class="button mt-2 text-xs md:text-base "
                @click="updateMyInformation"
            >
                Update
            </button>
        </div>
        <h2 class="text-lg mt-3">Update My Password</h2>
        <hr />
        <div class=" my-2 md:p-3 overflow-x-auto ">
            <form class=" p-1 text-sm grid md:grid-cols-2 gap-4">
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">Current Password</label>
                    <input
                        class="input py-1"
                        type="password"
                        v-model="password.oldPassword"
                    />
                </div>
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">New Password</label>
                    <input
                        class="input py-1"
                        type="password"
                        v-model="password.newPassword"
                    />
                </div>
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">New Password</label>
                    <input
                        class="input py-1"
                        type="password"
                        v-model="password.newPassword2"
                    />
                </div>
            </form>
            <button
                class="button mt-2 text-xs md:text-base "
                @click="updateMyPassword"
            >
                Update My Password
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
                mail: null
            },
            password: {
                oldPassword: null,
                newPassword: null,
                newPassword2: null
            }
        };
    },
    mounted() {
        this.getMyInformation();
    },
    methods: {
        getMyInformation() {
            axios
                .get("http://localhost:8000/api/my-information/admin", {
                    headers: {
                        Accept: "application/json",
                        Authorization: "Bearer " + this.$store.getters.getToken
                    }
                })
                .then(response => {
                    this.user = response.data;
                });
        },
        updateMyInformation() {
            axios
                .post(
                    "http://localhost:8000/api/my-information/admin/update",
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
                });
        },
        updateMyPassword() {
            axios
                .post(
                    "http://localhost:8000/api/my-password/update",
                    this.password,
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
                });
        }
    }
};
</script>
