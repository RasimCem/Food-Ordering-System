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
                            require('../../../public/images/icon.svg').default
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
                    <form action="">
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
                    </form>
                </div>
                <div v-show="activeWindow">
                    <h2 class="text-center text-xl font-semibold mt-2">
                        Create An Account
                    </h2>
                    <div class="w-full h-auto bg-red-500 px-5 py-2 rounded">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6 md:h-8 md:w-8 float-right text-white"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944zM11 14a1 1 0 11-2 0 1 1 0 012 0zm0-7a1 1 0 10-2 0v3a1 1 0 102 0V7z"
                                clip-rule="evenodd"
                            />
                        </svg>
                        <ul>
                            <li>birinci hata</li>
                            <li>Ikinci hata</li>
                        </ul>
                    </div>
                    <form action="">
                        <div class="mt-2 text-base font-medium">
                            <label for="" class="block mb-0"
                                >Email Address*</label
                            >
                            <input
                                class="w-full py-1 px-2 border-2 border-gray-900 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                                type="mail"
                            />
                        </div>
                        <div class="mt-2 text-base font-medium">
                            <label for="" class="block mb-0">Password*</label>
                            <input
                                class="w-full py-1 px-2 border-2 border-gray-900 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                                type="password"
                            />
                            <small class="text-xs"
                                >Passwords Should Match</small
                            >
                        </div>
                        <div class="mt-2 text-base font-medium">
                            <label for="" class="block mb-0">Password*</label>
                            <input
                                class="w-full py-1 px-2 border-2 border-gray-900 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                                type="password"
                            />
                            <small class="text-xs"
                                >Passwords Should Match</small
                            >
                        </div>
                        <div class="mt-2 text-base font-medium">
                            <label for="" class="block mb-0"
                                >Phone Number*</label
                            >
                            <input
                                class="w-full py-1 px-2 border-2 border-gray-900 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                                type="tel"
                                pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}"
                                required
                            />
                            <small class="text-xs"
                                >Valid Format: 123-456-78-91</small
                            >
                        </div>
                        <div class="flex justify-between">
                            <div class="mt-2 text-base font-medium">
                                <label for="" class="block mb-0">City*</label>
                                <input
                                    class="w-full py-1 px-2 border-2 border-gray-900 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                                    type="text"
                                />
                            </div>
                            <div class="mt-2 text-base font-medium ml-1">
                                <label for="" class="block mb-0">Street*</label>
                                <input
                                    class="w-full py-1 px-2 border-2 border-gray-900 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                                    type="text"
                                />
                            </div>
                        </div>

                        <div class="mt-2 text-base font-medium">
                            <label for="" class="block mb-0"
                                >Detailed Address Description*</label
                            >
                            <textarea
                                class="w-full py-1 px-2 border-2 border-gray-900 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                                type="text"
                            ></textarea>
                        </div>

                        <div class="my-4 text-base font-medium text-center">
                            <button
                                class="bg-yellow-400 hover:bg-yellow-500 text-white py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
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
