<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import QuestionnaireLayout from "@/Layouts/QuestionnaireLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import axios from "../axios";
import { ref } from "vue";



const form = useForm({
    name: "",
    gender: null,
    age: null,
    customer_type: null,
    type_of_travel: null,
    class: null,
    flight_distance: null,
    depature_delay: null,
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
const success = ref(false);
const prediction = ref(null);

const submitForm = () => {
    form.post(route("questionnaire.store"), {
        onSuccess: (response) => {
            // Access the 'id' 
           let id = response.url.split("?id=")[1];
            /* Data Format */
            let GENDER = form.gender == 'male' ? 'Male' : 'Female';
            let CUSTOMER_TYPE = form.customer_type == 'first_time' ? 'First-time' : 'Returning';
            let TYPE_OF_TRAVEL = form.type_of_travel == 'business' ? 'Business' : 'Personal';
            let CLASS = form.class == 'business' ? 'Business' : form.class == 'economy' ? 'Economy' : 'Economy Plus';
            axios.post("https://548e-197-35-223-64.ngrok-free.app/predict", {
                'data': {
                    "ID": 123,
                    "Gender": GENDER,
                    "Age": form.age,
                    "Customer Type": CUSTOMER_TYPE,
                    "Type of Travel": TYPE_OF_TRAVEL,
                    "Class": CLASS,
                    "Flight Distance": Number(form.flight_distance),
                    "Departure Delay": Number(form.depature_delay),
                    "Arrival Delay": Number(form.arrival_delay),
                    "Departure and Arrival Time Convenience": form.departure_and_arrival_time_convenient,
                    "Ease of Online Booking": form.ease_of_online_booking,
                    "Check-in Service": form.check_in_service,
                    "Online Boarding": form.online_boarding,
                    "Gate Location": form.gate_location,
                    "On-board Service": form.on_board_service,
                    "Seat Comfort":   form.seat_comfort,
                    "Leg Room Service": form.leg_room_service,
                    "Cleanliness": form.cleanliness,
                    "Food and Drink": form.food_and_drink,
                    "In-flight Service": form.in_flight_entertainment,
                    "In-flight Wifi Service": form.in_flight_entertainment,
                    "In-flight Entertainment": form.in_flight_entertainment,
                    "Baggage Handling": form.baggage_handling,
                }
            }).then((response) => {
                prediction.value = response.data.prediction[0];
                //send the prediction to the backend to update the database
                axios.post("http://127.0.0.1:8000/api/update_prediction", {
                    'id': id,
                    'prediction': prediction.value
                });
            });
            success.value = true;
        },
    });
};

let p
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
            <div v-if="success" class="bg-green-100 border-l-4 border-green-400 p-4 rounded mb-4">
                <p class="text-lg text-green-700 font-medium">Prediction : {{ prediction }}</p>
            </div>

            <div class="max-w-7xl mx-auto bg-gray-200 mt-2 p-4 border rounded">
                <form @submit.prevent="submitForm">
                    <InputLabel class="mt-3" for="name" value="Your Name" />

                    <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus />

                    <InputLabel class="mt-3" for="age" value="Your Age" />

                    <TextInput id="age" type="number" class="mt-1 block w-full" v-model="form.age" required />

                    <InputLabel class="mt-3" for="gender" value="Gender" />
 
                    <select id="gender" v-model="form.gender" required
                        class="shadow appearance-none border rounded w-full mt-1 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>

                    <InputLabel class="mt-3" for="customer_type" value="Customer Type" />

                    <select id="customer_type" v-model="form.customer_type" required
                        class="shadow appearance-none border rounded w-full mt-1 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="first_time">First-time</option>
                        <option value="returning">Returning</option>
                        <!-- Add more options as needed for other keys -->
                    </select>

                    <InputLabel class="mt-3" for="type_of_travel" value="Type of Travel" />
                    <select id="type_of_travel" v-model="form.type_of_travel" required
                        class="shadow appearance-none border rounded w-full mt-1 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="business">Business</option>
                        <option value="personal">Personal</option>
                        <!-- Add more options as needed for other keys -->
                    </select>

                    <InputLabel class="mt-3" for="class" value="Class" />
                    <select id="class" v-model="form.class" required
                        class="shadow appearance-none border rounded w-full mt-1 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="business">Business</option>
                        <option value="economy">Economy</option>
                        <option value="economy_plus">Economy Plus</option>
                        <!-- Add more options as needed for other keys -->
                    </select>

                    <InputLabel class="mt-3" for="flight_distance" value="Flight Distance" />
                    <TextInput id="flight_distance" type="number" class="mt-1 block w-full" v-model="form.flight_distance"
                        required />

                    <InputLabel class="mt-3" for="departure_delay" value="Departure Delay" />
                    <TextInput id="departure_delay" type="number" class="mt-1 block w-full" v-model="form.depature_delay"
                        required />

                    <InputLabel class="mt-3" for="arrival_delay" value="Arrival Delay" />
                    <TextInput id="arrival_delay" type="number" class="mt-1 block w-full" v-model="form.arrival_delay"
                        required />

                    <InputLabel class="mt-3" for="departure_and_arrival_time_convenient"
                        value="Departure and Arrival Time Convenient" />
                    <select id="departure_and_arrival_time_convenient" required v-model="form.departure_and_arrival_time_convenient"
                        class="shadow appearance-none border rounded w-full mt-1 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="1">Very Dissatisfied</option>
                        <option value="2">Dissatisfied</option>
                        <option value="3">Neutral</option>
                        <option value="4">Satisfied</option>
                        <option value="5">Very Satisfied</option>
                        <!-- Add more options as needed for other keys -->
                    </select>

                    <InputLabel class="mt-3" for="ease_of_online_booking" value="Ease of Online Booking" />
                    <select id="ease_of_online_booking" required v-model="form.ease_of_online_booking"
                        class="shadow appearance-none border rounded w-full mt-1 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="1">Very Dissatisfied</option>
                        <option value="2">Dissatisfied</option>
                        <option value="3">Neutral</option>
                        <option value="4">Satisfied</option>
                        <option value="5">Very Satisfied</option>
                        <!-- Add more options as needed for other keys -->
                    </select>

                    <InputLabel class="mt-3" for="check_in_service" value="Check-in Service" />
                    <select id="check_in_service" required v-model="form.check_in_service"
                        class="shadow appearance-none border rounded w-full mt-1 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="1">Very Dissatisfied</option>
                        <option value="2">Dissatisfied</option>
                        <option value="3">Neutral</option>
                        <option value="4">Satisfied</option>
                        <option value="5">Very Satisfied</option>
                        <!-- Add more options as needed for other keys -->
                    </select>

                    <InputLabel class="mt-3" for="online_boarding" value="Online Boarding" />
                    <select id="online_boarding" required v-model="form.online_boarding"
                        class="shadow appearance-none border rounded w-full mt-1 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="1">Very Dissatisfied</option>
                        <option value="2">Dissatisfied</option>
                        <option value="3">Neutral</option>
                        <option value="4">Satisfied</option>
                        <option value="5">Very Satisfied</option>
                        <!-- Add more options as needed for other keys -->
                    </select>

                    <InputLabel class="mt-3" for="gate_location" value="Gate Location" />
                    <select id="gate_location" required v-model="form.gate_location"
                        class="shadow appearance-none border rounded w-full mt-1 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="1">Very Dissatisfied</option>
                        <option value="2">Dissatisfied</option>
                        <option value="3">Neutral</option>
                        <option value="4">Satisfied</option>
                        <option value="5">Very Satisfied</option>
                        <!-- Add more options as needed for other keys -->
                    </select>

                    <InputLabel class="mt-3" for="on_board_service" value="On-board Service" />
                    <select id="on_board_service" required v-model="form.on_board_service"
                        class="shadow appearance-none border rounded w-full mt-1 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="1">Very Dissatisfied</option>
                        <option value="2">Dissatisfied</option>
                        <option value="3">Neutral</option>
                        <option value="4">Satisfied</option>
                        <option value="5">Very Satisfied</option>
                        <!-- Add more options as needed for other keys -->
                    </select>

                    <InputLabel class="mt-3" for="seat_comfort" value="Seat Comfort" />
                    <select id="seat_comfort" required v-model="form.seat_comfort"
                        class="shadow appearance-none border rounded w-full mt-1 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="1">Very Dissatisfied</option>
                        <option value="2">Dissatisfied</option>
                        <option value="3">Neutral</option>
                        <option value="4">Satisfied</option>
                        <option value="5">Very Satisfied</option>
                        <!-- Add more options as needed for other keys -->
                    </select>

                    <InputLabel class="mt-3" for="leg_room_service" value="Leg Room Service" />
                    <select id="leg_room_service" required v-model="form.leg_room_service"
                        class="shadow appearance-none border rounded w-full mt-1 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="1">Very Dissatisfied</option>
                        <option value="2">Dissatisfied</option>
                        <option value="3">Neutral</option>
                        <option value="4">Satisfied</option>
                        <option value="5">Very Satisfied</option>
                        <!-- Add more options as needed for other keys -->
                    </select>

                    <InputLabel class="mt-3" for="cleanliness" value="Cleanliness" />
                    <select id="cleanliness" required v-model="form.cleanliness"
                        class="shadow appearance-none border rounded w-full mt-1 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="1">Very Dissatisfied</option>
                        <option value="2">Dissatisfied</option>
                        <option value="3">Neutral</option>
                        <option value="4">Satisfied</option>
                        <option value="5">Very Satisfied</option>
                        <!-- Add more options as needed for other keys -->
                    </select>

                    <InputLabel class="mt-3" for="food_and_drink" value="Food and Drink" />
                    <select id="food_and_drink" required v-model="form.food_and_drink"
                        class="shadow appearance-none border rounded w-full mt-1 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="1">Very Dissatisfied</option>
                        <option value="2">Dissatisfied</option>
                        <option value="3">Neutral</option>
                        <option value="4">Satisfied</option>
                        <option value="5">Very Satisfied</option>
                        <!-- Add more options as needed for other keys -->
                    </select>

                    <InputLabel class="mt-3" for="in_flight_entertainment" value="In-flight Entertainment" />
                    <select id="in_flight_entertainment" required v-model="form.in_flight_entertainment"
                        class="shadow appearance-none border rounded w-full mt-1 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="1">Very Dissatisfied</option>
                        <option value="2">Dissatisfied</option>
                        <option value="3">Neutral</option>
                        <option value="4">Satisfied</option>
                        <option value="5">Very Satisfied</option>
                        <!-- Add more options as needed for other keys -->
                    </select>

                    <InputLabel class="mt-3" for="baggage_handling" value="Baggage Handling" />
                    <select id="baggage_handling" required v-model="form.baggage_handling"
                        class="shadow appearance-none border rounded w-full mt-1 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="1">Very Dissatisfied</option>
                        <option value="2">Dissatisfied</option>
                        <option value="3">Neutral</option>
                        <option value="4">Satisfied</option>
                        <option value="5">Very Satisfied</option>
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
