<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartnershipFormController;
use App\Http\Controllers\CommunityFormController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\VolunteerFormController;
use App\Http\Controllers\ComicBookViewController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/partnership-form', [PartnershipFormController::class, 'store']);
Route::post('/community-form', [CommunityFormController::class, 'store']);
Route::post('/contact-form', [ContactFormController::class, 'store']);
Route::post('/volunteer-form', [VolunteerFormController::class, 'store']);
Route::get('/comic-book-views', [ComicBookViewController::class, 'index']);
Route::post('/comic-book-view', [ComicBookViewController::class, 'increment']);