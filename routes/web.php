<?php

use App\Http\Controllers\WebhookController;
use Illuminate\Support\Facades\Route;

Route::get('/webhook', [WebhookController::class, 'showForm'])->name('webhook.form');
Route::post('/webhook', [WebhookController::class, 'submitForm'])->name('webhook.submit');