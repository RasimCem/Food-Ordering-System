<template>
    <div>
        <h2 class="text-lg px-2 mt-3">Restaurant Details</h2>
        <hr />
        <div class=" my-2 md:p-3 grid grid-cols-2 gap-4 ">
            <div>
                <label for="">Restaurant Name: </label>
                <span class="font-extrabold text-gray-900 text-opacity-50"
                    >Sasama Restorant</span
                >
            </div>
            <div>
                <label for="">Points: </label>
                <span class="font-extrabold text-gray-900 text-opacity-50"
                    >10</span
                >
            </div>
            <div class="col-span-2">
                <label for="">Description: </label>
                <span class="font-extrabold text-gray-900 text-opacity-50 ">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Nisi quaerat recusandae temporibus ipsa dicta deleniti
                    dolore quos corporis at fugit, dolor vel optio officia
                    soluta aspernatur. Accusantium id temporibus quae.</span
                >
            </div>
        </div>
        <div
            class="md:m-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4"
        >
            <div>
                <small>Slider1</small>
                <img
                    width="350"
                    height="100"
                    :src="
                        require('../../../../public/images/slider-img.jpg')
                            .default
                    "
                    alt=""
                />
            </div>
            <div>
                <small>Slider2</small>
                <img
                    width="350"
                    height="100"
                    :src="
                        require('../../../../public/images/slider-img.jpg')
                            .default
                    "
                    alt=""
                />
            </div>
            <div>
                <small>Slider3</small>
                <img
                    width="350"
                    height="100"
                    :src="
                        require('../../../../public/images/slider-img.jpg')
                            .default
                    "
                    alt=""
                />
            </div>
        </div>

        <h2 class="text-lg px-2 mt-5">Owner Of The Restaurant</h2>
        <hr />
        <div class=" my-2 md:p-3 grid grid-cols-1 lg:grid-cols-2 gap-4">
            <div>
                <label for="">Full Name: </label>
                <span class="font-extrabold text-gray-900 text-opacity-50"
                    >RasimCem Aytan</span
                >
            </div>
            <div>
                <label for="">Mail Address: </label>
                <span class="font-extrabold text-gray-900 text-opacity-50"
                    >cemaytan_01@hotmail.com</span
                >
            </div>
            <div>
                <label for="">Address Description: </label>
                <span class="font-extrabold text-gray-900 text-opacity-50"
                    >Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Quam, vitae perferendis voluptates enim, voluptatum possimus
                    iste modi magnam est aliquid saepe laboriosam rerum beatae
                    obcaecati.</span
                >
            </div>
            <div>
                <label for="">Phone Number: </label>
                <span class="font-extrabold text-gray-900 text-opacity-50"
                    >0533 840 18 35</span
                >
            </div>
            <div>
                <label for="">Country: </label>
                <span class="font-extrabold text-gray-900 text-opacity-50"
                    >turkey</span
                >
            </div>
            <div>
                <label for="">City: </label>
                <span class="font-extrabold text-gray-900 text-opacity-50"
                    >adana</span
                >
            </div>
        </div>
    </div>
</template>
