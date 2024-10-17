<div>
    <style>
        .overlay-square {
            padding: 10px;
            position: fixed;
            top: 50%;
            left: 50%;
            width: 60%;
            height: auto;
            background-color: white;
            box-shadow: 0 0 15px 5px rgba(0, 0, 0, 0.5);
            z-index: 9999;
            /* Asegura que esté por encima de todo */
            transform: translate(-50%, -50%);
            /* Centra el cuadrado */
            /* Si quieres que cubra toda la pantalla, cambia las dimensiones y posición */
        }
    </style>

    @if ($oldImage)
        <img src="{{ asset($oldImage) }}" alt="Image" style="width: 100px; height: auto;">
    @else
        <img src="{{ asset('images/default_image.jpg') }}" alt="" style="width: 100px; height: auto;">
    @endif

    <p><button class="btn btn-success mt-3" wire:click="toggleSquare">MODIFICAR</button></p>
    @if ($showSquare)
        <div class="overlay-square">
            <p>IMAGEN VIEJA</p>
            <img src="{{ asset($oldImage) }}" alt="Image"
                style="width: 100px; height: auto; margin 0 0 20px 0">

            <p>NUEVA IMAGEN</p>
            <input type="file" wire:model="image">
            @if ($image)
                <div class="mt-4">
                    <p>Previsualización de la imagen seleccionada:</p>
                    <img src="{{ $image->temporaryUrl() }}" alt="Imagen seleccionada" style="max-width: 300px;">
                </div>
            @endif
            <p>
                @error('image')
                    <span class="error">{{ $message }}</span>
                @enderror
            </p>
            <p><button wire:click="updateImage" class="btn btn-success">ACTUALIZAR</button></p>
            {{-- <p></p> --}}
            <button wire:click="toggleSquare" class="btn btn-warning">CANCELAR</button>
        </div>
    @endif
</div>
