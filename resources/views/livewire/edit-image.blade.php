<div>
    <style>
        .overlay-square {
            padding: 10px;
            position: fixed;
            top: 50%;
            left: 50%;
            width: 60%;
            /* height: 60%; */
            background-color: white;
            box-shadow: 0 0 10px 5px rgba(0, 0, 0, 0.5);
            z-index: 9999;
            /* Asegura que esté por encima de todo */
            transform: translate(-50%, -50%);
            /* Centra el cuadrado */
            /* Si quieres que cubra toda la pantalla, cambia las dimensiones y posición */
        }
    </style>

    IMAGEN
    <button class="btn btn-success" wire:click="toggleSquare">MODIFICAR</button>
    @if ($showSquare)
        <div class="overlay-square">
            <p>IMAGEN VIEJA</p>
            <img src="{{ asset('storage/' . $oldImage) }}" alt="Image" style="width: 100px; height: auto; margin 0 0 20px 0">

            <p>NUEVA IMAGEN</p>
            <input type="file" wire:model="image">
            @if ($image)
                <div class="mt-4">
                    <p>Previsualización de la imagen seleccionada:</p>
                    <img src="{{ $image->temporaryUrl() }}" alt="Imagen seleccionada" style="max-width: 300px;">
                </div>
            @endif
            <p>@error('image') <span class="error">{{ $message }}</span> @enderror</p>
            <p><button wire:click="updateImage" class="btn btn-success">ACTUALIZAR</button></p>
            {{-- <p></p> --}}
            <button wire:click="toggleSquare" class="btn btn-warning">CANCELAR</button>
        </div>
    @endif
</div>
