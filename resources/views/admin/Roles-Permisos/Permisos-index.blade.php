@extends('components.admin.app-layouts-admin')
@section('title')
    PERMISOS
@endsection
@section('content')
    <h2>PERMISOS</h2>
    <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">BUSCAR</button>
    </form>
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
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            ACCIONES
                        </a>
                        <ul class="dropdown-menu">

                            <li>
                                <a class="d-grid gap-2" href="{{ route('permisos.edit', $registros->id) }}">
                                    <button type="button" class="btn btn-primary">MODIFICAR</button>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="{{ route('permisos.destroy', $registros->id) }}" method="POST"
                                    class="d-grid gap-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary">ELIMINAR</button>
                                </form>
                            </li>

                            

                        </ul>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('permisos.create') }}" class="d-grid gap-2">
        <button class="btn btn-primary" type="button">CREAR ROL</button>
    </a>
    {{ $permision->links() }}

@endsection
