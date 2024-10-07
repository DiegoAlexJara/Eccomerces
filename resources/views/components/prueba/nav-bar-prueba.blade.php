<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <div class="logo">
            <a href="">TIENDA ONLINE</a>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-links">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user') }}">TIENDA</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        PRODUCTOS
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('marcas') }}">Marcas</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{ route('Categorys') }}">Categorias</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{ route('subCategorias') }}">Sub Categorias</a></li>
                        
                       
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contactos') }}">CONTACTOS</a>
                </li>
            </ul>
            
            <div class="right-section">
                
                @if (!auth()->user()->hasRole('User'))
                    <a href="{{ route('admin') }}" class="admin-btn">Panel Admin</a>
                @endif

                <a href="" class="d-flex cart-icon">
                    🛒 Carrito <span id="cart-count"></span>
                </a>
                <div class="nav-item dropdown profile-btn">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        PERFIL
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <form action="{{ route('logOut') }}" method="POST">
                                @csrf
                                <div class="d-grid gap-2">
                                    <button class="btn btn-outline-dark" type="submit">SALIR</button>    
                                </div>
                            </form>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
