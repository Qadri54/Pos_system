<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Outlet;
use App\Models\Product;
use App\Models\Product_order;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Total Orders
        $totalOrders = Order::count();

        // Total Employees (Users)
        $totalEmployees = User::count();

        // Total Revenue
        $totalRevenue = Order::where('status', 'done')->sum('total_price') ?? 0;

        // Total Products
        $totalProducts = Product::with('outlet')
        ->whereHas('outlet', function ($query) {
            $query->whereHas('users', function($query) {
                $query->where('user_outlet.user_id', auth()->user()->id);
            });
        })
        ->count();

        // Total Outlets
        $totalOutlets = Outlet::count();

        // Most Popular Products (Top 5)
        $popularProducts = Product::select('products.*',
                DB::raw('SUM(product_order.quantity) as total_quantity'),
                DB::raw('products.price as product_price'))
            ->join('product_order', 'products.id', '=', 'product_order.product_id')
            ->join('orders', 'product_order.order_id', '=', 'orders.id')
            ->where('orders.status', 'completed')
            ->groupBy('products.id', 'products.product_name', 'products.price', 'products.category_id', 'products.image', 'products.created_at', 'products.updated_at')
            ->orderBy('total_quantity', 'desc')
            ->limit(5)
            ->get();

        // Recent Orders (Last 10)
        $recentOrders = Order::with('outlet')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        // Chart Data - Sales for last 7 days
        $chartLabels = [];
        $chartData = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $chartLabels[] = $date->format('M d');

            $dayRevenue = Order::where('status', 'completed')
                ->whereDate('created_at', $date->format('Y-m-d'))
                ->sum('total_price') ?? 0;

            $chartData[] = $dayRevenue;
        }

        return view('dashboard', compact(
            'totalOrders',
            'totalEmployees',
            'totalRevenue',
            'totalOutlets',
            'popularProducts',
            'recentOrders',
            'chartLabels',
            'chartData',
            'totalProducts'
        ));
    }
}
