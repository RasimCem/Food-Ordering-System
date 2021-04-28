<template>
    <div>
        <h2 class="text-lg mt-3">Restaurant Details</h2>
        <hr />
        <div class=" my-2 md:p-3 overflow-x-auto ">
            <form class=" p-1 text-sm grid md:grid-cols-2 gap-4">
                <div class=" text-md  font-bold md:col-span-2 ">
                    <span for="">Current Point: </span>
                    <span class="text-yellow-500">10</span>
                </div>
                <div class="mt-2 font-medium ">
                    <label for="" class="block mb-0">Name</label>
                    <input class="input py-1" type="mail" />
                </div>
                <div class="mt-2  font-medium ">
                    <label for="" class="block mb-0">Chef</label>
                    <input class="input py-1" type="mail" />
                </div>
                <div class="mt-2 font-medium">
                    <label for="" class="block mb-0">Description</label>
                    <textarea
                        rows="4"
                        class="input py-1"
                        placeholder="max:50"
                    ></textarea>
                </div>
            </form>
             <button class="button mt-2 text-xs md:text-base w-36">Update</button>
        </div>
        <h2 class="text-lg px-2 mt-3">Restaurant Sliders</h2>
        <hr />
        <div class=" my-2 md:p-3 overflow-x-auto ">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                <div class="m-3">
                    <small>Slider 1 (Click On The Image to Upload</small>
                    <label for="fileInput1" class="block cursor-pointer">
                        <img
                            class="shadow-md rounded"
                            v-if="slider1Url"
                            width="350"
                            height="100"
                            :src="slider1Url"
                            :key="slider1Url"
                            alt=""
                        />
                        <img
                            class="shadow-md rounded"
                            v-else
                            width="350"
                            height="100"
                            :src="
                                sliders[0]
                                    ? require('../../../../public/images/slider-img.jpg')
                                          .default
                                    : require('../../../../public/images/no-image.png')
                                          .default
                            "
                            :key="slider1Url"
                            alt=""
                        />
                    </label>
                    <input
                        id="fileInput1"
                        class="hidden"
                        type="file"
                        @change="fileChanged"
                    />
                    <button class="button mt-2 text-xs md:text-base">Update</button>
                </div>
                <div class="m-3">
                    <small>Slider 2 (Click On The Image to Upload</small>
                    <label for="fileInput2" class="block cursor-pointer">
                        <img
                            class="shadow-md rounded"
                            v-if="slider2Url"
                            width="350"
                            height="100"
                            :src="slider2Url"
                            :key="slider2Url"
                            alt=""
                        />
                        <img
                            class="shadow-md rounded"
                            v-else
                            width="350"
                            height="100"
                            :src="
                                sliders[1]
                                    ? require('../../../../public/images/slider-img.jpg')
                                          .default
                                    : require('../../../../public/images/no-image.png')
                                          .default
                            "
                            alt=""
                        />
                    </label>
                    <input
                        id="fileInput2"
                        class="hidden"
                        type="file"
                        @change="fileChanged"
                    />
                    <button class="button mt-2 text-xs md:text-base">Update</button>
                </div>
                <div class="m-3">
                    <small>Slider 3 (Click On The Image to Upload)</small>
                    <label for="fileInput3" class="block cursor-pointer">
                        <img
                            class="shadow-md rounded"
                            v-if="slider3Url"
                            width="350"
                            height="100"
                            :src="slider3Url"
                            :key="slider3Url"
                            alt=""
                        />
                        <img
                            class="shadow-md rounded"
                            v-else
                            width="350"
                            height="100"
                            :src="
                                sliders[2]
                                    ? require('../../../../public/images/slider-img.jpg')
                                          .default
                                    : require('../../../../public/images/no-image.png')
                                          .default
                            "
                            alt=""
                        />
                    </label>
                    <input
                        id="fileInput3"
                        class="hidden"
                        type="file"
                        @change="fileChanged"
                    />
                    <button class="button mt-2 text-xs md:text-base">Update</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            slider1Url: null,
            slider2Url: null,
            slider3Url: null,
            sliders: ["asdasd"]
        };
    },
    methods: {
        fileChanged(e) {
            const file = e.target.files[0];
            let reader = new FileReader();

            reader.onloadend = file => {
                switch (e.target.id) {
                    case "fileInput1":
                        this.slider1Url = reader.result;
                        break;
                    case "fileInput2":
                        this.slider2Url = reader.result;
                        break;
                    case "fileInput3":
                        this.slider3Url = reader.result;
                        break;
                }
            };
            reader.readAsDataURL(file);
            e.target.value = "";
        }
    }
};
</script>
