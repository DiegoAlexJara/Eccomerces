@extends('components.admin.app-layouts-admin')
@section('title')
    CREAR SUBCATEGORIA
@endsection
@section('content')
    <form action="{{ route('subcategorias.store') }}" method="POST">
        
        @csrf

        <label for="">
            Nombre
            <input type="text" name="Name" id="Name" value="{{old('Name')}}">
        </label>
        @error('name')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <label for="">
            Descripcion
            <input type="text" name="description" id="description" value="{{old('description')}}">
        </label>
        @error('description')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <label for="">
            <label for="color">Selecciona un color:</label>
            <input type="color" name="color" id="color" class="form-control" value="#ffffff">
        </label>
        @error('color')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <label for="">
            <select class="form-select" aria-label="Default select example" name="category_id" id="category_id" value="{{old('category_id')}}">
                <option selected disabled>Categorias</option>
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
    <a href="{{ route('subcategorias.index') }}">
        <button type="button" class="btn btn-secondary btn-sm">REGRESAR</button>
    </a>
@endsection
