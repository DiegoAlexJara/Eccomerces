@extends('components.admin.app-layouts-admin')
@section('title')
    EDITAR MARCA
@endsection
@section('content')
    <h2>MARCA</h2>
    <form action="{{ route('marca.update', $marcas->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombre</label>
            <input type="text"class="form-control" name="Name" id="Name" value="{{ $marcas->Name }}">
            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Descripcion</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control" oninput="updateCharCount()" maxlength="255">{{ $marcas->description }}</textarea>
            <p id="charCount"> Caracteres Restantes</p>
            @error('description')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="color">Selecciona un color:</label>
            <input type="color" name="color" id="color" class="form-control" value="{{ $marcas->color }}">
            @error('color')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="d-grid gap-2 mb-3">
            <button class="btn btn-primary" type="submit">MODIFICAR MARCA</button>
        </div>

    </form>
    
    <a href="{{ route('marca.index') }}">
        <button type="button" class="btn btn-secondary btn-sm">REGRESAR</button>
    </a>
    <script src="{{ asset('js/index-products.js') }}"></script>
@endsection
