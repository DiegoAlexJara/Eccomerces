@extends('components.prueba.app-layouts-prueba')
@section('title')
    {{ $name }}
@endsection
@section('Estilos')
    <link rel="stylesheet" href="{{ asset('css/user/shop-subcategori.css') }}">
@endsection
@section('content')
    <style>
        body {
            background-color: {{ $subcategory->color }};
        }
    </style>

    <form action="{{ route('subcategoryShop', $subcategory->Name) }}" method="GET" class="mb-3 d-flex align-items-center">
        <input type="text" class="form-control me-2" id="query" name="query" placeholder="Buscar producto..." />
        <input type="submit" value="BUSCAR" class="btn btn-primary">
    </form>

    <div class="container">
        @foreach ($products as $item)
            <div class="product-card">

                <div class="product-details">
                    @if ($item->path)
                        <img src="{{ asset( $item->path) }}" alt="Image" style="width: 120px; height: auto;">
                    @else
                        <img src="{{ asset('images/default_image.jpg') }}" alt="Image"
                            style="width: 100px; height: auto;">
                    @endif
                    <div class="container-todo">
                    <h2 class="product-title">{{ $item->Name }}</h2>
                    <p class="product-price">${{ $item->price }}</p>
                    <p class="product-description">{{ $item->description }}</p>
                    @livewire('AñadirCarrito', ['producId' => $item->id], key($item->id))
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        
        {{ $products->links() }}
    </div>
    <div class="d-flex justify-content-center"  style="margin: 5px;">
        <a href="{{ route('subCategorias') }}"><button class="btn btn-primary" type="button">REGRESAR</button></a>
    </div>
@endsection