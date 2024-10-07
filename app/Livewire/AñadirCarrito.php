<?php

namespace App\Livewire;

use Livewire\Component;

class AñadirCarrito extends Component
{
    public $showSquare;
    public function toggleSquare()
    {
        $this->showSquare = !$this->showSquare;
    }
    public function render()
    {
        return view('livewire.añadir-carrito');
    }
}
