<?php

namespace App\Livewire;

use App\Models\Productos;
use Livewire\Component;

class UnidadesDeProductos extends Component
{
    public $productId;
    public $CantidadOld;

    public function render()
    {
        if ($this->productId) {
            // Buscar el producto por su ID
            $producto = Productos::find($this->productId);

            // Si el producto existe, asignamos su stock
            if ($producto) {
                $this->CantidadOld = $producto->stock;
            } else {
                $this->CantidadOld = 'Producto no encontrado';
            }
        }

        return view('livewire.unidades-de-productos');
    }
    function desincrementrar()
    {

        $producto = Productos::find($this->productId);

        if ($producto) {
            if ($producto->stock > 0) {
                // Descontar una unidad del stock
                $producto->stock -= 1;
                // Guardar los cambios en la base de datos
                $producto->save();
            } else {
                session()->flash('message', 'Stock insuficiente');
            }
        }
    }
    function incrementar()
    {

        $producto = Productos::find($this->productId);

        if ($producto) {
            // Incrementar el stock en 1
            $producto->stock += 1;
            // Guardar los cambios en la base de datos
            $producto->save();
        }
    }
}
