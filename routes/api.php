<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/notification', function (Request $request) {
    $raw = $request->getContent(); // RAW JSON
    \Log::info("RAW:", [$raw]);
    file_put_contents(storage_path('app/latest_midtrans.json'), json_encode($request->all(), JSON_PRETTY_PRINT));
    return response()->json([
        'success' => true,
        'raw' => $raw,
    ]);
});


Route::get('/notification/view', function () {
    $path = storage_path('app/latest_midtrans.json');

    if (!file_exists($path)) {
        return response()->json(['message' => 'No notification received yet']);
    }

    return response()->json(json_decode(file_get_contents($path), true));
});
