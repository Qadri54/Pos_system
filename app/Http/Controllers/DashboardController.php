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

class DashboardController extends Controller {
    public function index() {
        // Total Orders
        $totalOrders = Order::count();

        // Total Employees (Users)
        $totalEmployees = User::where('user_id', auth()->user()->id)->count();

        // Total Revenue (from completed orders)
        $totalRevenue = Order::whereHas('outlet', function ($query) {
            $query->whereHas('users', function ($query) {
                $query->where('user_outlet.user_id', auth()->user()->id);
            });
        })->where('status', 'done')->sum('total_price') ?? 0;

        // Total Products
        $totalProducts = Product::with('outlet')
            ->whereHas('outlet', function ($query) {
                $query->whereHas('users', function ($query) {
                    $query->where('user_outlet.user_id', auth()->user()->id);
                });
            })
            ->count() ?? 0;

        // Total Outlets
        $totalOutlets = Outlet::whereHas('users', function ($query) {
            $query->where('user_outlet.user_id', auth()->user()->id);
        })->count() ?? 0;

        // Orders by Status
        $ongoingOrders = Order::whereHas('outlet', function ($query) {
            $query->whereHas('users', function ($query) {
                $query->where('user_outlet.user_id', auth()->user()->id);
            });
        })->where('status', 'on process')->count();
        $completedOrders = Order::whereHas('outlet', function ($query) {
            $query->whereHas('users', function ($query) {
                $query->where('user_outlet.user_id', auth()->user()->id);
            });
        })->where('status', 'done')->count();
        $canceledOrders = Order::whereHas('outlet', function ($query) {
            $query->whereHas('users', function ($query) {
                $query->where('user_outlet.user_id', auth()->user()->id);
            });
        })->where('status', 'canceled')->count();

        // Today's Orders
        $todayOrders = Order::whereHas('outlet', function ($query) {
            $query->whereHas('users', function ($query) {
                $query->where('user_outlet.user_id', auth()->user()->id);
            });
        })->whereDate('created_at', Carbon::today())->count();

        return view('dashboard', compact(
            'totalOrders',
            'totalEmployees',
            'totalRevenue',
            'totalOutlets',
            'totalProducts',
            'ongoingOrders',
            'completedOrders',
            'canceledOrders',
            'todayOrders',
        ));
    }
}
