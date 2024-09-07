@extends('components.admin.app-layouts-admin')
@section('title')
    USUARIOS
@endsection
@section('content')
    <h2>USUARIOS</h2>
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
                <th scope="col">NOMBRE</th>
                <th scope="col">CORREO</th>
                <th scope="col">ROL</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $registros)
                <tr>
                    <th scope="row">{{ $registros->id }}</th>
                    <th>{{ $registros->name }}</th>
                    <th>{{ $registros->email }}</th>
                    <th>
                        @foreach ($registros->roles as $role)
                            <span class="badge bg-primary">{{ $role->name }}</span>
                        @endforeach
                    </th>
                    <th>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                ACCIONES
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('DarRol.edit', $registros->id) }}">Modificar
                                        Rol</a>
                                </li>

                            </ul>
                        </div>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
