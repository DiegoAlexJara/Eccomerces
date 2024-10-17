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
        $this->image = null;
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
            'image' => 'image|mimes:jpg,png', // Validar la nueva imagen
        ]);
        // Validar si existe una imagen subida
        if ($this->image) {
            // Generar un nombre único para la nueva imagen
            $newImageName = time() . '.' . $this->image->getClientOriginalExtension();

            // Almacenar temporalmente en 'storage/app/public/temp'
            $tempPath = $this->image->storeAs('temp', $newImageName, 'public');

            // Ruta completa del archivo en el sistema de almacenamiento
            $absoluteTempPath = storage_path('app/public/' . $tempPath);

            // Mover la imagen desde 'storage/app/public/temp' a 'public/images'
            if (file_exists($absoluteTempPath)) {
                if (rename($absoluteTempPath, public_path('images/' . $newImageName))) {
                    // Eliminar la imagen anterior si existe
                    if ($this->oldImage) {
                        $this->deleteOldImage();
                    }

                    // Actualizar la ruta en el modelo
                    $this->IdUser->path = 'images/' . $newImageName;
                    $this->IdUser->save();
                    $this->oldImage = 'images/'.$newImageName;

                    session()->flash('success', 'Imagen subida y actualizada correctamente.');
                    $this->render();
                } else {
                    session()->flash('error', 'No se pudo mover la nueva imagen.');
                    $this->render();
                }
            } else {
                session()->flash('error', 'No se encontró el archivo temporal.');
                $this->render();
            }
        } else {
            session()->flash('error', 'No se seleccionó ninguna imagen.');
            $this->render();
        }
        $this->image = null;
        $this->showSquare = false; 

    }
    public function deleteOldImage()
    {
        // Obtener la ruta absoluta de la imagen anterior
        $oldImagePath = public_path($this->oldImage);

        if (file_exists($oldImagePath)) {
            try {
                unlink($oldImagePath); // Eliminar la imagen anterior
            } catch (\Exception $e) {
                session()->flash('error', 'Error al eliminar la imagen: ' . $e->getMessage());
            }
        } else {
            session()->flash('error', 'La imagen anterior no existe: ' . $this->oldImage);
        }
    }
}
