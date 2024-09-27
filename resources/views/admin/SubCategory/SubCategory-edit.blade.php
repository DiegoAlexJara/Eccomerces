@extends('components.admin.app-layouts-admin')
@section('title')
    EDITAR SUBCATEGORIA
@endsection
@section('content')
    <h2>Editar Sub Categoria</h2>
    <form action="{{ route('subcategorias.update', $subcategory->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombre</label>
            <input type="text"class="form-control" name="Name" id="Name" value="{{ $subcategory->Name }}">
            @error('Name')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Descripcion</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control"
                oninput="updateCharCount()" maxlength="255">{{ $subcategory->description }}</textarea>
            <p id="charCount">255 Caracteres Restantes</p>
            @error('description')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="color">Selecciona un color:</label>
            <input type="color" name="color" id="color" class="form-control" value="{{ old('color') }}">
            @error('color')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <select class="form-select" aria-label="Default select example" name="category_id" id="category_id"
                value="{{ old('category_id') }}">
                <option selected disabled>Categorias</option>
                @foreach ($category as $registro)
                    <option value="{{ $registro->id }}">{{ $registro->Name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="d-grid gap-2 mb-3">
            <button class="btn btn-primary" type="submit">MODIFICAR SUBCATEGORIA</button>
        </div>

    </form>

    <a href="{{ route('subcategorias.index') }}">
        <button type="button" class="btn btn-secondary btn-sm">REGRESAR</button>
    </a>
    <script src="{{ asset('js/index-products.js') }}"></script>

@endsection
