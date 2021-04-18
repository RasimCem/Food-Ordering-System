<template>
    <div
        class="absolute z-5  top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 container shadow-inner"
    >
        <div
            class=" bg-gray-50 border-2 border-primarycolor rounded-lg w-1/1 sm:w-1/2 xl:w-1/3 m-auto  py-2 px-8 relative"
        >
            <div
                class="flex items-center px-5 w-full cursor-pointer justify-center"
            >
                <img
                    :src="require('../../../public/images/icon.svg').default"
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
                <div class="mt-2 text-base font-medium">
                    <label for="" class="block mb-0">User Mail</label>
                    <input
                        class="w-full py-1 px-2 border-2 border-gray-900 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                        type="text"
                    />
                </div>
                <div class="mt-2 text-base font-medium">
                    <label for="" class="block mb-0">Password</label>
                    <input
                        class="w-full py-1 px-2 border-2 border-gray-900 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                        type="text"
                    />
                </div>
                <div class="my-4 text-base font-medium text-center">
                    <button
                        class="bg-yellow-400 hover:bg-yellow-500 text-white py-2 px-4 rounded"
                    >
                        Confirm
                    </button>
                </div>
            </div>
            <div v-show="activeWindow">
                <h2 class="text-center text-xl font-semibold mt-2">
                    Create An Account
                </h2>
                <div class="mt-2 text-base font-medium">
                    <label for="" class="block mb-0">Email Address*</label>
                    <input
                        class="w-full py-1 px-2 border-2 border-gray-900 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                        type="text"
                    />
                </div>
                <div class="mt-2 text-base font-medium">
                    <label for="" class="block mb-0">Phone Number*</label>
                    <input
                        class="w-full py-1 px-2 border-2 border-gray-900 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                        type="text"
                    />
                </div>
                <div class="mt-2 text-base font-medium">
                    <label for="" class="block mb-0">Address*</label>
                    <input
                        class="w-full py-1 px-2 border-2 border-gray-900 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                        type="text"
                    />
                </div>
                <div class="mt-2 text-base font-medium">
                    <label for="" class="block mb-0">Password</label>
                    <input
                        class="w-full py-1 px-2 border-2 border-gray-900 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                        type="text"
                    />
                </div>
                <div class="mt-2 text-base font-medium">
                    <label for="" class="block mb-0">Password</label>
                    <input
                        class="w-full py-1 px-2 border-2 border-gray-900 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                        type="text"
                    />
                </div>
                <div class="my-4 text-base font-medium text-center">
                    <button
                        class="bg-yellow-400 hover:bg-yellow-500 text-white py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                    >
                        Confirm
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            activeWindow: false
        };
    },
    methods: {
        closeModal() {
            this.$emit("closeModal");
        }
    }
};
</script>
<style scoped></style>
