@extends('components.admin.app-layouts-admin')
@section('title')
    CREACION DE PERMISOS
@endsection
@section('content')
    <form action="{{ route('permisos.store') }}" method="post">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Nombre del Permiso:</label>
            <input type="text" name="name" id="name" class="form-control" >
            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="role">Asignar a Roles:</label>
            <select name="role[]" id="role[]" class="form-control" multiple>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
            @error('role')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="d-grid gap-2 mb-3">
            <button class="btn btn-primary" type="submit">CREAR PERMISO</button>
        </div>

    </form>
    <a href="{{ route('permisos.index') }}">
        <button type="button" class="btn btn-secondary btn-sm">REGRESAR</button>
    </a>
@endsection
