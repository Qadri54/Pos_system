<?php

namespace App\Services;

class Notification {
    public function getNotification($payload) {
        return redirect()->route('notification', ['payload' => $payload]);
    }
}
