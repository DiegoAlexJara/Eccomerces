@extends('components.admin.app-layouts-admin')
@section('title')
    EDITAR MARCA
@endsection
@section('content')
    <h2>MARCA</h2>
    <form action="{{ route('marca.update', $marcas->id) }}" method="POST">

        @csrf
        @method('PUT')

        <label for="">
            Nombre
            <input type="text" name="name" id="name" value="{{$marcas->Name}}">
        </label>

        <br><br>

        <label for="">
            Descripcion
            <input type="text" name="description" id="description" value="{{$marcas->description}}">
        </label>

        <br><br>

        <label for="">
            <label for="color">Selecciona un color:</label>
            <input type="color" name="color" id="color" class="form-control" value="{{$marcas->color}}">
        </label>

        <br><br>

        <input type="submit" value="MODIFICAR">

    </form>
    
    <a href="{{ route('marca.index') }}">
        <button type="button" class="btn btn-secondary btn-sm">REGRESAR</button>
    </a>
@endsection
