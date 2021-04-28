<template>
    <div>
        <h2 class="text-lg px-2 mt-3">New Orders</h2>
        <hr />
        <div class=" my-2 md:p-3 ">
            <div class="bg-red-500 px-3 md:px-5 py-2 rounded">
                <ul class="text-xs md:text-md">
                    <li>Orders not found recently.</li>
                </ul>
            </div>
            <div class="overflow-x-auto">
                <table class="content-table m-0 my-1 w-full ">
                    <thead class="bg-yellow-400 text-xs">
                        <tr>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                By
                            </th>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Address
                            </th>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Date
                            </th>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Time
                            </th>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Order
                            </th>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Status
                            </th>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Note
                            </th>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Total Price
                            </th>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Approval
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-xs">
                        <tr>
                            <td
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                RasimCem Aytan
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Kurttepe mah. 3513. sok ev no 2
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                21.10.2021
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                20:00
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Hambuger x3, Cola x2, Ayran x1
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-red-500 text-center"
                            >
                                Not Received
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Vel voluptate laudantium
                                facilis fugit praesentium doloremque!
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-primarycolor text-center"
                            >
                                95 $
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                <button
                                    class="button bg-red-500 hover:bg-red-600"
                                >
                                    Accept
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <h2 class="text-lg px-2 mt-3">Latest Comments (in 24 hours)</h2>
        <hr />
        <div class=" my-2 md:p-3">
            <div class="w-full h-auto bg-red-500 px-3 md:px-5 py-2 rounded">
                <ul class="text-xs md:text-md">
                    <li>
                        There is not found any comments in last 24 hours.
                    </li>
                </ul>
            </div>
            <div class=" overflow-x-auto">
                <table class="content-table  m-0 my-1">
                    <thead class="bg-yellow-400 text-xs">
                        <tr>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Name
                            </th>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Comment
                            </th>
                            <th
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                Point
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-xs">
                        <tr>
                            <td
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                RasimCem Aytan
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-center text-xs"
                            >
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Voluptatem, ipsam
                                reprehenderit! Culpa aliquam voluptatum ab, quo
                                beatae impedit molestiae cupiditate aperiam,
                                reprehenderit consequatur qui ipsa alias rerum
                                maxime nostrum optio.
                            </td>
                            <td
                                class="border-2 border-gray-600 p-2 text-center"
                            >
                                8
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <h2 class="text-lg px-2 mt-3">
            Selling Statistics (last 12 months)
        </h2>
        <hr />
        <div
            class="w-full h-auto bg-red-500 px-3 md:px-5 py-2 rounded sm:hidden"
        >
            <ul class="text-xs md:text-md">
                <li>
                    Please use computer view to display graph.
                </li>
            </ul>
        </div>
        <div class=" my-2 md:p-3 mb-12 hidden sm:block">
            <canvas id="myChart" height="75"></canvas>
        </div>
    </div>
</template>

<script>
import Chart from "chart.js";
import { sellingChart } from "../charts/selling-chart.js";
export default {
    data() {
        return {
            sellingChart: sellingChart
        };
    },
    mounted() {
        var ctx = document.getElementById("myChart").getContext("2d");
        var myChart = new Chart(ctx, this.sellingChart);
    }
};
</script>

<style scoped></style>
