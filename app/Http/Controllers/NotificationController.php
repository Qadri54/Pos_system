<?php

namespace App\Services;

use Illuminate\Http\Request;

class NotificationController {
    public function getNotification(Request $payload) {
        return response()->json([
            'success' => true,
            'payload' => $payload,
        ]);
    }
}
