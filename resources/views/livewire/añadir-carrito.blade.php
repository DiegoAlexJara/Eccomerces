<div>
    @if ($showSquare)
        <button wire:click="toggleSquare" class="btn btn-warning">CANCELAR</button>
        <div class="overlay-square">
            <label for="" class="mb-3">
                CANTIDAD A COMPRAR
                <input type="number" name="" id="" min="1" max="10">
            </label>
            <input type="button" class="add-to-cart" value="AÑADIR AL CARRITO">

        </div>
    @else
        <button class="add-to-cart" wire:click="toggleSquare">Añadir al carrito</button>
    @endif

</div>
