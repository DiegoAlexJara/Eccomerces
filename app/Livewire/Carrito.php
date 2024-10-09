<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Productos;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Carrito extends Component
{
    public $products;
    public $total;
    public function render()
    {
        $cart = Cart::where('user_id', auth()->id())->with('items.product')->first();
        return view('livewire.carrito', ['cart' => $cart]);
    }

    function delete($Id, $productId)
    {
        $Producto = Productos::find($productId);

        $cart = CartItem::find($Id);
        
        $Producto->stock += $cart->quantity;
        $Producto->save();

        $cart->delete();
        $this->render();
        Session::flash('message', 'Se elimino el producto del carrito');
    }
    function Disminuir($Id, $productId)
    {

        
        $Producto = Productos::find($productId);
        $Producto->stock += 1;
        $Producto->save();

        $cart = CartItem::find($Id);
        $cart->quantity -= 1;
        $cart->save();

        if($cart->quantity == 0) $cart->delete();
        $this->render();
    }
}
