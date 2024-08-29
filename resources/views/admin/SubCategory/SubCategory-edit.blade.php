@extends('components.admin.app-layouts-admin')
@section('title')
    EDITAR SUBCATEGORIA
@endsection
@section('content')
    <h2>Editar Sub Categoria</h2>
    <form action="{{ route('subcategorias.update', $subcategory->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="">
            Nombre
            <input type="text" name="Name" id="Name" value='{{ $subcategory->Name }}'>
        </label>
        @error('name')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <label for="">
            Descripcion
            <input type="text" name="description" id="description" value='{{ $subcategory->description }}'>
        </label>
        @error('description')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <label for="">
            <label for="color">Selecciona un color:</label>
            <input type="color" name="color" id="color" class="form-control" value="{{ $subcategory->color }}">
        </label>
        @error('color')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <label for="">
            <select class="form-select" aria-label="Default select example" name="category_id" id="category_id">
                <option selected value="{{ $subcategory->category_id }}">{{ $subcategory->category->Name }}</option>
                @foreach ($category as $registro)
                    <option value="{{ $registro->id }}">{{ $registro->Name }}</option>
                @endforeach
            </select>
        </label>
        @error('category_id')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <input type="submit" value="CREAR SUBCATEGORIA">

    </form>
@endsection
