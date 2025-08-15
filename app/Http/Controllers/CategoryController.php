<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Outlet;

class CategoryController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $categories = Category::select("id","outlet_id", "name")
            ->whereHas("outlet", function ($query) {
                $query->whereHas("users", function ($query) {
                    $query->where("users.id", auth()->id());
                });
            })->with('outlet:id,outlet_name') // pastikan nama relasi di model Category adalah outlet()
            ->get();

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {

        $Outlets = Outlet::select("id", "outlet_name")
            ->whereHas("users", function ($query) {
                $query->where("user_outlet.user_id", auth()->user()->id);
            })->get();

        return view('categories.create', compact('Outlets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        // Validate and store the category

        DB::beginTransaction();

        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'outlet_id' => 'required|exists:outlets,id',
            ]);

            Category::create($request->all());
            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to create category.');
        }

        return redirect()->back()->with('success', 'Category created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        $Category = Category::findOrFail($id);
        $Outlets = Outlet::select("id", "outlet_name")
            ->whereHas("users", function ($query) {
                $query->where("user_outlet.user_id", auth()->user()->id);
            })->get();

        return view('categories.edit', compact('Category', 'Outlets'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        $Category = Category::findOrFail($id);

        DB::beginTransaction();

        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'outlet_id' => 'required|exists:outlets,id',
            ]);

            $Category->update($request->all());
            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to update category.');
        }

        return redirect()->back()->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        DB::beginTransaction();
        try {
            Category::where('id', $id)->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Category Failed to delete category.');
        }
        return redirect()->back()->with('success', 'Category deleted successfully.');
    }
}
