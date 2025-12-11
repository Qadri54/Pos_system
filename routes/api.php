<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/notification', function (Request $request) {
    $payload = $request->all();
    return response()->json([
        'message' => 'Notification received successfully',
        'payload' => $payload
    ], 200);
});
