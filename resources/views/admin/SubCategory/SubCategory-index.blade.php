@extends('components.admin.app-layouts-admin')
@section('title')
    SubCategorias
@endsection
@section('content')
    <h2>SUBCATEGORIA</h2>
    <form class="d-flex" role="search">
        <input class="form-control me-2" type="search"id='query' name="query" placeholder="Search" aria-label="Search">
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
                <th scope="col">CATEGORIA</th>
            </tr>
        </thead>
        <tbody>
            @php $numero_tabla = 1 @endphp
            @foreach ($subcategory as $registros)
                <tr>
                    <th>{{ $registros->id }}</th>
                    <th>{{ $registros->Name }}</th>
                    <th>{{ $registros->description }}</th>
                    <th>{{ $registros->color }}</th>
                    <th>{{ $registros->category->Name}}</th>
                    <th>
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            ACCIONES
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="d-grid gap-2" href="{{ route('subcategorias.edit', $registros->id) }}">
                                    <button type="button" class="btn btn-primary">MODIFICAR</button>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="{{ route('subcategorias.destroy', $registros->id) }}" method="POST"
                                    class="d-grid gap-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary">ELIMINAR</button>
                                </form>
                            </li>
                        </ul>
                    </th>
                </tr>
                @php $numero_tabla +=1 @endphp
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('subcategorias.create') }}" class="d-grid gap-2">
        <button class="btn btn-secondary" type="button">CREAR NUEVA SubCategoria</button>
    </a>
    {{$subcategory->links()}}
@endsection
