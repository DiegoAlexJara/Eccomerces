@extends('components.admin.app-layouts-admin')
@section('title')
    NUEVO PRODUCTO
@endsection
@section('content')
    <h2>Nuevo Producto</h2>
    <form action="{{ route('productos.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombre</label>
            <input type="text"class="form-control" name="Name" id="Name" value="{{ old('Name') }}">
            @error('Name')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Descripcion</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control"
                oninput="updateCharCount()" maxlength="255">{{ old('description') }}</textarea>
            <p id="charCount">255 Caracteres Restantes</p>
            @error('description')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">PRECIO</label>
            <input type="number"class="form-control" name="price" id="price" value="" max='10000'
                min='1'>
            @error('price')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">UNIDADES</label>
            <input type="number"class="form-control" name="stock" id="stock" value="" max='10000000'
                min='1'>
            @error('stock')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <select class="form-select" aria-label="Default select example" name="marca_id" id="marca_id"
                value="{{ old('marca_id') }}">
                <option selected disabled>Marcas</option>
                @foreach ($Marca as $registro)
                    <option value="{{ $registro->id }}">{{ $registro->Name }}</option>
                @endforeach
            </select>
            @error('marca_id')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <select class="form-select" aria-label="Default select example" name="category_id" id="category_id"
                value="{{ old('category_id') }}">
                <option selected disabled>Categorias</option>
                @foreach ($Category as $registro)
                    <option value="{{ $registro->id }}">{{ $registro->Name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <select class="form-select" aria-label="Default select example" name="subcategory_id" id="subcategory_id"
                value="{{ old('subcategory_id') }}">
                <option selected disabled>SubCategorias</option>
                @foreach ($subcategory as $registro)
                    <option value="{{ $registro->id }}">{{ $registro->Name }}</option>
                @endforeach
            </select>
            @error('subcategory_id')
                <p>{{ $message }}</p>
            @enderror
        </div>


        <div class="d-grid gap-2 mb-3">
            <button class="btn btn-primary" type="submit">CREAR PRODUCTO</button>
        </div>

    </form>

    <a href="{{ route('productos.index') }}">
        <button type="button" class="btn btn-secondary btn-sm">REGRESAR</button>
    </a>
    <script src="{{ asset('js/index-products.js') }}"></script>
@endsection
