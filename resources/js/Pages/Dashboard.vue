<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { ref } from "vue";

const isModalOpen = ref(false);

const openModal = () => {
    isModalOpen.value = true;
};

const closeModal = () => {
    isModalOpen.value = false;
};
</script>

<template>
    <Head title="Dashboard" />



    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <!--Modal-->
        <div v-if="isModalOpen" @click="closeModal" class="fixed inset-0 bg-black opacity-50 z-50"></div>
        <!-- Modal content -->
        <div v-if="isModalOpen" class="fixed inset-0 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded shadow-lg w-full">
                <!-- Modal header -->
                <div class="mb-4">
                    <h2 class="text-2xl font-semibold">Answers</h2>
                </div>

                <!-- Modal body -->
                <div>
                    <!-- Your modal content goes here -->
                    <p>Name : Mazen</p>
                    <p>Age : 19</p>
                    <p>Gender : Male</p>
                    <p>Customer Type : Returning</p>
                    <p>Type of Travel : Business</p>
                    <p>Class : Economy</p>
                    <p>Flight Distance : 20000</p>
                    <p>Departure Delay : 5</p>
                    <p>Arrival Delay : 10</p>
                    <p>Departure and Arrival Time Convenient : Satisfied</p>
                    <p>Ease of Online Booking : Neutral</p>
                    <p>Check-in Service : Satisfied</p>
                    <p>Online Boarding : Dissatisfied</p>
                    <p>Gate Location : Dissatisfied</p>
                    <p>On Board Service : Neutral</p>
                    <p>Seat Comfort : Satisfied</p>
                    <p>Leg Room Service : Satisfied</p>
                    <p>Cleanliness : Satisfied</p>
                    <p>Food and Drink : Satisfied</p>
                    <p>In-Flight Entertainment : Satisfied</p>
                    <p>Baggage Handling : Neutral</p>

                </div>

                <!-- Modal actions (buttons, etc.) -->
                <div class="mt-4 flex justify-end">
                    <button @click="closeModal" class="text-gray-600 hover:text-gray-800 px-4 py-2">
                        Close
                    </button>
                    <!-- Add more buttons as needed -->
                </div>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">Responses</div>
                    <table class="min-w-full bg-white border border-gray-300 p-2">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">Name</th>
                                <th class="py-2 px-4 border-b">Prediction</th>
                                <th class="py-2 px-4 border-b">Answers</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="py-2 px-4 border-b">Mazen</th>
                                <th class="py-2 px-4 border-b">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-green-100 text-green-800">
                                        Satisfied
                                    </span>
                                </th>
                                <th>
                                    <PrimaryButton @click="openModal"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        View
                                    </PrimaryButton>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
