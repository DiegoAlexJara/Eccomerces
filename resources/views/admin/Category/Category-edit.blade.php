@extends('components.admin.app-layouts-admin')
@section('title')
    EDITAR CATEGORIA
@endsection
@section('content')
    <h2>CATEGORIA</h2>
    <form action="{{ route('category.update', $category->id) }}" method="POST">

        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombre</label>
            <input type="text"class="form-control" name="name" id="name" value="{{ $category->Name }}"      >
            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Descripcion</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control" oninput="updateCharCount()" maxlength="255">{{ $category->description }}</textarea>
            <p id="charCount">255 Caracteres Restantes</p>
            @error('description')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="color">Selecciona un color:</label>
            <input type="color" name="color" id="color" class="form-control" value="{{ $category->color }}">
            @error('color')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="d-grid gap-2 mb-3">
            <button class="btn btn-primary" type="submit">CREAR CATEGORIA</button>
        </div>

    </form>
    <a href="{{ route('category.index') }}">
        <button type="button" class="btn btn-secondary btn-sm">REGRESAR</button>
    </a>
    <script src="{{ asset('js/index-products.js') }}"></script>
@endsection
