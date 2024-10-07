@extends('components.prueba.app-layouts-prueba')
@section('title')
    PRODUCTOS
@endsection
@section('Estilos')
    <link rel="stylesheet" href="{{ asset('css/shops.css') }}">
@endsection
@section('content')

    <form action="{{ route('productos') }}" method="GET" class="mb-3 d-flex align-items-center" style="margin: 15px">
        <input type="text" class="form-control me-2" id="query" name="query" placeholder="Buscar producto..." />
        <input type="submit" value="BUSCAR" class="btn btn-primary">
    </form>

    <div class="container">
        @foreach ($products as $item)
                <div class="product-card">

                    <div class="product-details">
                        @if ($item->path)
                            <img src="{{ asset('storage/' . $item->path) }}" alt="Image" style="width: 120px; height: auto;">
                        @else
                            <img src="{{ asset('storage/default_image.jpg') }}" alt="Image"
                                style="width: 100px; height: auto;">
                        @endif
                        <h2 class="product-title">{{ $item->Name }}</h2>
                        <p class="product-price">${{ $item->price }}</p>
                        <p class="product-description">{{ $item->description }}</p>
                        <p>Unidades disponibles: {{ $item->stock }}</p>
                        @livewire('AñadirCarrito')
                    </div>
                </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">

        {{ $products->links() }}
    </div>
    
@endsection
