<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Outlet;
use Illuminate\Support\Facades\DB;

class UserController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $users = User::where('user_id', auth()->user()->id)->with('outlets')->get();
        return view('karyawan.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {

        $outlets = Outlet::select('id', 'outlet_name')
            ->whereHas('users', function ($query) {
                $query->where('user_outlet.user_id', auth()->user()->id);
            })->get();

        return view('karyawan.create', compact('outlets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {

        DB::beginTransaction();

        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'owner' => 'required',
                'outlet_id' => 'required'
            ]);

            $user = User::create([
                'user_id' => $request->owner,
                'name' => $request->name,
                'role' => 'kasir',
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $user->outlets()->attach($request->outlet_id);

            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'error' => 'Terjadi kesalahan saat menambahkan karyawan'
            ]);
        }

        return redirect()->route('users.index')->with('success', 'Karyawan berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        $user = User::findOrFail($id);
        return view('karyawan.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {

        DB::beginTransaction();

        try {

            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'nullable'
            ]);

            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->email = $request->email;

            if ($request->password) {
                $user->password = Hash::make($request->password);
            }

            $user->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data karyawan');
        }
        return redirect()->route('users.index')->with('success', 'Karyawan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        $user = User::findOrFail($id);
        $user->outlets()->detach(); // Detach outlets before deleting the user
        $user->delete();

        return redirect()->back()->with('success', 'Karyawan berhasil dihapus');
    }
}
