@extends('components.admin.app-layouts-admin')
@section('title')
    MARCA NUEVA
@endsection
@section('content')
    <h2>MARCA</h2>
    <form action="{{ route('marca.store') }}" method="POST">

        @csrf

        <label for="">
            Nombre
            <input type="text" name="name" id="name" value="{{old('name')}}">
        </label>

        <br><br>

        <label for="">
            Descripcion
            <input type="text" name="description" id="description" value="{{old('description')}}">
        </label>

        <br><br>

        <label for="">
            <label for="color">Selecciona un color:</label>
            <input type="color" name="color" id="color" class="form-control" value="#ffffff">
        </label>

        <br><br>

        <input type="submit" value="CREAR MARCA">

    </form>
    <a href="{{ route('marca.index') }}">
        <button type="button" class="btn btn-secondary btn-sm">REGRESAR</button>
    </a>
@endsection
