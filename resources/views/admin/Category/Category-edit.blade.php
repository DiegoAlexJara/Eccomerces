@extends('components.admin.app-layouts-admin')
@section('title')
    EDITAR CATEGORIA
@endsection
@section('content')
    <h2>CATEGORIA</h2>
    <form action="{{ route('category.update', $category->id) }}" method="POST">

        @csrf
        @method('PUT')
        <label for="">
            Nombre
            <input type="text" name="name" id="name" value="{{ $category->Name }}">
        </label>

        <br><br>

        <label for="">
            Descripcion
            <input type="text" name="description" id="description" value="{{ $category->description}}">
        </label>

        <br><br>

        <label for="">
            <label for="color">Selecciona un color:</label>
            <input type="color" name="color" id="color" class="form-control" value="{{$category->color}}">
        </label>

        <br><br>

        <input type="submit" value="MODIFICAR CATEGORIA">

    </form>
    <a href="{{ route('category.index') }}">
        <button type="button" class="btn btn-secondary btn-sm">REGRESAR</button>
    </a> 

@endsection
