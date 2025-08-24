<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Ramsey\Uuid\Type\Integer;
use App\Models\Product;
use App\Models\Category;
use App\Models\Outlet;

class ProductController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $products = Product::whereHas('outlet', function ($query) {
            $query->whereHas('users', function ($query) {
                $query->where('user_outlet.user_id', auth()->user()->id);
            });
        })->get();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {

        \DB::beginTransaction();
        try {

            $categories = Category::with('outlet')->select("id", "name","outlet_id")->get();
            $outlets = Outlet::select("id", "outlet_name")->whereHas("users", function ($query) {
                $query->where("user_outlet.user_id", Auth()->user()->id);
            })->get();

            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            throw $e;
        }

        return view('products.create', compact('categories', 'outlets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp,gif|max:3048',
            'outlet_id' => 'required|exists:outlets,id',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            // Dapatkan ekstensi file
            $extension = $file->getClientOriginalExtension();

            // Buat nama unik (bisa pakai time(), uniqid(), atau Str::uuid())
            $filename = Str::uuid() . '.' . $extension;

            // Simpan file dengan nama baru
            $file->storeAs('images', $filename, 'public');
        }

        \DB::beginTransaction();
        try {
            $product = Product::create([
                'product_name' => $request->input('name'),
                'price' => $request->input('price'),
                'image' => $filename,
                'category_id' => $request->input('category_id'),
            ]);

            $product->outlet()->attach($request->input('outlet_id'));

            \DB::commit();

            return redirect()->back()->with('success', 'Product created successfully.');
        } catch (\Exception $e) {
            \DB::rollBack();
            return redirect()->back()->with('error', 'Failed to create product.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        $product = Product::with('category', 'outlet')->findOrFail($id);
        $categories = Category::select("id", "name")->get();
        $outlets = Outlet::select("id", "outlet_name")->whereHas("users", function ($query) {
            $query->where("user_outlet.user_id", Auth()->user()->id);
        })->get();

        return view('products.edit', compact('product', 'categories', 'outlets'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
            'outlet_id' => 'required|exists:outlets,id',
        ]);

        $product = Product::findOrFail($id);

        if ($product->image) {
            \Storage::disk('public')->delete('images/' . $product->image);
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            // Dapatkan ekstensi file
            $extension = $file->getClientOriginalExtension();

            // Buat nama unik (bisa pakai time(), uniqid(), atau Str::uuid())
            $filename = Str::uuid() . '.' . $extension;

            // Simpan file dengan nama baru
            $file->storeAs('images', $filename, 'public');

            $product->image = $filename;
        }

        $product->update([
            'product_name' => $request->input('name'),
            'price' => $request->input('price'),
            'category_id' => $request->input('category_id'),
        ]);


        $product->outlet()->sync($request->input('outlet_id'));

        return redirect()->back()->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        \DB::beginTransaction();
        try {
            $product = Product::findOrFail($id);
            $product->outlet()->detach();
            $product->delete();

            // Hapus image dari folder storage
            if ($product->image) {
                \Storage::disk('public')->delete('images/' . $product->image);
            }

            \DB::commit();
            return redirect()->back()->with('success', 'Product deleted successfully.');
        } catch (\Exception $e) {
            \DB::rollBack();
            return redirect()->back()->with('error', 'Failed to delete product.');
        }
    }
    public function statistic(string $id) {

    }
}
