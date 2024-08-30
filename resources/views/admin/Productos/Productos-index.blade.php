@extends('components.admin.app-layouts-admin')
@section('title')
    PRODUCTOS
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
                <th scope="col">PRECIO</th>
                <th scope="col">MARCA</th>
                <th scope="col">CATEGORIA</th>
                <th scope="col">SUBCATEGORIA</th>
            </tr>
        </thead>
        <tbody>
            @php $numero_tabla = 1 @endphp
            @foreach ($productos as $registro)
                <tr>

                    <th scope="col">{{ $registro->id }}</th>
                    <th scope="col">{{ $registro->Name }}</th>
                    <th scope="col">{{ $registro->description }}</th>
                    <th scope="col">{{ $registro->price }}</th>
                    <th scope="col">{{ $registro->Marca->Name }}</th>
                    <th scope="col">{{ $registro->Category->Name }}</th>
                    <th scope="col">{{ $registro->subcategory->Name }}</th>
                    <th>
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            ACCIONES
                        </a>
                        <ul class="dropdown-menu">

                            <li><a class="dropdown-item" href="{{ route('productos.edit', $registro->id) }}">Modificar</a>
                            </li>
                            <li>
                                <form action="{{ route('productos.destroy', $registro->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary">Eliminar</button>
                                </form>
                            </li>

                        </ul>
                    </th>

                </tr>
                @php $numero_tabla +=1 @endphp
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('productos.create') }}" class="d-grid gap-2">
        <button class="btn btn-secondary" type="button">NUEVO PRODUCTO</button>
    </a>
    {{$productos->links()}}
@endsection
