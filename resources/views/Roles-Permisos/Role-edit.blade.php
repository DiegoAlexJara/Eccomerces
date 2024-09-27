@extends('components.admin.app-layouts-admin')
@section('title')
    MODIFICAR ROL
@endsection
@section('content')
    <form action="{{ route('roles.update', $role->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">ROL</label>
            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name"
                value="{{ $role->name }}">
            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="permissions">ASIGNAR PERMISOS</label>
            <select name="permissions[]" id="permissions[]" class="form-control" multiple>
                @foreach ($permisios as $permission)
                    <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                @endforeach
            </select>
            @error('permissions[]')
            <p>{{ $message }}</p>
        @enderror
        </div>
        <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">MODIFICAR ROL</button>
        </div>
    </form>
    <a href="{{ route('roles.index') }}">
        <button type="button" class="btn btn-secondary btn-sm">REGRESAR</button>
    </a> 
@endsection
