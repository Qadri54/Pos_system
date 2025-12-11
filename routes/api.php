<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/notification', function (Request $request) {
    \Log::info('Midtrans Notification:', $request->all());
    return response()->json(['message' => 'ok']);
});
