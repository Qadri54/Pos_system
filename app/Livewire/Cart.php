<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Product;

class Cart extends Component {
    public $products;
    
    public function mount() {
        $this->products = Product::select('id', 'product_name', 'price', 'image', 'category_id')->with('category:id,name')
            ->whereHas('category.outlet.users', function ($q) {
                $q->where('user_outlet.user_id', auth()->user()->id);
            })->get();
    }

    public function addCart($itemId) {
        $product = collect($this->products)->firstWhere('id', $itemId);
        $this->dispatch('cart.added', data: $product);
    }

    public function render() {
        return view('livewire.cart');
    }
}
