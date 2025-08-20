<?php

namespace App\Livewire;

use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Outlet;
use App\Models\Order;
use Mpdf\Mpdf;
use App\Models\User;

class CartSummary extends Component {
    public $data = [];
    public $outlets = [];
    public $selected_outlet = '';
    public $customer_name = '';
    public $payment_method = '';
    public $total = 0;

    protected $rules = [
        'selected_outlet' => 'required|exists:outlets,id',
        'customer_name' => 'required|string|max:255',
        'payment_method' => 'required|in:cash,qris',
    ];

    public function mount() {
        $this->outlets = Outlet::with('users:id')
            ->whereHas('users', function ($query) {
                $query->where('user_outlet.user_id', auth()->user()->id);
            })->get();
    }

    public function remove($id) {
        foreach ($this->data as $index => $item) {
            if ((string) $item['id'] == (string) $id) {
                $this->total -= $item['subtotal'];
                unset($this->data[$index]);
                break;
            }
        }
        $this->data = array_values($this->data); // Re-index the array
    }

    #[On('cart.added')]
    public function onCartAdded($data) {
        foreach ($this->data as $index => $item) {
            if ($item['id'] === $data['id']) {
                $this->data[$index]['quantity']++;
                $this->data[$index]['subtotal'] = $this->data[$index]['price'] * $this->data[$index]['quantity'];
                $this->total += $data['price'];
                return;
            }
        }

        $this->data[] = [
            'id' => $data['id'],
            'product_name' => $data['product_name'],
            'price' => $data['price'],
            'subtotal' => $data['price'] * 1, // Initialize subtotal
            'quantity' => 1,
        ];
        $this->total += $data['price'];
    }

    public function checkout() {
        $this->validate();

        DB::beginTransaction();
        try {
            $order = Order::create([
                'outlet_id' => $this->selected_outlet,
                'customer_name' => $this->customer_name,
                'payment_method' => $this->payment_method,
                'status' => 'on process',
                'total_price' => $this->total,
            ]);

            foreach ($this->data as $item) {
                $order->products()->attach($item['id'], [
                    'quantity' => $item['quantity'],
                    'sub_total' => $item['subtotal']
                ]);
            }

            DB::commit();

            session()->flash('success', 'Order berhasil dibuat.');

            $this->dispatch('redirect-to-invoice' , ['order_id' => $order->id]);
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'Gagal membuat order: ' . $e->getMessage());
        }
    }

    public function render() {
        return view('livewire.cart-summary');
    }
}
