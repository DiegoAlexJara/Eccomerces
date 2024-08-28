<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('admin') }}">INICIO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link" href="#">USUARIOS</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        PRODUCTOS
                    </a>
                    <ul class="dropdown-menu">

                        <li><a class="dropdown-item" href="{{ route('marca.index') }}">Marcas</a></li>
                        <li><a class="dropdown-item" href="{{ route('category.index') }}">Categorias</a></li>
                        <li><a class="dropdown-item" href="#">SubCategorias</a></li>
                        <li><a class="dropdown-item" href="#">Productos</a></li>


                    </ul>
                </li>
                <li>
                    <form action="{{ route('logOut') }}" method="POST">
                        @csrf
                        <input type="submit" value="SALIR">
                    </form>
                </li>

            </ul>

        </div>
    </div>
</nav>
