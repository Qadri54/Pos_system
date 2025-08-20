<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\Outlet;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return view('orders.index');
    }

    public function ongoing() {
        return view('orders.OnGoingOrder');
    }

    public function completed() {
        $orders = Order::where('status', 'completed')->get();
        return view('orders.CompletedOrder', compact('orders'));
    }

    public function canceled() {
        $orders = Order::where('status', 'canceled')->get();
        return view('orders.CancelledOrder', compact('orders'));
    }


    public function invoice($orderId) {
        $order = Order::with(['products', 'outlet'])->findOrFail($orderId);

        $data = $order->products->map(function ($product) {
            return [
                'name' => $product->product_name,
                'price' => $product->price,
                'quantity' => $product->pivot->quantity,
                'subtotal' => $product->pivot->sub_total
            ];
        })->toArray();

        $total_price = $order->total_price;
        $date = $order->created_at->format('d-m-Y');
        $customer_name = $order->customer_name;
        $payment_method = ucfirst($order->payment_method);

        if ($order->outlet) {
            $selected_outlet = $order->outlet->outlet_name;
            $address = $order->outlet->address;
        } else {
            $selected_outlet = 'Takeaway';
            $address = 'N/A';
        }

        $html = view('invoice', compact('data', 'total_price', 'selected_outlet', 'address', 'date', 'customer_name', 'payment_method', 'order'))->render();

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);

        $mpdf->Output('invoice-' . $order->id . '.pdf', \Mpdf\Output\Destination::DOWNLOAD);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }
}
