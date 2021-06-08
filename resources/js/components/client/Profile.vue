<template>
    <div>
        <div class="container m-auto w-full h-auto  p-5 my-auto">
            <h1 class="text-2xl mb-1 ml-2">Personal Information</h1>
            <hr />
            <div class="w-full p-2">
                <div class="mt-2 font-medium flex">
                    <div class="w-full md:w-1/2">
                        <div class="w-full my-3">
                            <label for="" class="block mb-0"
                                >Mail Address</label
                            >
                            <input
                                class="input"
                                type="text"
                                v-model="user.mail"
                                disabled
                            />
                        </div>

                        <div class="w-full my-3">
                            <label for="" class="block mb-0">Name</label>
                            <input
                                class="input"
                                type="text"
                                v-model="user.name"
                            />
                        </div>
                        <div class="w-full my-3">
                            <label for="" class="block mb-0">Surname</label>
                            <input
                                class="input"
                                type="text"
                                v-model="user.surname"
                            />
                        </div>

                        <div class="my-2 text-base font-medium">
                            <button
                                class="button"
                                @click="updatePersonalInformation"
                            >
                                Update
                            </button>
                        </div>
                    </div>

                    <div class=" hidden md:block w-1 md:w-1/2 p-3 ">
                        <img
                            :src="
                                require('../../../../public/images/user.svg')
                                    .default
                            "
                            alt=""
                            class="w-64 float-right fill-current border-2 border-yellow-400 rounded-full pt-3"
                        />
                    </div>
                </div>
            </div>
            <h1 class="text-2xl mb-1 mt-3 ml-2">Contact</h1>
            <hr />
            <div class="w-full p-2">
                <div class="mt-2 font-medium flex">
                    <div class="w-full md:w-1/2">
                        <div class="w-full my-3">
                            <label for="" class="block mb-0"
                                >Phone Number</label
                            >
                            <input
                                class="input"
                                type="tel"
                                pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}"
                                required
                                v-model="userContact.phone"
                            />
                            <small class="text-xs"
                                >Valid Format: 123-456-78-91</small
                            >
                        </div>
                        <div class="w-full my-3">
                            <label for="" class="block mb-0">Country</label>
                            <input
                                class="input"
                                type="text"
                                v-model="userContact.country"
                            />
                        </div>
                        <div class="w-full my-3">
                            <label for="" class="block mb-0">City</label>
                            <input
                                class="input"
                                type="text"
                                v-model="userContact.city"
                            />
                        </div>
                        <div class="w-full my-3">
                            <label for="" class="block mb-0">Street</label>
                            <input
                                class="input"
                                type="text"
                                v-model="userContact.street"
                            />
                        </div>
                        <div class="w-full my-3">
                            <label for="" class="block mb-0">District</label>
                            <input
                                class="input"
                                type="text"
                                v-model="userContact.district"
                            />
                        </div>
                        <div class="w-full my-3">
                            <label for="" class="block mb-0"
                                >Detailed Address Description*</label
                            >
                            <textarea
                                rows="4"
                                class="input"
                                type="text"
                                v-model="userContact.address_description"
                            ></textarea>
                        </div>
                        <div class="my-2 text-base font-medium">
                            <button
                                class="button"
                                @click="updateMyContactInformation"
                            >
                                Update
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container p-5">
            <div class="w-full sm:w1/2 lg:w-1/3">
                <h1 class="text-2xl mb-1 ml-2">Password Update</h1>
                <hr />
                <div class="w-full px-2 my-3">
                    <label for="" class="block mb-0">Current Password*</label>
                    <input class="input" type="password" />
                </div>
                <div class="w-full my-3  px-2 ">
                    <label for="" class="block mb-0">Password*</label>
                    <input class="input" type="password" />
                    <small class="text-xs">Passwords Should Match</small>
                </div>
                <div class="w-full my-3  px-2 ">
                    <label for="" class="block mb-0">Password*</label>
                    <input class="input" type="password" />
                    <small class="text-xs">Passwords Should Match</small>
                </div>
                <div class="my-2 text-base font-medium  px-2 ">
                    <button class="button">
                        Update My Password
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
            user: {
                name: null,
                surname: null,
                mailAddress: null
            },
            userContact: {
                country: null,
                city: null,
                district: null,
                street: null,
                address_description: null,
                phone: null
            },
            token: null
        };
    },
    methods: {
        getMyProfile() {
            this.token = this.$store.getters.getToken;
            axios
                .get("http://localhost:8000/api/my-information", {
                    headers: {
                        Accept: "application/json",
                        Authorization: "Bearer " + this.token
                    }
                })
                .then(response => {
                    // console.log(response.data);
                    this.user.name = response.data.name;
                    this.user.surname = response.data.surname;
                    this.user.mail = response.data.mail;
                    if (response.data.contact) {
                        this.userContact.country =
                            response.data.contact.country;
                        this.userContact.city = response.data.contact.city;
                        this.userContact.district =
                            response.data.contact.district;
                        this.userContact.street = response.data.contact.street;
                        this.userContact.country =
                            response.data.contact.country;
                        this.userContact.address_description =
                            response.data.contact.address_description;
                        this.userContact.phone = response.data.contact.phone;
                    }
                });
        },
        updatePersonalInformation() {
            axios
                .post(
                    "http://localhost:8000/api/my-information/update",
                    this.user,
                    {
                        headers: {
                            Accept: "application/json",
                            Authorization: "Bearer " + this.token
                        }
                    }
                )
                .then(response => {
                    ToastSuccess.fire({
                        icon: "success",
                        title: response.data
                    });
                })
                .catch(error => {
                    console.log(error.response);
                });
        },
        updateMyContactInformation() {
            console.log(this.userContact);
            axios
                .post(
                    "http://localhost:8000/api/my-contact-information/update",
                    this.userContact,
                    {
                        headers: {
                            Accept: "application/json",
                            Authorization: "Bearer " + this.token
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
    },
    mounted() {
        this.getMyProfile();
    }
};
</script>
<style scoped></style>
