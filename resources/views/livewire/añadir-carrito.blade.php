<div>
    <p>Unidades disponibles: {{ $this->producStock }}</p>
    @if ($showSquare)
        <button wire:click="toggleSquare" class="btn btn-warning">CANCELAR</button>
        <div class="overlay-square">
            <label for="" class="mb-3">
                CANTIDAD A COMPRAR
                <input type="number" wire:model.change="stock" name="" id="" min="1" max="{{ $this->producStock }}"
                    value="1" style="text-align: center">
                    <p>max {{ $this->producStock }}</p>
            </label>
            <input type="button" class="add-to-cart" value="AÑADIR AL CARRITO">

        </div>
    @else
        <button class="add-to-cart" wire:click="toggleSquare">Añadir al carrito</button>
    @endif

    <style>
        label {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 16px;
            font-weight: bold;
            color: #333;
            
        }

        input[type="number"] {
            width: 80px;
            padding: 5px;
            border: 2px solid #ccc;
            border-radius: 5px;
            font-size: 18px;
            text-align: center;
            transition: border-color 0.3s ease;
        }

        input[type="number"]:focus {
            border-color: #007bff;
            outline: none;
        }
 


        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</div>
