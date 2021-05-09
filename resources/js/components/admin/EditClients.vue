<template>
    <div>
        <h2 class="text-lg mt-3">Edit Clients</h2>
        <hr />
        <div class=" my-2 md:p-3 overflow-x-auto ">
            <form class=" p-1 text-sm grid md:grid-cols-2 gap-4">
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">Full Name</label>
                    <input class="input py-1" type="text" />
                </div>
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">Mail Address</label>
                    <input class="input py-1" type="text" />
                </div>
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">Address Description</label>
                    <textarea class="input py-1"></textarea>
                </div>
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">Phone Number</label>
                    <input class="input py-1" type="text" />
                </div>
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">City</label>
                    <input class="input py-1" type="text" />
                </div>
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">Street</label>
                    <input class="input py-1" type="number" />
                </div>
                <div class="mt-1 font-medium ">
                    <label for="" class="block mb-0">Phone Number</label>
                    <input class="input py-1" type="text" />
                </div>
            </form>
            <button class="button mt-2 text-xs md:text-base w-36">
                Update
            </button>
        </div>
    </div>
</template>

<script>
export default {};
</script>
