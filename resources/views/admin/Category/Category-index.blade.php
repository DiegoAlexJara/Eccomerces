@extends('components.admin.app-layouts-admin')
@section('title')
    CATEGORIAS
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
                <th scope="col">NOMBRE</th>
                <th scope="col">DESCRIPCION</th>
                <th scope="col">COLOR</th>
            </tr>
        </thead>
        <tbody>
            @php $numero_tabla = 1 @endphp
            @foreach ($category as $registro)
                <tr>
                    <th>{{ $numero_tabla }}</th>
                    <th>{{ $registro->Name }}</th>
                    <th>{{ $registro->description }}</th>
                    <th>{{ $registro->color }}</th>
                    <th>
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            ACCIONES
                        </a>
                        <ul class="dropdown-menu">

                            <li><a class="dropdown-item" href="{{ route('category.edit', $registro->id) }}">Modificar</a></li>
                            <li>
                                <form action="{{ route('category.destroy', $registro->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary">Eliminar</button>
                                </form>
                            </li>


                        </ul>
                    </th>
                    @php $numero_tabla +=1 @endphp
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('category.create') }}" class="d-grid gap-2">
        <button class="btn btn-secondary" type="button">CREAR NUEVA CATEGORIA</button>
    </a>
@endsection
