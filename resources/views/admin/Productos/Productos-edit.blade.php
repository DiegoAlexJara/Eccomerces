@extends('components.admin.app-layouts-admin')
@section('title')
    EDITAR PRODUCTO
@endsection
@section('content')
    <h2>EDITAR PRODUCTO</h2>
    <form action="{{ route('productos.update', $productos->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="">
            Nombre
            <input type="text" name="Name" id="Name" value="{{$productos->Name}}">
        </label>
        @error('name')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <label for="">
            Descripcion
            <input type="text" name="description" id="description" value="{{$productos->description}}">
        </label>
        @error('description')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <label for="">
            Precio
            <input type="number" name="price" id="price" value="{{ $productos->price }}" min="10">
        </label>
        @error('price')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <label for="">
            <select class="form-select" aria-label="Default select example" name="marca_id" id="marca_id"
                value="{{ old('marca_id') }}">
                <option selected value="{{$productos->marca_id}}">{{$productos->Marca->Name}}</option>
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
            <select class="form-select" aria-label="Default select example" name="category_id" id="category_id"
                value="{{ old('category_id') }}">
                <option selected value="{{$productos->category_id}}">{{$productos->Category->Name}}</option>
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
            <select class="form-select" aria-label="Default select example" name="subcategory_id" id="subcategory_id">
                <option selected value="{{$productos->subcategory_id}}">{{$productos->subcategory->Name}}</option>
                @foreach ($subcategory as $registro)
                    <option value="{{ $registro->id }}">{{ $registro->Name }}</option>
                @endforeach
            </select>
        </label>
        @error('category_id')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <input type="submit" value="MODIFICAR PRODUCTO">
    </form>
    <a href="{{ route('productos.index') }}">
        <button type="button" class="btn btn-secondary btn-sm">REGRESAR</button>
    </a>
@endsection
