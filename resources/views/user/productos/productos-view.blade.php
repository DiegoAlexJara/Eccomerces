@extends('components.prueba.app-layouts-prueba')
@section('title')
    PRODUCTOS
@endsection
@section('Estilos')
    <link rel="stylesheet" href="{{ asset('css/shop.css') }}">
@endsection
@section('content')
    <h1 class="text-center mb-4">PRODUCTOS</h1>

    <form action="{{ route('productos') }}" method="GET"  class="mb-3 d-flex align-items-center">
        <input type="text" class="form-control me-2" id="query" name="query" placeholder="Buscar producto..." />
        <input type="submit" value="BUSCAR" class="btn btn-primary">
    </form>
    
    <div class="container">
        @foreach ($products as $item)
            <div class="product-card">

                <div class="product-details">
                    <h2 class="product-title">{{ $item->Name }}</h2>
                    <p class="product-price">${{ $item->price }}</p>
                    <p class="product-description">{{ $item->description }}</p>
                    <button class="add-to-cart">Añadir al carrito</button>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        
        {{ $products->links() }}
    </div>
@endsection
