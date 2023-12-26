<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { ref } from 'vue';
import { defineProps } from 'vue';

const isModalOpen = ref(false);
const selectedPrediction = ref(null);

const openModal = (prediction) => {
    selectedPrediction.value = prediction;
    isModalOpen.value = true;
};

const closeModal = () => {
    isModalOpen.value = false;
};

defineProps({
    predictions: Array,
});
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
            <div class="bg-white p-6 rounded shadow-lg w-1/2">
                <!-- Modal header -->
                <div class="mb-4">
                    <h2 class="text-2xl font-semibold">Answers of {{ selectedPrediction.name }}'s Prediction</h2>
                </div>

                <!-- Modal body -->
                <div>
                    <p>Name: {{ selectedPrediction.name }}</p>
                    <p>Age: {{ selectedPrediction.age }}</p>
                    <p>Gender: {{ selectedPrediction.gender == 'male' ? 'Male' : 'Female' }}</p>
                    <p>Customer Type: {{ selectedPrediction.customer_type == 'first_time' ? 'First-Time' : 'Returning' }}
                    </p>
                    <p>Type of Travel: {{ selectedPrediction.type_of_travel == 'business' ? 'Business' : 'Personal' }}</p>
                    <p>Class: {{ selectedPrediction.class == 'business' ? 'Business' : selectedPrediction.class == 'economy'
                        ? 'Economy' : 'Economy Plus' }}</p>
                    <p>Flight Distance: {{ selectedPrediction.flight_distance }}</p>
                    <p>Departure Delay: {{ selectedPrediction.depature_delay }}</p>
                    <p>Arrival Delay: {{ selectedPrediction.arrival_delay }}</p>
                    <p>Departure and Arrival Time Convenience: {{ selectedPrediction.depature_and_arrival_time_convenient
                        === 'very_dissatisfied' ? 'Very Dissatisfied' :
                        selectedPrediction.depature_and_arrival_time_convenient === 'dissatisfied' ? 'Dissatisfied' :
                            selectedPrediction.depature_and_arrival_time_convenient === 'neutral' ? 'Neutral' :
                                selectedPrediction.depature_and_arrival_time_convenient === 'satisfied' ? 'Satisfied' :
                                    selectedPrediction.depature_and_arrival_time_convenient === 'very_satisfied' ? 'Very Satisfied' : ''
                    }}
                    </p>
                    <p>Ease of Online Booking:
                        {{ selectedPrediction.ease_of_online_booking === 'very_dissatisfied' ? 'Very Dissatisfied' :
                            selectedPrediction.ease_of_online_booking === 'dissatisfied' ? 'Dissatisfied' :
                                selectedPrediction.ease_of_online_booking === 'neutral' ? 'Neutral' :
                                    selectedPrediction.ease_of_online_booking === 'satisfied' ? 'Satisfied' :
                                        selectedPrediction.ease_of_online_booking === 'very_satisfied' ? 'Very Satisfied' : ''
                        }}
                    </p>
                    <p>Check-in Service:
                        {{ selectedPrediction.check_in_service === 'very_dissatisfied' ? 'Very Dissatisfied' :
                            selectedPrediction.check_in_service === 'dissatisfied' ? 'Dissatisfied' :
                                selectedPrediction.check_in_service === 'neutral' ? 'Neutral' :
                                    selectedPrediction.check_in_service === 'satisfied' ? 'Satisfied' :
                                        selectedPrediction.check_in_service === 'very_satisfied' ? 'Very Satisfied' : ''
                        }}
                    </p>
                    <p>Online Boarding:
                        {{ selectedPrediction.online_boarding === 'very_dissatisfied' ? 'Very Dissatisfied' :
                            selectedPrediction.online_boarding === 'dissatisfied' ? 'Dissatisfied' :
                                selectedPrediction.online_boarding === 'neutral' ? 'Neutral' :
                                    selectedPrediction.online_boarding === 'satisfied' ? 'Satisfied' :
                                        selectedPrediction.online_boarding === 'very_satisfied' ? 'Very Satisfied' : ''
                        }}
                    </p>
                    <p>Gate Location:
                        {{ selectedPrediction.gate_location === 'very_dissatisfied' ? 'Very Dissatisfied' :
                            selectedPrediction.gate_location === 'dissatisfied' ? 'Dissatisfied' :
                                selectedPrediction.gate_location === 'neutral' ? 'Neutral' :
                                    selectedPrediction.gate_location === 'satisfied' ? 'Satisfied' :
                                        selectedPrediction.gate_location === 'very_satisfied' ? 'Very Satisfied' : ''
                        }}
                    </p>
                    <p>On-Board Service:
                        {{ selectedPrediction.on_board_service === 'very_dissatisfied' ? 'Very Dissatisfied' :
                            selectedPrediction.on_board_service === 'dissatisfied' ? 'Dissatisfied' :
                                selectedPrediction.on_board_service === 'neutral' ? 'Neutral' :
                                    selectedPrediction.on_board_service === 'satisfied' ? 'Satisfied' :
                                        selectedPrediction.on_board_service === 'very_satisfied' ? 'Very Satisfied' : ''
                        }}
                    </p>
                    <p>Seat Comfort:
                        {{ selectedPrediction.seat_comfort === 'very_dissatisfied' ? 'Very Dissatisfied' :
                            selectedPrediction.seat_comfort === 'dissatisfied' ? 'Dissatisfied' :
                                selectedPrediction.seat_comfort === 'neutral' ? 'Neutral' :
                                    selectedPrediction.seat_comfort === 'satisfied' ? 'Satisfied' :
                                        selectedPrediction.seat_comfort === 'very_satisfied' ? 'Very Satisfied' : ''
                        }}
                    </p>
                    <p>
                        Leg Room Service:
                        {{ selectedPrediction.leg_room_service === 'very_dissatisfied' ? 'Very Dissatisfied' :
                            selectedPrediction.leg_room_service === 'dissatisfied' ? 'Dissatisfied' :
                                selectedPrediction.leg_room_service === 'neutral' ? 'Neutral' :
                                    selectedPrediction.leg_room_service === 'satisfied' ? 'Satisfied' :
                                        selectedPrediction.leg_room_service === 'very_satisfied' ? 'Very Satisfied' : ''
                        }}
                    </p>
                    <p>Cleanliness:
                        {{ selectedPrediction.cleanliness === 'very_dissatisfied' ? 'Very Dissatisfied' :
                            selectedPrediction.cleanliness === 'dissatisfied' ? 'Dissatisfied' :
                                selectedPrediction.cleanliness === 'neutral' ? 'Neutral' :
                                    selectedPrediction.cleanliness === 'satisfied' ? 'Satisfied' :
                                        selectedPrediction.cleanliness === 'very_satisfied' ? 'Very Satisfied' : ''
                        }}
                    </p>
                    <p>Food and Drink:
                        {{ selectedPrediction.food_and_drink === 'very_dissatisfied' ? 'Very Dissatisfied' :
                            selectedPrediction.food_and_drink === 'dissatisfied' ? 'Dissatisfied' :
                                selectedPrediction.food_and_drink === 'neutral' ? 'Neutral' :
                                    selectedPrediction.food_and_drink === 'satisfied' ? 'Satisfied' :
                                        selectedPrediction.food_and_drink === 'very_satisfied' ? 'Very Satisfied' : ''
                        }}
                    </p>
                    <p>In-Flight Entertainment:
                        {{ selectedPrediction.inflight_entertainment === 'very_dissatisfied' ? 'Very Dissatisfied' :
                            selectedPrediction.inflight_entertainment === 'dissatisfied' ? 'Dissatisfied' :
                                selectedPrediction.inflight_entertainment === 'neutral' ? 'Neutral' :
                                    selectedPrediction.inflight_entertainment === 'satisfied' ? 'Satisfied' :
                                        selectedPrediction.inflight_entertainment === 'very_satisfied' ? 'Very Satisfied' : ''
                        }}
                    </p>
                    <p>
                        Baggage Handling:
                        {{ selectedPrediction.baggage_handling === 'very_dissatisfied' ? 'Very Dissatisfied' :
                            selectedPrediction.baggage_handling === 'dissatisfied' ? 'Dissatisfied' :
                                selectedPrediction.baggage_handling === 'neutral' ? 'Neutral' :
                                    selectedPrediction.baggage_handling === 'satisfied' ? 'Satisfied' :
                                        selectedPrediction.baggage_handling === 'very_satisfied' ? 'Very Satisfied' : ''
                        }}
                    </p>
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
                            <tr v-for="(prediction, index) in predictions" :key="index">
                                <th class="py-2 px-4 border-b">{{ prediction.name }}</th>
                                <th class="py-2 px-4 border-b">
                                    <span v-if="prediction.prediction == 'satisfied'"
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-green-100 text-green-800">
                                        Satisfied
                                    </span>
                                    <span v-else
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-red-100 text-red-800">
                                        Neutral or Dissatisfied
                                    </span>
                                </th>
                                <th class="py-2 px-4 border-b">
                                    <PrimaryButton @click="() => openModal(prediction)"
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
