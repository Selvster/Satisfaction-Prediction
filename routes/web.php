<?php

use App\Http\Controllers\ProfileController;
use App\Models\Predictions;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    $predictions = Predictions::all();
    return Inertia::render('Dashboard', ['predictions' => $predictions]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/Questionnaire', function () {
    return Inertia::render('Questionnaire');
})->name('questionnaire');

Route::post('/Questionnaire', function (Request $request) {
    $prediction = Predictions::create($request->all());
    //return id of the created prediction
    $id = $prediction->id;
    return redirect()->route('questionnaire', ['id' => $id]);
})->name('questionnaire.store');




require __DIR__.'/auth.php';
