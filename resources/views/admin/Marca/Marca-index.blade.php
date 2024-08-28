@extends('components.admin.app-layouts-admin')
@section('title')
    MARCAS
@endsection
@section('content')
    
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
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Color</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($marcas as $registro)
                <tr>

                    <th>{{ $registro->id }}</th>
                    <th>{{ $registro->Name }}</th>
                    <th>{{ $registro->description }}</th>
                    <th>{{ $registro->color }}</th>
                    <th>

                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            ACCIONES
                        </a>
                        <ul class="dropdown-menu">

                            <li><a class="dropdown-item" href="{{ route('marca.edit', $registro->id) }}">Modificar</a></li>
                            <li>
                                <form action="{{ route('marca.destroy', $registro->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary">Eliminar</button>
                                </form>
                            </li>
                            

                        </ul>

                    </th>

                </tr>
            @endforeach

        </tbody>
    </table>
    <a href="{{ route('marca.create') }}" class="d-grid gap-2">
        <button class="btn btn-secondary" type="button">CREAR NUEVA MARCA</button>
    </a>
@endsection
