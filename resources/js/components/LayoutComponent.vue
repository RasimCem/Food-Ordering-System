<template>
    <div>
        <nav class="h-13 bg-primarycolor flex justify-evenly px-12 " >
            <div class="flex items-center px-5 w-full cursor-pointer">
                <img  :src="require('../../../public/images/icon.svg').default" class="w-12" alt="icon" />
                <span class="ml-3 text-gray-900 block text-lg font-bold text-center">FOOD ORDERING SYSTEM</span>
            </div>
            <div class="flex justify-center container text-base font-bold text-gray-800 mr-5">
                <ul class="flex items-center justify-content-center">
                    <li class="mx-3 cursor-pointer hover:text-yellow-200 duration-300 ease-in-out">
                        <a>Restaurants</a>
                    </li>
                     <li class="mx-3 cursor-pointer hover:text-yellow-200 duration-300 ease-in-out">
                        <a>Login</a>
                    </li>
                </ul>
            </div>
        </nav>

        <home-component></home-component>

        <footer class="mt-16 bg-yellow-400 w-full h-60 flex items-center justify-center">
            <div class="px-5 flex items-center justify-center w-1/2">
                <img  :src="require('../../../public/images/icon.svg').default" class="w-12" alt="icon" />
                <span class="ml-3 text-gray-900 block text-lg font-bold text-center">FOOD ORDERING SYSTEM</span>
            </div>
            <div class="w-1/2 text-gray-900 text-xl">
                <p>RasimCem Aytan @2021</p>
            </div>
        </footer>
    </div>
</template>

<script>
export default {};
</script>
