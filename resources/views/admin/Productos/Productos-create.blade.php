@extends('components.admin.app-layouts-admin')
@section('title')
    NUEVO PRODUCTO
@endsection
@section('content')
    <h2>Nuevo Producto</h2>
    <form action="{{ route('productos.store') }}" method="POST">
        @csrf

        <label for="">
            Nombre
            <input type="text" name="Name" id="Name" value="{{ old('Name') }}">
        </label>
        @error('name')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <label for="">
            Descripcion
            <input type="text" name="description" id="description" value="{{ old('description') }}">
        </label>
        @error('description')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <label for="">
            Precio
            <input type="number" name="price" id="price" value="{{ old('price') }}" min="10">
        </label>
        @error('price')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <label for="">
            <select class="form-select" aria-label="Default select example" name="marca_id" id="marca_id" value="{{old('marca_id')}}">
                <option selected disabled>Marcas</option>
                @foreach ($Marca as $registro)
                    <option value="{{ $registro->id }}">{{ $registro->Name }}</option>
                @endforeach
            </select>
        </label>
        @error('category_id')
            <p>{{ $message }}</p>
        @enderror        

        <br><br>

        <label for="">
            <select class="form-select" aria-label="Default select example" name="category_id" id="category_id" value="{{old('category_id')}}">
                <option selected disabled>Categorias</option>
                @foreach ($Category as $registro)
                    <option value="{{ $registro->id }}">{{ $registro->Name }}</option>
                @endforeach
            </select>
        </label>
        @error('category_id')
            <p>{{ $message }}</p>
        @enderror

        <br><br>
        
        <label for="">
            <select class="form-select" aria-label="Default select example" name="subcategory_id" id="subcategory_id" value="{{old('subcategory_id')}}">
                <option selected disabled>SubCategorias</option>
                @foreach ($subcategory as $registro)
                    <option value="{{ $registro->id }}">{{ $registro->Name }}</option>
                @endforeach
            </select>
        </label>
        @error('category_id')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <input type="submit" value="CREAR PRODUCTO">

    </form>

    <a href="{{ route('productos.index') }}">
        <button type="button" class="btn btn-secondary btn-sm">REGRESAR</button>
    </a>

@endsection
