<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Predictions extends Model
{
    use HasFactory;
    protected $table = 'predictions';
    protected $fillable = [
        'name','age','gender','customer_type','type_of_travel','class','flight_distance','depature_delay','arrival_delay','depature_and_arrival_time_convenient','ease_of_online_booking','check_in_service','online_boarding','gate_location','on_board_service','seat_comfort','leg_room_service','cleanliness','food_and_drink','in_flight_entertainment','baggage_handling','prediction'
    ];
   

}
