@extends('components.admin.app-layouts-admin')
@section('title')
CREACION DE PERMISOS
@endsection
@section('content')
<form action="{{ route('permisos.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Nombre del Permiso:</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="role">Asignar a Roles:</label>
        <select name="role[]" id="role[]" class="form-control" multiple>
            @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>
    </div>
    <input type="submit" value="CREAR PERMISO">
</form>

@endsection