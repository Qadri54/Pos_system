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


    public function invoice(Request $request) {
        $data = json_decode($request->data, true);
        $total_price = $request["total_price"];
        $date = now()->format('d-m-Y');
        if($request["selected_outlet"]) {
            $selected_outlet = Outlet::find($request["selected_outlet"])->outlet_name;
            $address = Outlet::find($request["selected_outlet"])->address;
        } else {
            $selected_outlet = 'N/A';
            $address = 'N/A';
        }
        $html = view('invoice', compact('data', 'total_price', 'selected_outlet', 'address', 'date'))->render();

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);

        $mpdf->Output('invoice.pdf', \Mpdf\Output\Destination::DOWNLOAD);
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
