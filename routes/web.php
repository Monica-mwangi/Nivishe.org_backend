<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VolunteerFormController;
use App\Http\Controllers\PartnershipFormController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\CommunityFormController; 


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::post('/volunteer-form', [VolunteerFormController::class, 'store']);
Route::post('/partnership-form', [PartnershipFormController::class, 'store']);
Route::post('/contact-form', [ContactFormController::class, 'store']);
Route::post('/community-form', [CommunityFormController::class, 'store']);

