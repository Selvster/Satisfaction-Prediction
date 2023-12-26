<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('predictions',function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->enum('gender',['male','female']);
            $table->enum('customer_type',['first_time','returning']);
            $table->enum('type_of_travel',['business','personal']);
            $table->enum('class',['business','economy','economy_plus']);
            $table->integer('flight_distance');
            $table->integer('depature_delay');
            $table->integer('arrival_delay');
            $table->enum('depature_and_arrival_time_convenient',[
                'very_dissatisfied','dissatisfied','neutral','satisfied','very_satisfied'
            ]);
            $table->enum('ease_of_online_booking',[
                'very_dissatisfied','dissatisfied','neutral','satisfied','very_satisfied'
            ]);
            $table->enum('check_in_service',[
                'very_dissatisfied','dissatisfied','neutral','satisfied','very_satisfied'
            ]);
            $table->enum('online_boarding',[
                'very_dissatisfied','dissatisfied','neutral','satisfied','very_satisfied'
            ]);
            $table->enum('gate_location',[
                'very_dissatisfied','dissatisfied','neutral','satisfied','very_satisfied'
            ]);
            $table->enum('on_board_service',[
                'very_dissatisfied','dissatisfied','neutral','satisfied','very_satisfied'
            ]);
            $table->enum('seat_comfort',[
                'very_dissatisfied','dissatisfied','neutral','satisfied','very_satisfied'
            ]);
            $table->enum('leg_room_service',[
                'very_dissatisfied','dissatisfied','neutral','satisfied','very_satisfied'
            ]);
            $table->enum('cleanliness',[
                'very_dissatisfied','dissatisfied','neutral','satisfied','very_satisfied'
            ]);
            $table->enum('food_and_drink',[
                'very_dissatisfied','dissatisfied','neutral','satisfied','very_satisfied'
            ]);
            $table->enum('in_flight_entertainment',[
                'very_dissatisfied','dissatisfied','neutral','satisfied','very_satisfied'
            ]);
            $table->enum('baggage_handling',[
                'very_dissatisfied','dissatisfied','neutral','satisfied','very_satisfied'
            ]);
            $table->enum('prediction',[
                'satisfied','neutral_or_dissatisfied'
            ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('predictions');
    }
};
