<?php


use App\Http\Controllers\CognitoFormController;
use Illuminate\Support\Facades\Route;

// routes/api.php
Route::post('/webhook/cognito-form', [CognitoFormController::class, 'handleWebhook']);
