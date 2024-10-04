<?php

namespace App\Livewire;

use App\Models\Productos;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

use function Laravel\Prompts\error;

class EditImage extends Component
{
    // use WithFileUploads;
    use WithFileUploads;

    public $oldImage;
    public $showSquare = false;
    public $image;
    public $IdUser;

    public function toggleSquare()
    {
        $this->showSquare = !$this->showSquare;
    }
    public function mount($IdUser)
    {
        // $this->IdImage = $IdImage;
        $this->IdUser = Productos::find($IdUser);
        $this->oldImage = $this->IdUser->path;
        // $this->IdUser = $IdUser;
    }
    public function render()
    {
        return view('livewire.edit-image');
    }
    public function updateImage()
    {
        $this->validate([
            'image' => 'image|max:1024', // Validar la nueva imagen
        ]);
        if ($this->oldImage && Storage::disk('public')->exists($this->oldImage)) {
            Storage::disk('public')->delete($this->oldImage);
        }


        // Guardar la nueva imagen y actualizar la propiedad de la imagen existente
        $this->oldImage = $this->image->store('images', 'public');

        $this->IdUser->path = $this->oldImage;
        $this->IdUser->save();

        // Limpiar la propiedad de la nueva imagen
        $this->image = null;

        $this->showSquare = false;
    }
}
