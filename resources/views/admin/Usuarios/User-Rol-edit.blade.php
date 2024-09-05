@extends('components.admin.app-layouts-admin')
@section('title')
    AÑADIR ROL
@endsection
@section('content')
    <form action="{{ route('DarRol.update',$user->id) }}" method="post">
        @method('PUT')
        @csrf
        <fieldset disabled>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Nombre</label>
                <input type="text" id="" class="form-control" placeholder="{{ $user->name }}">
            </div>
        </fieldset>
        <div class="form-group mb-3">
            <label for="disabledTextInput" class="form-label">Asignar Un Rol</label>
            <select name="roles[]" id="roles[]" class="form-control" >
                <option value="">Ningún Rol</option> <!-- Opción para no asignar roles -->
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">DAR ROLES</button>
          </div>
    </form>
@endsection
