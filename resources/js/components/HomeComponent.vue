<template>
    <div class="w-full">
        <!-- SLIDER -->
            <div class="relative">
                <img class="w-full h-64 object-cover " :src="require('../../../public/images/slider-img.jpg').default" alt="">
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 ">
                <div class=" bg-yellow-300 rounded-full h-12 mt-5">
                      <svg  class="h-10 w-10 float-left align-middle m-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                    <input type="text" class="h-full w-64 pl-2 text-lg focus:outline-none rounded-r shadow-lg" placeholder="Search For Restaurants" >
                </div>
                </div>
            </div>
            <!-- CONTENT -->
            <div class="container w-full h-full  my-16 p-5 rounded ">
                <h2 class="text-gray-900 font-bold text-2xl text-center">Restaurants Near To You</h2>
                <div class="container border-2 my-4 border-yellow-300 p-3 flex ">
                    <div class="relative w-64 bg-red-500">
                    <img  class="w-full object-cover rounded h-full" alt="" :src="require('../../../public/images/hamburger.jpg').default" >
                    <div class=" p-1 absolute top-1 right-0">
                       <a class="text bg-green-300 p-1 rounded-full hover:no-underline cursor-default hover:text-gray-100 my-1" title="Average Point">10</a>
                    </div>
                    </div>
                    <div class="w-3/6 p-3 tracking-wide ">
                        <h3 class="text-2xl cursor-pointer hover:text-yellow-400">Restaurant Name</h3>
                        <p class="text-md cursor-pointer">Description....</p>
                        <p class="text-md cursor-pointer"><i>Chef: </i>Andre</p>
                        <small class="text-sm cursor-pointer hover:text-yellow-400">Go To Comments</small>
                    </div>
                    <div class="w-2/6 flex items-center justify-center font-bold">
                        <button class="border-2 border-yellow-400 py-2 px-4 rounded-lg hover:bg-yellow-300  hover:text-gray-100 flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Order Now!
                        </button>
                    </div>
                </div>

                              <div class="container border-2 my-4 border-yellow-300 p-3 flex ">
                    <div class="relative w-64 bg-red-500">
                    <img  class="w-full object-cover rounded h-full" alt="" :src="require('../../../public/images/hamburger.jpg').default" >
                    <div class=" p-1 absolute top-1 right-0">
                       <a class="text bg-green-300 p-1 rounded-full hover:no-underline cursor-default hover:text-gray-100 my-1" title="Average Point">10</a>
                    </div>
                    </div>
                    <div class="w-3/6 p-3 tracking-wide ">
                        <h3 class="text-2xl cursor-pointer hover:text-yellow-400">Restaurant Name</h3>
                        <p class="text-md cursor-pointer">Description....</p>
                        <p class="text-md cursor-pointer"><i>Chef: </i>Andre</p>
                        <small class="text-sm cursor-pointer hover:text-yellow-400">Go To Comments</small>
                    </div>
                    <div class="w-2/6 flex items-center justify-center font-bold">
                        <button class="border-2 border-yellow-400 py-2 px-4 rounded-lg hover:bg-yellow-300  hover:text-gray-100 flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Order Now!
                        </button>
                    </div>
                </div>

            </div>
    </div>

</template>
