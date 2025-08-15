<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\Outlet;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class OnGoingOrder extends Component {

    public $orders;
    public $order_id = '';
    public $status = '';

    public function mount() {
        $this->orders = Order::where('status', 'on process')
        ->whereHas('outlet.users', function ($query) {
            $query->where('user_outlet.user_id', auth()->user()->id);
        })
        ->get();
    }

    public function updateStatus($orderId, $status) {
        DB::beginTransaction();
        try {
            $order = Order::find($orderId);
            $order->status = $status;
            $order->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        return redirect()->route('orders.ongoing')->with('success', 'Order status updated successfully.');
    }



    public function render() {
        return view('livewire.on-going-order');
    }
}
