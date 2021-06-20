<template>
    <div>
        <h2 class="text-lg px-2 mt-3">All Comments</h2>
        <hr />
        <div class=" my-2 md:p-3 ">
            <div class="overflow-x-auto">
                <table class="content-table m-0 my-1 w-full">
                    <thead class="bg-yellow-400 text-xs">
                        <tr>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Comment Id
                            </th>

                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                From
                            </th>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Restaurant
                            </th>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Date
                            </th>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Time
                            </th>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Operations
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-xs">
                        <tr v-for="comment in comments" :key="comment.id">
                            <td
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                {{ comment.id }}
                            </td>

                            <td
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                {{ comment.user.mail }}
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                {{ comment.order.restaurant.name }}
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-red-500 text-center"
                            >
                                {{comment.created_at.substring(0,10)}}
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-red-500 text-center"
                            >
                                {{comment.created_at.substring(11,16)}}
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-center whitespace-nowrap"
                            >
                                <button
                                    class="button bg-red-500 hover:bg-red-400 m-1"
                                    @click="deleteComment(comment.id)"
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
    data() {
        return {
            comments: null
        };
    },
    mounted() {
        this.getAllComments();
    },
    methods: {
        deleteComment(commentId) {
            axios
                .delete("http://localhost:8000/api/comment/" + commentId, {
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
                    this.getAllComments();
                });
        },
        getAllComments() {
            axios
                .get("http://localhost:8000/api/comments", {
                    headers: {
                        Accept: "application/json",
                        Authorization: "Bearer " + this.$store.getters.getToken
                    }
                })
                .then(response => {
                    this.comments = response.data;
                });
        }
    }
};
</script>
