<template>
    <div
        class="absolute z-5  top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 container shadow-inner"
    >
        <div
            class=" bg-gray-50 border-2 border-primarycolor rounded-lg w-1/1 sm:w-3/4 lg:w-1/2 xl:w-1/3 m-auto  relative"
        >
            <div class=" py-2 px-4">
                <div
                    class="flex items-center  w-full cursor-pointer justify-center"
                >
                    <img
                        :src="
                            require('../../../../public/images/icon.svg')
                                .default
                        "
                        class="w-8"
                        alt="icon"
                    />
                    <span
                        class="ml-3 text-gray-900 block text-sm sm:text-lg font-bold text-center"
                        >FOOD ORDERING SYSTEM</span
                    >
                </div>
                <div
                    class="absolute top-1 right-1 cursor-pointer hover:text-yellow-400"
                    @click="closeModal"
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
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>
                </div>
                <div class=" text-lg text-center my-2 ">
                    <a
                        class="cursor-pointer hover:text-yellow-400 "
                        style="text-decoration:none"
                        :class="{ 'text-yellow-400': !activeWindow }"
                        @click="activeWindow = false"
                        >Login</a
                    >
                    <span>|</span>
                    <a
                        class="cursor-pointer hover:text-yellow-400 "
                        style="text-decoration:none"
                        :class="{ 'text-yellow-400': activeWindow }"
                        @click="activeWindow = true"
                        >Register</a
                    >
                </div>

                <div v-show="!activeWindow" class="">
                    <h2 class="text-center text-xl font-semibold mt-2">
                        Welcome Back!
                    </h2>
                    <div
                        class="w-full h-auto bg-red-500 px-5 py-2 rounded"
                        v-if="loginErrors != null"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6 float-right text-white"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944zM11 14a1 1 0 11-2 0 1 1 0 012 0zm0-7a1 1 0 10-2 0v3a1 1 0 102 0V7z"
                                clip-rule="evenodd"
                            />
                        </svg>
                        <ul v-for="error in loginErrors" :key="error[0]">
                            <li>{{ error[0] }}</li>
                        </ul>
                    </div>
                    <div
                        v-if="error"
                        class="w-full h-auto bg-red-500 px-5 py-2 rounded"
                    >
                        <p>{{ error }}</p>
                    </div>
                    <form action="">
                        <div class="mt-2 text-base font-medium">
                            <label for="" class="block mb-0">User Mail</label>
                            <input
                                class="input py-1"
                                type="mail"
                                v-model="user.mail"
                            />
                        </div>
                        <div class="mt-2 text-base font-medium">
                            <label for="" class="block mb-0">Password</label>
                            <input
                                class="input py-1"
                                type="password"
                                v-model="user.password"
                            />
                        </div>

                        <div class="my-4 text-base font-medium text-center">
                            <button
                                class="bg-yellow-400 hover:bg-yellow-500 text-white py-2 px-4 rounded"
                                @click="login"
                            >
                                Confirm
                            </button>
                        </div>
                    </form>
                </div>
                <div v-show="activeWindow">
                    <h2 class="text-center text-xl font-semibold mt-2">
                        Create An Account
                    </h2>
                    <div
                        class="w-full h-auto bg-red-500 px-5 py-2 rounded"
                        v-if="registrationErrors"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6  float-right text-white"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944zM11 14a1 1 0 11-2 0 1 1 0 012 0zm0-7a1 1 0 10-2 0v3a1 1 0 102 0V7z"
                                clip-rule="evenodd"
                            />
                        </svg>
                        <ul v-for="error in registrationErrors" :key="error[0]">
                            <li>{{ error[0] }}</li>
                        </ul>
                    </div>
                    <form action="" method="POST">
                        <div class="mt-2 text-base font-medium">
                            <label for="" class="block mb-0"
                                >Email Address*</label
                            >
                            <input
                                class="input py-1"
                                type="mail"
                                v-model="user.mail"
                            />
                        </div>
                        <div class="mt-2 text-base font-medium">
                            <label for="" class="block mb-0">Password*</label>
                            <input
                                class="input py-1"
                                type="password"
                                v-model="user.password"
                                autocomplete="on"
                            />
                            <small class="text-xs"
                                >Passwords Should Match</small
                            >
                        </div>
                        <div class="mt-2 text-base font-medium">
                            <label for="" class="block mb-0">Password*</label>
                            <input
                                class="input py-1"
                                type="password"
                                v-model="user.password2"
                                autocomplete="on"
                            />
                            <small class="text-xs"
                                >Passwords Should Match</small
                            >
                        </div>
                        <!-- <div class="mt-2 text-base font-medium">
                            <label for="" class="block mb-0"
                                >Phone Number*</label
                            >
                            <input
                                class="input py-1"
                                type="tel"
                                pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}"
                                required
                            />
                            <small class="text-xs"
                                >Valid Format: 123-456-78-91</small
                            >
                        </div> -->
                        <div class="flex justify-between">
                            <div class="mt-2 text-base font-medium">
                                <label for="" class="block mb-0">Name*</label>
                                <input
                                    class="input py-1"
                                    type="text"
                                    v-model="user.name"
                                />
                            </div>
                            <div class="mt-2 text-base font-medium ml-1">
                                <label for="" class="block mb-0"
                                    >Surname*</label
                                >
                                <input
                                    class="input py-1"
                                    type="text"
                                    v-model="user.surname"
                                />
                            </div>
                        </div>

                        <div class="my-4 text-base font-medium text-center">
                            <button
                                class="bg-yellow-400 hover:bg-yellow-500 text-white py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                                @click="register"
                            >
                                Confirm
                            </button>
                        </div>
                    </form>
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
            activeWindow: false,
            user: {
                name: null,
                surname: null,
                mail: null,
                password: null,
                password2: null
            },
            registrationErrors: null,
            loginErrors: null,
            accessToken: null,
            error: null
        };
    },
    methods: {
        closeModal() {
            this.$emit("closeModal");
        },
        register(e) {
            e.preventDefault();
            this.registrationErrors =null;
            axios
                .post("http://localhost:8000/api/register", this.user)
                .then(response => {
                    this.$emit("closeModal");
                    this.accessToken = response.data.access_token;
                    this.$store.commit("updateToken", this.accessToken);
                    // console.log(this.$store.getters.getToken);
                    //Toaster
                    ToastSuccess.fire({
                        icon: "success",
                        title: "Signed up successfully"
                    });
                })
                .catch(error => {
                    if (typeof error !== "undefined") {
                        this.registrationErrors = error.response.data.errors;
                        this.registrationErrors = Object.values(
                            this.registrationErrors
                        );
                    }
                });
        },
        login(e) {
            e.preventDefault();
            this.loginErrors =null;
            this.error = null;
            axios
                .post("http://localhost:8000/api/login", this.user)
                .then(response => {
                    this.$emit("closeModal");
                    this.accessToken = response.data.access_token;
                    this.$store.commit("updateToken", this.accessToken);
                    //Toaster
                    ToastSuccess.fire({
                        icon: "success",
                        title: "Signed in successfully"
                    });
                    this.$store.commit("updateRole", response.data.role);
                })
                .catch(error => {
                    if (error.response.status == 404) {
                        this.error = error.response.data.error;
                    }
                    this.loginErrors = error.response.data.errors;
                    this.loginErrors = Object.values(this.loginErrors);
                });
        }
    }
};
</script>
<style scoped></style>
