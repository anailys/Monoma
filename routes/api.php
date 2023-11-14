<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LeadController;

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

//Routes

Route::post('/auth', [AuthController::class, 'authenticate']);

// Protected routes
Route::middleware(['jwt'])->group(function () {
    Route::post('/lead', [LeadController::class, 'createLead']);
    Route::get('/lead/{id}', [LeadController::class, 'getLead']);
    Route::get('/leads', [LeadController::class, 'getAllLeads']);
});

