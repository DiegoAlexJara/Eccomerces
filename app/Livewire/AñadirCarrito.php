<?php

namespace App\Livewire;

use App\Models\Productos;
use Livewire\Component;

class AñadirCarrito extends Component
{
    public $showSquare;
    public $producId;
    public $producStock;
    public $stock = 1;
    public function mount($producId)
    {
        $producto = Productos::find($producId);
        $this->producStock = $producto->stock;
    }
    public function toggleSquare()
    {
        $this->showSquare = !$this->showSquare;
    }
    public function render()
    {
        if ($this->stock >  $this->producStock) $this->stock = $this->producStock;
        if ($this->stock < 0) $this->stock = 1;
        return view('livewire.añadir-carrito');
    }
}
