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
    public $model;


    public function toggleSquare()
    {
        $this->showSquare = !$this->showSquare;
    }

    public function mount()
    {
        $Model = 'Productos';
        // $this->IdImage = $IdImage;
        $this->IdUser = $this->model::find($this->IdUser);
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
            'image' => 'image|mimes:jpg,png|max:1024', // Validar la nueva imagen
        ]);
        if ($this->oldImage) {
            // Asegurarte de que la ruta no esté vacía y exista
            if (Storage::disk('public')->exists($this->oldImage)) {
                Storage::disk('public')->delete($this->oldImage);
            } else {
                // Aquí puedes agregar un log o un mensaje de error para la depuración
                
            }
        }
        $originalName = pathinfo($this->image->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $this->image->getClientOriginalExtension();

        // Generar un nombre único para evitar conflictos
        $newImageName = $originalName .  '.' . $extension;

        // Guardar la nueva imagen y actualizar la propiedad de la imagen existente
        $this->oldImage = $this->image->storeAs('images', $newImageName, 'public');

        $this->IdUser->path = $this->oldImage;
        $this->IdUser->save();

        // Limpiar la propiedad de la nueva imagen
        $this->image = null;

        $this->showSquare = false;
    }
}
