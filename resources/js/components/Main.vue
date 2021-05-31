<template>
    <div>
        <panel-layout-component
            v-if="
                $store.getters.getRole == 'restaurantOwner' ||
                    $store.getters.getRole == 'admin'
            "
        ></panel-layout-component>
        <layout-component v-else></layout-component>

    <!-- <layout-component></layout-component> -->
    </div>
</template>
