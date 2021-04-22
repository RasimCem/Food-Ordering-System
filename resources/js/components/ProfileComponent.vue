<template>
    <div>
        <div class="container m-auto w-full h-auto  p-5 my-auto">
            <h1 class="text-2xl mb-1 ml-2">Profile</h1>
            <hr />
            <div class="w-full p-2">
                <div class="mt-2 text-base font-medium flex">
                    <div class="w-full md:w-1/2">
                        <div class="w-full my-3">
                            <label for="" class="block mb-0"
                                >Mail Address</label
                            >
                            <input
                                class="w-full px-2 border-2 border-gray-900 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                                type="text"
                            />
                        </div>

                        <div class="w-full my-3">
                            <label for="" class="block mb-0">Name</label>
                            <input
                                class="w-full px-2 border-2 border-gray-900 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                                type="text"
                            />
                        </div>
                        <div class="w-full my-3">
                            <label for="" class="block mb-0">Surname</label>
                            <input
                                class="w-full px-2 border-2 border-gray-900 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                                type="text"
                            />
                        </div>
                        <div class="w-full my-3">
                            <label for="" class="block mb-0"
                                >Phone Number</label
                            >
                            <input
                                class="w-full  px-2 border-2 border-gray-900 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                                type="tel"
                                pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}"
                                required
                            />
                            <small class="text-xs"
                                >Valid Format: 123-456-78-91</small
                            >
                        </div>
                        <div class="w-full my-3">
                            <label for="" class="block mb-0">City</label>
                            <input
                                class="w-full px-2 border-2 border-gray-900 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                                type="text"
                            />
                        </div>
                        <div class="w-full my-3">
                            <label for="" class="block mb-0">Street</label>
                            <input
                                class="w-full  px-2 border-2 border-gray-900 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                                type="text"
                            />
                        </div>
                        <div class="w-full my-3">
                            <label for="" class="block mb-0"
                                >Detailed Address Description*</label
                            >
                            <textarea
                                rows="4"
                                class="w-full py-1 px-2 border-2 border-gray-900 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                                type="text"
                            ></textarea>
                        </div>
                        <div class="my-2 text-base font-medium">
                            <button
                                class="bg-yellow-400 hover:bg-yellow-500 text-white py-2 px-4 rounded"
                            >
                                Update
                            </button>
                        </div>
                    </div>

                    <div class=" hidden md:block w-1 md:w-1/2 p-5 text-center">
                        <img
                            :src="
                                require('../../../public/images/user.svg')
                                    .default
                            "
                            alt=""
                            class="w-64 float-right fill-current border-2 border-yellow-400 rounded-full pt-3"
                        />
                    </div>
                </div>
            </div>
        </div>
        <div class="container py-1 px-5 ">
            <div class="w-1/3">
                <h1 class="text-2xl mb-1 ml-2">Password Update</h1>
                <hr />
                <div class="w-full my-3">
                    <label for="" class="block mb-0">Current Password*</label>
                    <input
                        class="w-full py-1 px-2 border-2 border-gray-900 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                        type="password"
                    />
                </div>
                <div class="w-full my-3">
                    <label for="" class="block mb-0">Password*</label>
                    <input
                        class="w-full py-1 px-2 border-2 border-gray-900 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                        type="password"
                    />
                    <small class="text-xs">Passwords Should Match</small>
                </div>
                <div class="w-full my-3">
                    <label for="" class="block mb-0">Password*</label>
                    <input
                        class="w-full py-1 px-2 border-2 border-gray-900 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                        type="password"
                    />
                    <small class="text-xs">Passwords Should Match</small>
                </div>
                <div class="my-2 text-base font-medium">
                    <button
                        class="bg-yellow-400 hover:bg-yellow-500 text-white py-2 px-4 rounded"
                    >
                        Update My Password
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {};
</script>
<style scoped></style>
