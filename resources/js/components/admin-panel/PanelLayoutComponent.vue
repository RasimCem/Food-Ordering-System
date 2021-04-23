<template>
    <div>
        <header
            class="w-full  bg-gray-700 flex justify-between p-6 items-center"
        >
            <div class="ml-2"></div>
            <div>
                icon
            </div>
        </header>
        <!-- Side Bar -->
        <div
        id="sidebar"
            class="w-1/2 md:w-1/3 lg:w-1/5 xl:1/8  h-screen bg-gray-800 absolute top-0 left-0 transform"
        >
            <div class="text-white float-right p-2 text-lg cursor-pointer" @click="sideBarClose">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6 hover:text-yellow-400"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"
                    />
                </svg>
            </div>
            <div class="w-full text-center my-2  clear-right ">
                <h2 class="text-yellow-400 text-xl sm:text-2xl">Panel</h2>
            </div>
            <div class="w-full p-auto">
                <div></div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {

        };
    },
    methods: {
        sideBarClose(){
            const sidebar = document.querySelector("#sidebar");
            sidebar.classList.add("-translate-x-3/4");
        }
    }
};
</script>

<style scoped></style>
