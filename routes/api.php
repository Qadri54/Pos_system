<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/notification', function (Request $request) {
    $raw = $request->getContent(); // RAW JSON
    \Log::info("RAW:", [$raw]);

    return response()->json([
        'success' => true,
        'raw' => $raw,
    ]);
});
