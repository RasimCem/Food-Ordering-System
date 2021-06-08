<template>
    <div>
        <h2 class="text-lg px-2 mt-3">Restaurant Menus</h2>
        <hr />
        <div class=" my-2 md:p-3 ">
            <div class="overflow-x-auto">
                <table class="content-table m-0 my-1 w-full">
                    <thead class="bg-yellow-400 text-xs">
                        <tr>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                #Id
                            </th>

                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Meal
                            </th>

                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Gradients
                            </th>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Unit Price
                            </th>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Operations
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-xs">
                        <tr v-for="menu in menus" :key="menu.id">
                            <td
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                               {{menu.id}}
                            </td>

                            <td
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                              {{menu.name}}
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-red-500 text-center"
                            >
                                {{menu.ingredient}}
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-red-500 text-center"
                            >
                                {{menu.price}} $
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-center whitespace-nowrap"
                            >
                                <button
                                    class="button bg-blue-500 hover:bg-blue-400 m-1"
                                    @click="editMenu(menu.id)"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
                                        />
                                    </svg>
                                </button>
                                <button
                                    class="button bg-red-500 hover:bg-red-400 m-1"
                                     @click="deleteMenu(menu.id)"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                        />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
import { ToastSuccess } from "../../toasters";
import axios from "axios";
export default {
    data(){
        return{
            menus:null
        }
    },
    methods:{
        editMenu(menuId){
            this.$router.push({ name: "panel-admin-restaurant-menus-edit",params:{id:menuId} });
        },
        deleteMenu(menuId){
              axios
                .delete("http://localhost:8000/api/menu/"+menuId,{
                    headers: {
                        Accept: "application/json",
                        Authorization: "Bearer " + this.$store.getters.getToken
                    }
                })
                .then(response => {
                     ToastSuccess.fire({
                        icon: "success",
                        title:response.data
                    });
                    this.getMenus();
                });
        },
        getMenus(){
            const restaurantId =  this.$route.params.id;
             axios
                .get("http://localhost:8000/api/menu/"+restaurantId,{
                    headers: {
                        Accept: "application/json",
                        Authorization: "Bearer " + this.$store.getters.getToken
                    }
                })
                .then(response => {
                    this.menus = response.data.data;
                });
        }
    },
    mounted(){
       this.getMenus();
    }
}
</script>
