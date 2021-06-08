<template>
    <div>
        <h2 class="text-lg mt-3">Edit Client</h2>
        <hr />
        <div class=" my-2 md:p-3 overflow-x-auto ">
            <form class=" p-1 text-sm grid md:grid-cols-2 gap-4">
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">Name</label>
                    <input
                        class="input py-1"
                        type="text"
                        v-model="customer.name"
                    />
                </div>
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">Surname</label>
                    <input
                        class="input py-1"
                        type="text"
                        v-model="customer.surname"
                    />
                </div>
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">Mail Address</label>
                    <input
                        class="input py-1"
                        type="text"
                        v-model="customer.mail"
                        disabled
                    />
                </div>
            </form>
            <button
                class="button mt-2 text-xs md:text-base w-36"
                @click="updateCustomerPersonalInformation(customer.id)"
            >
                Update
            </button>
        </div>
        <div v-if="customer.customer">
     <h2 class="text-lg mt-3"  >Edit Contact Informations</h2>
        <hr />
        <div class=" my-2 md:p-3 overflow-x-auto ">
            <form class=" p-1 text-sm grid md:grid-cols-2 gap-4">
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">Phone Number</label>
                    <input
                        class="input py-1"
                        type="text"
                        v-model="customer.customer.phone"
                    />
                </div>
                       <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">Country</label>
                    <input
                        class="input py-1"
                        type="text"
                        v-model="customer.customer.country"
                    />
                </div>
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">City</label>
                    <input
                        class="input py-1"
                        type="text"
                        v-model="customer.customer.city"
                    />
                </div>
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">District</label>
                    <input
                        class="input py-1"
                        type="text"
                        v-model="customer.customer.district"
                    />
                </div>
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">Street</label>
                    <input
                        class="input py-1"
                        type="text"
                        v-model="customer.customer.street"
                    />
                </div>
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">Address Description</label>
                    <textarea
                        class="input py-1"
                        rows="3"
                        v-model="customer.customer.address_description"
                    ></textarea>
                </div>
            </form>
            <button
                class="button mt-2 text-xs md:text-base w-36"
                @click="updateCustomerContactInformation(customer.id)"
            >
                Update
            </button>
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
            customer: {
                name: null,
                surname: null,
                mail: null,
                customer: {
                    phone: null,
                    country:null,
                    city:null,
                    district:null,
                    street: null,
                    address_description:null
                }
            }
        };
    },
    mounted() {
        this.getCustomerInformation();
    },
    methods: {
        getCustomerInformation() {
            const customerId = this.$route.params.id;
            axios
                .get("http://localhost:8000/api/customer/" + customerId, {
                    headers: {
                        Accept: "application/json",
                        Authorization: "Bearer " + this.$store.getters.getToken
                    }
                })
                .then(response => {
                    this.customer = response.data;
                });
        },
        updateCustomerPersonalInformation(customerId) {
            axios
                .put(
                    "http://localhost:8000/api/customer/update/" + customerId,
                    this.customer,
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
        updateCustomerContactInformation(customerId){
             axios
                .put(
                    "http://localhost:8000/api/customer/update-contact/" + customerId,
                    this.customer.customer,
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
