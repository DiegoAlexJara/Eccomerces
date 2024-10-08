<div class="sidebar">
    <h2><a href="{{ route('admin') }}" class="header-link">ADMINISTRADOR</a></h2>
    <ul>
        <li><a href="{{ route('usuarios.index') }}" class="btn btn-secondary">USUARIOS</a></li>
        <li>
            <div class="dropdown dropend " role="group">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    PRODUCTOS
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('marca.index') }}" class="d-grid gap-2">
                            <button class="btn btn-primary" type="button">Marcas</button>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a href="{{ route('category.index') }}" class="d-grid gap-2">
                            <button class="btn btn-primary" type="button">Categorias</button>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a href="{{ route('subcategorias.index') }}" class="d-grid gap-2">
                            <button class="btn btn-primary" type="button">Sub Categorias</button>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a href="{{ route('productos.index') }}" class="d-grid gap-2">
                            <button class="btn btn-primary" type="button">Productos</button>
                        </a>
                    </li>

                </ul>
            </div>
        </li>
        <li>
            <div class="dropdown dropend" role="group">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    ROLES
                </a>

                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('roles.index') }}" class="d-grid gap-2">
                            <button class="btn btn-primary" type="button">Roles</button>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a href="{{ route('permisos.index') }}" class="d-grid gap-2">
                            <button class="btn btn-primary" type="button">Permisos</button>
                        </a>
                    </li>

                </ul>
            </div>
        </li>
    </ul>
    <div class="sidebar-footer">
        <a href="{{ route('user') }}">
            <button class="back-button">MODO USUARIO</button>
        </a>

        <form action="{{ route('logOut') }}" method="POST">
            @csrf
            <button input="submit" class="logout-button">SALIR DE SESSION</button>
        </form>
    </div>
</div>
