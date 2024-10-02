<div>

    <form action="{{ route('productos') }}" method="GET" class="mb-3 d-flex align-items-center">
        <input type="text" class="form-control me-2" wire:model="query" id="query"
            name="query"placeholder="Buscar productos..." />
        <input type="submit" value="BUSCAR" class="btn btn-primary">
    </form>

    <div class="resultado" style="margin-top: 10px; color: #333;">
        <p>{{ $query }}</p>
    </div>



</div>
