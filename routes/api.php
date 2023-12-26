<?php

use App\Models\Predictions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('update_prediction',function(Request $request){
    $prediction = Predictions::find($request->id);
    $prediction_value = $request->prediction == 'Neutral or Dissatisfied' ? 'neutral_or_dissatisfied' : 'satisfied';
    $prediction->prediction = $prediction_value;
    $prediction->save();
    return response()->json(['success' => 'Prediction Updated Successfully']);
});
