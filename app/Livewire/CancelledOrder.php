<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;

class CancelledOrder extends Component {
    public $orders;
    public $order_id = '';

    public function mount() {
        $this->orders = Order::where('status', 'canceled')
            ->whereHas('outlet.users', function ($query) {
                $query->where('user_outlet.user_id', auth()->user()->id);
            })
            ->get();
    }
    public function render() {
        return view('livewire.cancelled-order');
    }
}
