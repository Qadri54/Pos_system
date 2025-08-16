<?php

namespace App\Services;

use App\Models\Outlet;
use App\Models\User;
use App\Models\user_outlet;
use Illuminate\Support\Facades\DB;

class Outlet_service {
    public function index() {
        try {
            DB::beginTransaction();
            $user = Outlet::with('users')->get();
            DB::commit();
            return $user;
        }catch(\Throwable $e){
            return ('Terjadi kesalahan saat mengambil data outlet');
        }
    }

    public function store($data, $userId) {
        try {
            DB::beginTransaction();
            $outlet = Outlet::create([
                "outlet_name" => $data['outlet_name'],
                "address" => $data['address'],
            ]);

            $outlet->users()->attach($userId);
            DB::commit();
            return $outlet;
        } catch (\Throwable $e) {
            DB::rollBack();
            // log error jika perlu
            throw new \Exception($e->getMessage());
        }
    }
}

