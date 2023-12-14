<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import QuestionnaireLayout from "@/Layouts/QuestionnaireLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const form = useForm({
    name: "",
    gender: null,
    age: null,
    customer_type: null,
    type_of_travel: null,
    class: null,
    flight_distance: null,
    departure_delay: null,
    arrival_delay: null,
    departure_and_arrival_time_convenient: null,
    ease_of_online_booking: null,
    check_in_service: null,
    online_boarding: null,
    gate_location: null,
    on_board_service: null,
    seat_comfort: null,
    leg_room_service: null,
    cleanliness: null,
    food_and_drink: null,
    in_flight_entertainment: null,
    baggage_handling: null,
});
</script>

<template>
    <Head title="Questionnaire" />
    <QuestionnaireLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Answer The Following Questions!
            </h2>
        </template>
        <template #main>
            <div class="max-w-7xl mx-auto bg-gray-200 mt-2 p-4 border rounded">
                <form @submit.prevent="submitForm">
                    <InputLabel class="mt-3" for="name" value="Your Name" />

                    <TextInput
                        id="name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.name"
                        required
                        autofocus
                    />

                    <InputLabel class="mt-3" for="age" value="Your Age" />

                    <TextInput
                        id="age"
                        type="number"
                        class="mt-1 block w-full"
                        v-model="form.age"
                        required
                    />

                    <InputLabel class="mt-3" for="gender" value="Gender" />

                    <select
                        id="gender"
                        v-model="form.gender"
                        class="shadow appearance-none border rounded w-full mt-1 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    >
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>

                    <InputLabel
                        class="mt-3"
                        for="customer_type"
                        value="Customer Type"
                    />

                    <select
                        id="customer_type"
                        v-model="form.customer_type"
                        class="shadow appearance-none border rounded w-full mt-1 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    >
                        <option value="regular">Regular</option>
                        <option value="vip">VIP</option>
                        <!-- Add more options as needed for other keys -->
                    </select>

                    <InputLabel
                        class="mt-3"
                        for="type_of_travel"
                        value="Type of Travel"
                    />
                    <select
                        id="type_of_travel"
                        v-model="form.type_of_travel"
                        class="shadow appearance-none border rounded w-full mt-1 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    >
                        <option value="business">Business</option>
                        <option value="personal">Personal</option>
                        <!-- Add more options as needed for other keys -->
                    </select>

                    <InputLabel class="mt-3" for="class" value="Class" />
                    <select
                        id="class"
                        v-model="form.class"
                        class="shadow appearance-none border rounded w-full mt-1 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    >
                        <option value="business">Business</option>
                        <option value="eco">Economy</option>
                        <option value="eco_plus">Economy Plus</option>
                        <!-- Add more options as needed for other keys -->
                    </select>

                    <InputLabel
                        class="mt-3"
                        for="flight_distance"
                        value="Flight Distance"
                    />
                    <TextInput
                        id="flight_distance"
                        type="number"
                        class="mt-1 block w-full"
                        v-model="form.flight_distance"
                        required
                    />

                    <InputLabel
                        class="mt-3"
                        for="departure_delay"
                        value="Departure Delay"
                    />
                    <TextInput
                        id="departure_delay"
                        type="number"
                        class="mt-1 block w-full"
                        v-model="form.departure_delay"
                        required
                    />

                    <InputLabel
                        class="mt-3"
                        for="arrival_delay"
                        value="Arrival Delay"
                    />
                    <TextInput
                        id="arrival_delay"
                        type="number"
                        class="mt-1 block w-full"
                        v-model="form.arrival_delay"
                        required
                    />

                    <InputLabel
                        class="mt-3"
                        for="departure_and_arrival_time_convenient"
                        value="Departure and Arrival Time Convenient"
                    />
                    <select
                        id="departure_and_arrival_time_convenient"
                        v-model="form.departure_and_arrival_time_convenient"
                        class="shadow appearance-none border rounded w-full mt-1 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    >
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3" selected>3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <!-- Add more options as needed for other keys -->
                    </select>

                    <InputLabel
                        class="mt-3"
                        for="ease_of_online_booking"
                        value="Ease of Online Booking"
                    />
                    <select
                        id="ease_of_online_booking"
                        v-model="form.ease_of_online_booking"
                        class="shadow appearance-none border rounded w-full mt-1 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    >
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3" selected>3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <!-- Add more options as needed for other keys -->
                    </select>

                    <InputLabel
                        class="mt-3"
                        for="check_in_service"
                        value="Check-in Service"
                    />
                    <select
                        id="check_in_service"
                        v-model="form.check_in_service"
                        class="shadow appearance-none border rounded w-full mt-1 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    >
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3" selected>3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <!-- Add more options as needed for other keys -->
                    </select>

                    <InputLabel
                        class="mt-3"
                        for="online_boarding"
                        value="Online Boarding"
                    />
                    <select
                        id="online_boarding"
                        v-model="form.online_boarding"
                        class="shadow appearance-none border rounded w-full mt-1 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    >
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3" selected>3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <!-- Add more options as needed for other keys -->
                    </select>

                    <InputLabel
                        class="mt-3"
                        for="gate_location"
                        value="Gate Location"
                    />
                    <select
                        id="gate_location"
                        v-model="form.gate_location"
                        class="shadow appearance-none border rounded w-full mt-1 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    >
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3" selected>3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <!-- Add more options as needed for other keys -->
                    </select>

                    <InputLabel
                        class="mt-3"
                        for="on_board_service"
                        value="On-board Service"
                    />
                    <select
                        id="on_board_service"
                        v-model="form.on_board_service"
                        class="shadow appearance-none border rounded w-full mt-1 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    >
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3" selected>3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <!-- Add more options as needed for other keys -->
                    </select>

                    <InputLabel
                        class="mt-3"
                        for="seat_comfort"
                        value="Seat Comfort"
                    />
                    <select
                        id="seat_comfort"
                        v-model="form.seat_comfort"
                        class="shadow appearance-none border rounded w-full mt-1 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    >
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3" selected>3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <!-- Add more options as needed for other keys -->
                    </select>

                    <InputLabel
                        class="mt-3"
                        for="leg_room_service"
                        value="Leg Room Service"
                    />
                    <select
                        id="leg_room_service"
                        v-model="form.leg_room_service"
                        class="shadow appearance-none border rounded w-full mt-1 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    >
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3" selected>3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <!-- Add more options as needed for other keys -->
                    </select>

                    <InputLabel
                        class="mt-3"
                        for="cleanliness"
                        value="Cleanliness"
                    />
                    <select
                        id="cleanliness"
                        v-model="form.cleanliness"
                        class="shadow appearance-none border rounded w-full mt-1 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    >
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3" selected>3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <!-- Add more options as needed for other keys -->
                    </select>

                    <InputLabel
                        class="mt-3"
                        for="food_and_drink"
                        value="Food and Drink"
                    />
                    <select
                        id="food_and_drink"
                        v-model="form.food_and_drink"
                        class="shadow appearance-none border rounded w-full mt-1 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    >
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3" selected>3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <!-- Add more options as needed for other keys -->
                    </select>

                    <InputLabel
                        class="mt-3"
                        for="in_flight_entertainment"
                        value="In-flight Entertainment"
                    />
                    <select
                        id="in_flight_entertainment"
                        v-model="form.in_flight_entertainment"
                        class="shadow appearance-none border rounded w-full mt-1 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    >
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3" selected>3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <!-- Add more options as needed for other keys -->
                    </select>

                    <InputLabel
                        class="mt-3"
                        for="baggage_handling"
                        value="Baggage Handling"
                    />
                    <select
                        id="baggage_handling"
                        v-model="form.baggage_handling"
                        class="shadow appearance-none border rounded w-full mt-1 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    >
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3" selected>3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <!-- Add more options as needed for other keys -->
                    </select>
                    <!-- Submit -->
                    <div class="text-right mt-3">
                        <PrimaryButton type="submit">Submit</PrimaryButton>
                    </div>
                </form>
            </div>
        </template>
    </QuestionnaireLayout>
</template>
