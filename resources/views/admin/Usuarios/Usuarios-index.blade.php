@extends('components.admin.app-layouts-admin')
@section('title')
    USUARIOS
@endsection
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">CORREO</th>
                <th scope="col">ROLES</th>
                <th scope="col">PERMISOS</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $registros)
                <tr>
                    <th>{{ $registros->id }}</th>
                    <th>{{ $registros->name }}</th>
                    <th>{{ $registros->email }}</th>
                    <th>
                        @foreach ($registros->roles as $role)
                            <span class="badge bg-primary">{{ $role->name }}</span>
                        @endforeach
                    </th>
                    <th>
                        @foreach ($registros as $permisos)

                        <span  class="badge bg-primary">{{-- {{$permisos->name}} --}}</span>
                            
                        @endforeach
                    </th>
                    
                    
                    <th>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                ACCIONES
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Modificar</a></li>
                                <li><a class="dropdown-item" href="#">Quitar Roles Y Permisos</a></li>
                            </ul>
                        </div>
                    </th>

                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('roles.create') }}" class="d-grid gap-2">
        <button class="btn btn-secondary" type="button">CREAR ROLES</button>
    </a>
    <br>
    <a href="{{route('permisos.create')}}" class="d-grid gap-2">
        <button class="btn btn-secondary" type="button">CREAR PERMISOS</button>
    </a>

    
    {{-- @php
        echo $users;
    @endphp --}}
@endsection
