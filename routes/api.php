<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Services\Notification;
use App\Http\Controllers\NotificationController;

Route::post('/notification', function (Request $request) {
    $raw = $request->getContent(); // RAW JSON
    \Log::info("RAW:", [$raw]);
    $notfication = new Notification();
    $notfication->getNotification($raw);
    return response()->json([
        'success' => true,
        'raw' => $raw,
    ]);
});


Route::get('/notification/{payload}', [NotificationController::class, 'getNotification'])->name('notification');
