<?php

namespace App\Livewire;

use App\Models\Productos;
use Livewire\Component;

class Search extends Component
{
    public $query = '';
    // public $query = $products = Productos::where('name', 'like', "%$query%")->paginate(20);
    public function render()
    {
        return view('livewire.search');
    }
}
