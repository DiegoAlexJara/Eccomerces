@extends('components.admin.app-layouts-admin')
@section('title')
    PERMISOS
@endsection
@section('content')
    @session('success')
        <div class="alert alert-primary" role="alert">
            {{ session('success') }}
        </div>
    @endsession
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">PERMISO</th>
                <th scope="col">ROLES</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($permision as $registros)
                <tr>
                    <th scope="row">{{ $registros->id }}</th>
                    <th>{{ $registros->name }}</th>
                    <th>
                        @foreach ($registros->roles as $roles)
                            <li>{{ $roles->name }}</li>
                        @endforeach
                    </th>
                    <th>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                ACCIONES
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('permisos.edit', $registros->id) }}">Modificar</a></li>
                                <li>
                                    <form action="{{ route('permisos.destroy', $registros->id) }}" method="POST">
                                        <button type="submit" class="btn btn-primary">Eliminar</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('permisos.create') }}" class="d-grid gap-2">
        <button class="btn btn-primary" type="button">CREAR ROL</button>
    </a>
    {{$permision->links()}}

@endsection
