@extends('components.admin.app-layouts-admin')
@section('title')
    CREAR ROL
@endsection
@section('content')
<form action="{{route('roles.store')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">ROL</label>
        <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name">
    </div>
    <div class="form-group mb-3">
        <label for="permissionss">ASIGNAR PERMISOS</label>
        <select name="permissions[]" id="permissions[]" class="form-control" multiple>
            @foreach($permisios as $permission)
                <option value="{{ $permission->id }}">{{ $permission->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="d-grid gap-2">
        <button class="btn btn-primary" type="submit">CREAR ROL</button>
    </div>
</form>
@endsection
