<template>
    <div @click="clickedItem">
        <nav
            class="h-13 bg-primarycolor lg:flex lg:justify-evenly px-12 relative"
        >
            <div
                class="flex items-center px-5 w-full cursor-pointer justify-center"
            >
                <img
                    :src="require('../../../public/images/icon.svg').default"
                    class="w-8 lg:w-12"
                    alt="icon"
                />
                <span
                    class="ml-3 text-gray-900 block text-sm sm:text-lg font-bold text-center"
                    >FOOD ORDERING SYSTEM</span
                >
            </div>
            <div
                id="menu"
                class="hidden lg:flex justify-center container text-base font-bold  mr-5 text-center "
            >
                <hr class="mt-1" />
                <ul class="lg:flex lg:items-center lg:justify-content-center">
                    <li class="mx-3 cursor-pointer">
                        <router-link
                            to="/"
                            class="lg:text-gray-900 no-underline text-yellow-200 hover:text-yellow-200 duration-300 ease-in-out"
                            style="text-decoration:none"
                        >
                            Restaurants</router-link
                        >
                    </li>
                    <li class="mx-3 cursor-pointer" id="cart">
                        <router-link
                            class="lg:text-gray-900 no-underline text-yellow-200 hover:text-yellow-200 duration-300 ease-in-out"
                            style="text-decoration:none"
                            to="/cart"
                        >
                            Cart</router-link
                        >
                    </li>
                    <li class="mx-3 cursor-pointer">
                        <router-link
                            class="lg:text-gray-900 no-underline text-yellow-200 hover:text-yellow-200 duration-300 ease-in-out"
                            style="text-decoration:none"
                            to="/profile"
                        >
                            Profile</router-link
                        >
                    </li>
                    <li class="mx-3 cursor-pointer" id="login">
                        <a
                            class="lg:text-gray-900 no-underline text-yellow-200 hover:text-yellow-200 duration-300 ease-in-out"
                            style="text-decoration:none"
                            @click="openModal"
                        >
                            Login</a
                        >
                    </li>
                    <li class="mx-3 cursor-pointer">
                        <a
                            class="lg:text-gray-900 no-underline text-yellow-200 hover:text-yellow-200 duration-300 ease-in-out"
                            style="text-decoration:none"
                        >
                            Logout</a
                        >
                    </li>
                </ul>
            </div>
            <div
                class="absolute right-1 top-1 cursor-pointer lg:hidden"
                @click="openMenu"
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
                        d="M4 6h16M4 12h16M4 18h16"
                    />
                </svg>
            </div>
        </nav>
        <transition name="shiftx" mode="out-in">
            <router-view></router-view>
        </transition>
        <footer
            class="mt-16 bg-yellow-400 w-full h-60 flex items-center justify-center "
        >
            <div class="px-5 flex items-center justify-center w-1/2">
                <img
                    :src="require('../../../public/images/icon.svg').default"
                    class="w-12"
                    alt="icon"
                />
                <span
                    class="ml-3 text-gray-900 block text-lg font-bold text-center"
                    >FOOD ORDERING SYSTEM</span
                >
            </div>
            <div class="w-1/2 text-gray-900 text-xl">
                <p>RasimCem Aytan @2021</p>
            </div>
        </footer>

        <modal-component
            id="modalTarget"
            v-if="isModalOpen"
            @closeModal="exitModal"
        ></modal-component>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isModalOpen: false
        };
    },
    methods: {
        openMenu() {
            const menu = this.$el.querySelector("#menu");
            if (menu.classList.contains("hidden")) {
                menu.classList.remove("hidden");
            } else {
                menu.classList.add("hidden");
            }
        },
        openModal() {
            this.isModalOpen = true;
        },
        exitModal() {
            this.isModalOpen = false;
        },
        clickedItem(event) {
            const login = this.$el.querySelector("#login");
            if (
                this.isModalOpen &&
                !event.target.parentElement.contains(login)
            ) {
                const modal = this.$el.querySelector("#modalTarget").firstChild
                    .firstChild;
                if (!modal.contains(event.target)) {
                    this.isModalOpen = false;
                }
            }
            //console.log(modal);
        }
    }
};
</script>
<style>
.shiftx-enter-active,
.shiftx-leave-active {
    transition: all 0.6s ease-in-out;
}
.shiftx-enter, .shiftx-leave-to /* .fade-leave-active below version 2.1.8 */ {
    transform: translateX(800px);
}
</style>
