<template>
    <div>
        <h2 class="text-lg mt-3">Edit Restaurant Menus</h2>
        <hr />
        <div class=" my-2 md:p-3 overflow-x-auto ">
            <form class=" p-1 text-sm grid md:grid-cols-2 gap-4">
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">Meal Name</label>
                    <input class="input py-1" type="text" v-model="menu.name" />
                </div>
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">Ingradients</label>
                    <input class="input py-1" type="text" v-model="menu.ingredient"/>
                </div>
                         <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0"
                        >Menu Description</label
                    >
                    <textarea
                        class="input py-1"
                        v-model="menu.description"
                    ></textarea>
                </div>
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">Unit Price</label>
                    <input class="input py-1" type="text" placeholder="in $" v-model="menu.price"/>
                </div>
                      <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">Cal</label>
                    <input class="input py-1" type="text" placeholder="in $" v-model="menu.cal"/>
                </div>
            </form>
            <button class="button mt-2 text-xs md:text-base w-36" @click="updateMenu(menu.id)">
                Update
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
            menu:{
                name:null,
                ingredient:null,
                description:null,
                price:null,
                cal:null
            }
        };
    },
    methods: {
        getMenu() {
            const menuId = this.$route.params.id;
            axios
                .get("http://localhost:8000/api/menu/show/" + menuId, {
                    headers: {
                        Accept: "application/json",
                        Authorization: "Bearer " + this.$store.getters.getToken
                    }
                })
                .then(response => {
                    this.menu = response.data.data;
                });
        },
        updateMenu(menuId){
              axios
                .put("http://localhost:8000/api/menu/update/" + menuId,this.menu, {
                    headers: {
                        Accept: "application/json",
                        Authorization: "Bearer " + this.$store.getters.getToken
                    }
                })
                .then(response => {
                        ToastSuccess.fire({
                        icon: "success",
                        title: response.data
                    });
                     this.$router.push({ name: "panel-admin-restaurants" });
                });
        }
    },
    mounted() {
        this.getMenu();
    }
};
</script>
