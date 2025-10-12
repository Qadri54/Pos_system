<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;
use App\Models\user_outlet;
use App\Models\User;
use App\Services\Outlet_service;

class OutletController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $outlets = Outlet::whereHas("users", function ($query) {
            $query->where("user_outlet.user_id", auth()->user()->id);
        })->get();

        return view('outlet.index', compact('outlets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $users = User::where("user_id", auth()->user()->id)->get();
        return view('outlet.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            "outlet_name" => "required|string|max:255",
            "address" => "required|string|max:500",
        ]);

        $outlet = new Outlet_service();
        $outlet->store($request->all(), auth()->user()->id);
        return redirect()->route('outlets.index')->with('success', 'Outlet berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Outlet $outlet) {
        $users = User::all();
        return view('outlet.edit', compact('outlet', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Outlet $outlet) {
        $request->validate([
            'outlet_name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'users' => 'nullable|array',
            'users.*' => 'exists:users,id'
        ]);

        // Update outlet data
        $outlet->update([
            'outlet_name' => $request->outlet_name,
            'address' => $request->address,
        ]);

        // Sync users (this will remove old relationships and add new ones)
        if ($request->has('users')) {
            $outlet->users()->sync($request->users);
        } else {
            $outlet->users()->detach();
        }

        return redirect()->route('outlets.index')->with('success', 'Outlet berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Outlet $outlet) {
        try {
            // Detach all users from the outlet first
            $outlet->users()->detach();

            // Delete the outlet
            $outlet->delete();

            return redirect()->route('outlets.index')->with('success', 'Outlet berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('outlets.index')->with('error', 'Gagal menghapus outlet. Pastikan tidak ada data yang terkait.');
        }
    }
}
