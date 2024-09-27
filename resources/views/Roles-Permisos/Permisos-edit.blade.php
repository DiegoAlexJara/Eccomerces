@extends('components.admin.app-layouts-admin')
@section('title')
    EDITAR PERMISO
@endsection
@section('content')

    <h2>PERMISO</h2>

    <form action="{{ route('permisos.update', $permision->id) }}" method="POST">
        
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="name">Nombre del Permiso:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{$permision->name}}">
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
        </div>

        <div class="d-grid gap-2 mb-3">
            <button class="btn btn-primary" type="submit">MODIFICAR PERMISOS</button>
        </div>

    </form>
    <a href="{{ route('permisos.index') }}">
        <button type="button" class="btn btn-secondary btn-sm">REGRESAR</button>
    </a> 
@endsection
