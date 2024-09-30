@extends('components.admin.app-layouts-admin')
@section('title')
    ROLES
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
                <th scope="col">NOMBRE</th>
                <th scope="col">PERMISOS</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $registros)
                <tr>
                    <th scope="row">{{ $registros->id }}</th>
                    <th>{{ $registros->name }}</th>
                    
                    <th>
                        <a href="{{ route('RolesPermisos', $registros->name) }}"><button type="button"
                                class="btn btn-info">ASIGNAR PERMISOS</button></a>
                    </th>
                    <th>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                ACCIONES
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('roles.edit', $registros->id) }}">Modificar</a>
                                </li>
                                <li>
                                    <form action="{{ route('roles.destroy', $registros->id) }}" method="post">
                                        @csrf
                                        @method('delete')
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
    <a href="{{ route('roles.create') }}" class="d-grid gap-2">
        <button class="btn btn-primary" type="button">CREAR ROL</button>
    </a>
    {{ $roles->links() }}
@endsection
