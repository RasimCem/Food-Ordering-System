<template>
    <div>
        <h2 class="text-lg mt-3">Edit Meal</h2>
        <hr />
        <div class=" my-2 md:p-3 overflow-x-auto ">
            <form class=" p-1 text-sm grid md:grid-cols-2 gap-4">
                <div class="mt-1 font-medium md:col-span-2">
                    <label for="" class="block mb-0 "
                        >Image (Click On The Image to Change)</label
                    >
                    <label for="image" class="cursor-pointer">
                        <img
                            class="shadow-md  object-contain h-40 rounded"
                            v-if="image"
                            width="350"
                            height="100"
                            :src="image"
                            :key="image"
                            alt=""
                        />
                        <img
                            class="shadow-md rounded"
                            v-else
                            width="350"
                            height="100"
                            :src="
                               imageFromDB
                                    ? require('../../../../public/images/hamburger.jpg')
                                          .default
                                    : require('../../../../public/images/no-image.png')
                                          .default
                            "
                            alt=""
                        />
                    </label>
                    <input
                        type="file"
                        id="image"
                        class="hidden"
                        @change="fileChanged"
                    />
                </div>
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">Name</label>
                    <input class="input py-1" type="text" />
                </div>
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">Ingredients</label>
                    <input class="input py-1" type="text" />
                    <small
                        >Plese Add Items with comma (e.g onion, beef,
                        tomato...)</small
                    >
                </div>
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">Chef</label>
                    <input class="input py-1" type="text" />
                </div>
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">Price ($) </label>
                    <input class="input py-1" type="number" />
                </div>
            </form>
            <button class="button mt-2 text-xs md:text-base w-36">
                Update
            </button>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            image: null,
            imageFromDB:'asdas'
        };
    },
    methods: {
        fileChanged(e) {
            const file = e.target.files[0];
            let reader = new FileReader();
            reader.onloadend = file => {
                this.image = reader.result;
            };
            reader.readAsDataURL(file);
            e.target.value = "";
        }
    }
};
</script>
